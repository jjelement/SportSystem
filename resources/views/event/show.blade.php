@extends('layouts.template')

@section('content')
    <div class="container paddings-mini">
        <div class="row">
            <div class="col-lg-8">
                <!-- Content Text-->
                <div class="panel-box">
                    <div class="titles no-margin">
                        <h4>{{ $event->name }}</h4>
                    </div>
                    <img src="{{ asset('storage/'.$event->profileImage) }}" alt="" class="img-fluid">
                    <div class="info-panel">
                        <p>{{ $event->description }}</p>
                        <p>{!! $event->content !!}</p>
                    </div>
                </div>

            </div>
            <aside class="col-lg-4">
                <div class="panel-box">
                    <div class="titles no-margin">
                        <h4>Event Info</h4>
                    </div>
                    <div class="row">
                        <div class="info-panel">
                            <p>
                                <strong><i class="fa fa-clock-o"></i> Open Register :</strong>
                                <br>
                                {{ $event->startRegisterDate->format('d M Y H:i') }}
                                @if($event->endRegisterDate)
                                    - {{ $event->endRegisterDate->format('d M Y H:i') }}
                                @endif
                            </p>
                            <p>
                                <strong><i class="fa fa-calendar"></i> Event Date :</strong>
                                <br>
                                {{ $event->startDate->format('d M Y H:i') }}
                                @if($event->endDate)
                                    - {{ $event->endDate->format('d M Y H:i') }}
                                @endif
                            </p>
                            <p>
                                <strong><i class="fa fa-"></i> Status :</strong>
                                @switch($event->status())
                                    @case(0)
                                        <small class="bg-secondary text-white px-2 py-1">ยังไม่เปิดรับสมัคร</small>
                                        @break
                                    @case(1)
                                        <small class="bg-success text-white px-2 py-1">กำลังเปิดรับสมัคร</small>
                                        @break
                                    @case(2)
                                        <small class="bg-danger text-white px-2 py-1">ปิดรับสมัครแล้ว</small>
                                        @break
                                    @case(3)
                                        <small class="bg-warning text-white px-2 py-1">อยู่ในช่วงอีเว้นท์</small>
                                        @break
                                    @case(4)
                                        <small class="bg-info text-white px-2 py-1">จบอีเว้นท์</small>
                                        @break
                                @endswitch
                            </p>
                        </div>
                    </div>
                </div>

                <div class="panel-box">
                    <div class="titles no-margin">
                        <h4>Buy Ticket</h4>
                    </div>
                    <table class="table table-bordered table-hover mb-0">
                        <tbody>
                            @foreach($event->raceTypeList as $raceType)
                                <tr>
                                    <th>{{ $raceType->name }}</th>
                                    <td>{{ number_format($raceType->price) }} THB</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if($event->status() == 1)
                    <button class="btn btn-block btn-success rounded-0 btn-lg" data-toggle="modal" data-target="#buyModal">BUY !</button>
                    @endif
                </div>
            </aside>
        </div>
    </div>

    @if($event->status() == 1)
        @if(auth()->check())
            @include('event.event-modal')
        @else
            <div class="modal fade" tabindex="-1" role="dialog" id="buyModal" style="z-index: 9999">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Please login to join event!</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-success" href="{{ route('sign-in', ['ref' => url()->current()]) }}">Go to LOGIN <i class="fa fa-sign-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
@endsection
