@inject('Transaction', 'App\Models\Transaction')
<div class="panel-box block-form mt-4">
    <div class="titles mb-1">
        <h4>{{ Str::title(str_replace('_', ' ', session()->get('payment_method', 'Payment'))) }}</h4>
    </div>
    <div class="info-panel">
        @if(!session()->get('payment_method'))
            <form action="{{ route('ticket.choose-method', $ticket->id) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-success btn-block" name="method" value="{{ $Transaction::METHOD_CREDIT_CARD }}">Credit Card</button>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-info  btn-block disabled" name="method" value="{{ $Transaction::METHOD_QR_CODE }}">QR Code</button>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-warning  btn-block disabled" name="method" value="{{ $Transaction::METHOD_IBANKING }}">Internet Banking</button>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-default  btn-block disabled" name="method" value="{{ $Transaction::METHOD_TRANSFER }}">Transfer</button>
                    </div>
                </div>
            </form>
        @else
            @switch(session()->get('payment_method'))
                @case($Transaction::METHOD_CREDIT_CARD)
                <form action="#">
                    asd
                </form>
                @break
                @case($Transaction::METHOD_QR_CODE)
                @break
                @case($Transaction::METHOD_IBANKING)
                @break
                @case($Transaction::METHOD_TRANSFER)
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