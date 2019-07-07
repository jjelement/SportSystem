<div class="panel-box block-form mt-4">
    <div class="titles mb-1">
        <h4>Payment</h4>
    </div>
    <div class="info-panel">
        @if(!$ticket->paymentMethod)
            <form action="{{ route('ticket.choose-method', $ticket->id) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-success btn-block" name="method" value="credit_card">Credit Card</button>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-info  btn-block disabled" name="method" value="qr_code">QR Code</button>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-warning  btn-block disabled" name="method" value="internet_banking">Internet Banking</button>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-default  btn-block disabled" name="method" value="transfer">Transfer</button>
                    </div>
                </div>
            </form>
        @else
            @switch($ticket->paymentMethod)
                @case('credit_card')
                <form action="#">
                    asd
                </form>
                @break
                @case('qr_code')
                @break
                @case('internet_banking')
                @break
                @case('transfer')
                @break
            @endswitch
            <form action="{{ route('ticket.choose-method', $ticket->id) }}" method="POST" class="text-center">
                @csrf
                <button type="submit" class="btn btn-default" name="method">
                    <i class="fa fa-refresh"></i> Change Method
                </button>
            </form>
        @endif
    </div>
</div>