<?php

namespace App\Models;

use App\Services\Payment\Api;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['user_id', 'event_id', 'deliveryMethod', 'district_id', 'address', 'price', 'creditCardTransactionId', 'qrCodeTransactionId', 'paymentMethod', 'paymentDatetime'];

    protected $dates = ['paymentDatetime'];

    const METHOD_CREDIT_CARD = 'credit_card';
    const METHOD_QR_CODE = 'qr_code';
    const METHOD_IBANKING = 'ibanking';
    const METHOD_TRANSFER = 'transfer';

    public function ticketParticipants() {
        return $this->hasMany(TicketParticipant::class);
    }

    public function event() {
        return $this->belongsTo(Event::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function district() {
        return $this->belongsTo(District::class);
    }

    public function getProvinceAttribute() {
        return $this->district->province;
    }

    public function getAreaAttribute() {
        return $this->district->area;
    }

    public function getPostalCodeAttribute() {
        return $this->district->area->postcode;
    }

    public function getLinkPayment($type) {
        if($type == 'credit_card' || $type == 'qr_code') {
            $api = new Api();
            $result = null;
            $transactionId = $type == 'credit_card' ? $this->creditCardTransactionId : $this->qrCodeTransactionId;
            if($transactionId) {
                $data = $this->getLinkPaymentData($transactionId);
                $result = $api->OpenPayment($data);
                $result = json_decode($result);
            } else {
                $data = $this->getCreateTransactionData();
                $result = $api->CreatePayment($data);
                $result = json_decode($result);
                $this->update([
                    'creditCardTransactionId' => $result['link_payment']
                ]);
            }
            if(isset($result['link_payment']))
                return $result['link_payment'];
        }
        return null;
    }

    public function isExpired() {
        return $this->created_at->diffInHours(now(), false) >= 1;
    }

    private function getLinkPaymentData($transactionId) {
        return [
            'secret_id' => config('payment.secret_id'),
            'secret_key' => config('payment.secret_key'),
            'transaction_id' => $transactionId,
        ];
    }

    private function getCreateTransactionData() {
        $user = auth()->user();
        $method = $this->paymentMethod;
        $url = route('ticket.show', $this->id);
        $address = [
            $this->district->name,
            $this->area->name,
            $this->province->name,
            $this->postalCode,
        ];
        return [
            'secret_id' => config('payment.secret_id'),
            'secret_key' => config('payment.secret_key'),
            'firstname' => $user->firstName,
            'lastname' => $user->lastName,
            'email' => $user->email,
            'phone' => $user->tel,
            'amount' => $this->price,
            'address' => implode(' ', $address),
            'order_id' => ((int)$method == self::METHOD_QR_CODE).$this->id,
            'payment_type' => $method,
            'success_Url' => $url,
            'fail_Url' => $url,
            'cancel_Url' => $url,
        ];
    }
}
