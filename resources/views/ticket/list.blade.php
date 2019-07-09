@extends('layouts.template')
@section('content')
    <div class="container paddings">
        @if($success = session('success'))
            <div class="alert alert-success">
                <i class="fa fa-check"></i> {{ $success }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="panel-box">
            <div class="titles no-margin">
                <h4><i class="fa fa-list"></i>HISTORY</h4>
            </div>

            <table class="table table-striped table-hover">
                <thead>
                    <tr class="bg-success">
                        <th class="text-white">Date</th>
                        <th class="text-white">Event</th>
                        <th class="text-white">Participant</th>
                        <th class="text-white">Price</th>
                        <th class="text-white">Status</th>
                        <th class="text-white">Action</th>
                    </tr>
                </thead>
                @foreach($tickets as $ticket)
                    <tr>
                        <td>
                            <i class="fa fa-calendar"></i> {{ $ticket->created_at->format('d F Y') }} <br>
                            <i class="fa fa-clock-o"></i> {{ $ticket->created_at->format('H:i') }}
                        </td>
                        <td>
                            <a href="{{ route('event.show', $ticket->event_id) }}">{{ $ticket->event->name }}</a>
                        </td>
                        <td>
                            {{ $ticket->ticketParticipants->count() }}
                        </td>
                        <td>
                            {{ number_format($ticket->price) }} Baht
                        </td>
                        <td>
                            @if($ticket->transaction)
                                <small class="bg-success px-2 py-1 text-white">ชำระเงินแล้ว</small>
                            @elseif($ticket->isExpired())
                                <small class="bg-danger px-2 py-1 text-white">หมดอายุ</small>
                            @else
                                <small class="bg-danger px-2 py-1 text-white">ยังไม่ชำระเงิน</small>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('ticket.show', $ticket->id) }}" class="btn btn-info btn-sm">
                                <i class="fa fa-search"></i> View
                            </a>
                            @if(!$ticket->transaction)
                                <form action="{{ route('ticket.remove', $ticket->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure to cancel this ticket ?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> Cancel
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection