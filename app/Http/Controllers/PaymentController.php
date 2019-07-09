<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function actionWebhook(Request $request) {
        $data = $request->only(['transactionID', 'amount', 'status', 'orderid', 'hash']);
        $ticketId = explode('_', $data['orderid'])[1];
        $ticket = Ticket::find($ticketId);

        if($ticket) {
            if($data['status'] == 'OK') {
                $ticket->update(['paymentDatetime' => now()]);
            }
            $ticket->update(['paymentStatus' => $data['status']]);
        }
        Log::info("\n".implode("\n", $data));
    }

}
