<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function actionWebhook(Request $request) {
        $data = $request->only(['transactionId', 'amount', 'status', 'orderId', 'hash']);
        error_log("\n".implode("\n", $data));
    }

}
