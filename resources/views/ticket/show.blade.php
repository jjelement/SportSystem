@extends('layouts.template')
@inject('Ticket', 'App\Models\Ticket')
@section('content')
    <div class="container paddings">
        <!-- Content Text-->
        <div class="panel-box">
            <div class="titles no-margin">
                <h4>Ticket Detail</h4>
            </div>

            <div class="row">
                <div class="col-sm-6 pl-0">
                    <ul class="list-panel">
                        <li>
                            <p>
                                <b>Event</b>
                                <span><a href="{{ route('event.show', $ticket->event_id) }}">{{ $ticket->event->name }}</a></span>
                            </p>
                        </li>
                        <li>
                            <p>
                                <b>Delivery Method</b>
                                <span class="bg-info px-2 text-white"><small>{{ $ticket->deliveryMethod == 'post' ? 'ไปรษณีย์' : 'รับหน้างาน' }}</small></span>
                            </p>
                        </li>
                        @if($ticket->deliveryMethod == 'post')
                            <li>
                                <p>
                                    <b>Address</b>
                                    <div class="text-right" style="padding-right: 25px; margin-top: -23px;">
                                        {{ $ticket->address }} <br>
                                        {{ $ticket->district->name }}
                                        {{ $ticket->area->name }} <br>
                                        {{ $ticket->province->name }}
                                        {{ $ticket->postalCode }}
                                    </div>
                                </p>
                            </li>
                        @endif
                        <li>
                            <p>
                                <b>Price</b>
                                <span>{{ number_format($ticket->price) }} Baht</span>
                            </p>
                        </li>
                        <li>
                            <p>
                                <b>Ticket Date</b>
                                <span>{{ $ticket->created_at->format('d F Y H:i') }}</span>
                            </p>
                        </li>
                        <li>
                            <p>
                                <b>Status</b>
                                <span>
                                    @if($ticket->paymentDatetime)
                                        <small class="bg-success px-2 py-1 text-white">ชำระเงินแล้ว</small>
                                    @elseif($ticket->isExpired())
                                        <small class="bg-secondary px-2 py-1 text-white">หมดอายุ</small>
                                    @else
                                        <small class="bg-danger px-2 py-1 text-white">ยังไม่ชำระเงิน</small>
                                    @endif
                                </span>
                            </p>
                        </li>
                        <li>
                            <p>
                                <b>Payment Method</b>
                                <span>
                                    @switch($ticket->paymentMethod)
                                        @case($Ticket::METHOD_CREDIT_CARD)
                                            Credit Card
                                        @break
                                        @case($Ticket::METHOD_QR_CODE)
                                            QR Code
                                        @break
                                        @case($Ticket::METHOD_IBANKING)
                                            Internet Banking
                                        @break
                                        @case($Ticket::METHOD_TRANSFER)
                                            Transfer
                                        @break
                                        @default
                                            -
                                        @break
                                    @endswitch
                                </span>
                            </p>
                        </li>
                        <li>
                            <p>
                                <b>Payment Date</b>
                                <span>
                                    @if($ticket->paymentDatetime)
                                        {{ $ticket->paymentDatetime->format('d F Y H:i') }}
                                    @else
                                        -
                                    @endif
                                </span>
                            </p>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 pr-0">
                    <div style="max-height: 350px; overflow-y: auto">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr class="bg-success">
                                    <th class="text-white">Name</th>
                                    <th class="text-white">Gender</th>
                                    <th class="text-white">Race Type</th>
                                    @if($ticket->event->shirtType)
                                        <th class="text-white">Shirt Type</th>
                                    @endif
                                    @if($ticket->event->shirtSize)
                                        <th class="text-white">Shirt Size</th>
                                    @endif
                                    <th class="text-white">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($ticket->ticketParticipants as $participant)
                                <tr>
                                    <td>{{ $loop->iteration }}. {{ $participant->firstName }} {{ $participant->lastName }}</td>
                                    <td>{{ $participant->gender == 'M' ? 'Man' : 'Woman' }}</td>
                                    <td>{{ $participant->raceType->name }}</td>
                                    @if($ticket->event->shirtType)
                                        <td>{{ $participant->shirtType }}</td>
                                    @endif
                                    @if($ticket->event->shirtSize)
                                        <td>{{ $participant->shirtSize }}</td>
                                    @endif
                                    <td>{{ number_format($participant->raceType->price) }} Baht</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @if(!$ticket->paymentDatetime && !$ticket->isExpired())
            @include('ticket.payment')
        @endif
    </div>
@endsection