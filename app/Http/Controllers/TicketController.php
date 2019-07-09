<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function viewTicketHistory() {
        $user = auth()->user();
        $tickets = $user->tickets()->orderBy('id', 'desc')->get();
        return view('ticket.list', ['tickets' => $tickets]);
    }

    public function viewTicket(Ticket $ticket) {
        return view('ticket.show', ['ticket' => $ticket]);
    }

    public function actionCancelTicket(Ticket $ticket) {
        if(!$ticket->transaction) {
            $ticket->delete();
            return redirect()->route('ticket')->with('success', 'Cancel ticket success.');
        }
        return redirect()->route('ticket');
    }

    public function actionChoosePaymentMethod(Request $request, Ticket $ticket) {
        if(!$ticket->isExpired()) {
            if($request->method == 'credit_card') {
                return $ticket->getLinkPayment($request->method);
            } elseif($request->method == 'qr_code') {
                return $ticket->getLinkPayment($request->method);
            }
            session()->put('payment_method', $request->method);
        }
        return redirect()->route('ticket.show', $ticket->id);
    }
}
