@inject('Ticket', 'App\Models\Ticket')
<div class="panel-box block-form mt-4">
    <div class="titles mb-1">
        <h4>{{ Str::title(str_replace('_', ' ', $ticket->paymentMethod ?: 'Payment')) }}</h4>
    </div>
    <div class="info-panel">
        @if(!$ticket->paymentMethod)
            <form action="{{ route('ticket.choose-method', $ticket->id) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-success btn-block" name="method" value="{{ $Ticket::METHOD_CREDIT_CARD }}">Credit Card</button>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-info btn-block" name="method" value="{{ $Ticket::METHOD_QR_CODE }}">QR Code</button>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-warning btn-block disabled" name="method" value="{{ $Ticket::METHOD_IBANKING }}">Internet Banking</button>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-default btn-block disabled" name="method" value="{{ $Ticket::METHOD_TRANSFER }}">Transfer</button>
                    </div>
                </div>
            </form>
        @else
            @switch($ticket->paymentMethod)
                @case($Ticket::METHOD_CREDIT_CARD)
{{--                    <a href="{{ $ticket->getLinkPayment($Ticket::METHOD_CREDIT_CARD) }}"></a>--}}
                @break
                @case($Ticket::METHOD_QR_CODE)
{{--                    <a href="{{ $ticket->getLinkPayment($Ticket::METHOD_QR_CODE) }}"></a>--}}
                @break
                @case($Ticket::METHOD_IBANKING)
                @break
                @case($Ticket::METHOD_TRANSFER)
                @break
                @default
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