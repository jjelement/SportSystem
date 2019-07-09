<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['ticket_id', 'method', 'amount'];

    const METHOD_CREDIT_CARD = 'credit_card';
    const METHOD_QR_CODE = 'qr_code';
    const METHOD_IBANKING = 'ibanking';
    const METHOD_TRANSFER = 'transfer';

    public function ticket() {
        return $this->belongsTo(Ticket::class);
    }
}
