@extends('backend.layouts.template')

@push('stylesheet')
    <link rel="stylesheet" href="{{ asset('assets/vendor/morris/morris.css') }}" />
@endpush

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                    </div>
                    <h2 class="panel-title">
                        Event: {{ $event->name }}
                    </h2>
                    <p class="panel-subtitle">
                        รับสมัคร:
                        {{ $event->startRegisterDate->format('d F Y') }}
                        @if($event->endRegisterDate)
                            - {{ $event->endRegisterDate->format('d F Y') }}
                            ({{ $event->startRegisterDate->diff($event->endRegisterDate)->days }} วัน)
                        @else
                            (1 วัน)
                        @endif
                        <span style="margin: 0 5px;">|</span>
                        วันงาน:
                        {{ $event->startDate->format('d F Y') }}
                        @if($event->endDate)
                            - {{ $event->endDate->format('d F Y') }}
                            ({{ $event->startDate->diff($event->endDate)->days }} วัน)
                        @else
                            (1 วัน)
                        @endif
                    </p>
                </header>

                <div class="panel-body text-center">
                    <img src="{{ asset('storage/'.$event->profileImage) }}" class="img-responsive" alt="" style="height: 300px;">
                </div>
            </section>

            <div class="row">
                <div class="col-lg-6">
                    <section class="panel">
                        <header class="panel-heading">
                            <div class="panel-actions">
                                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                            </div>
                            <h2 class="panel-title">จำนวนไซส์เสื้อ</h2>
                        </header>

                        <div class="panel-body">
                            <div class="chart chart-md" id="sizeBar"></div>
                        </div>
                    </section>
                </div>

                <div class="col-lg-6">
                    <section class="panel">
                        <header class="panel-heading">
                            <div class="panel-actions">
                                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                            </div>
                            <h2 class="panel-title">อายุผู้เข้าร่วม</h2>
                        </header>

                        <div class="panel-body">
                            <div class="chart chart-md" id="sizeBar"></div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                    </div>
                    <h2 class="panel-title">
                        ผู้เข้าร่วม (
                        {{ $event->ticketParticipants->count() }}
                        @if($event->maxParticipants)
                            / {{ $event->maxParticipants }}
                        @endif
                        )
                    </h2>
                </header>

                <div class="panel-body">
                    <div class="scrollable visible-slider colored-slider" data-plugin-scrollable style="height: 300px">
                        <div class="scrollable-content">
                            <table class="table">
                                @forelse($event->ticketParticipants as $participant)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $participant->firstName }} {{ $participant->lastName }}</td>
                                        <td>{{ $participant->tel }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center"><i>ยังไม่มีผู้เข้าร่วม</i></td>
                                    </tr>
                                @endforelse
                            </table>
                        </div>
                    </div>
                </div>
            </section>

            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                    </div>
                    <h2 class="panel-title">เพศของผู้เข้าร่วม</h2>
                </header>

                <div class="panel-body">
                    <div class="chart chart-md" id="genderBar"></div>
                </div>
            </section>
        </div>
    </div>
@endsection

@push('javascript')
    <script src="{{ asset('assets/vendor/morris/morris.js') }}"></script>
    <script src="{{ asset('assets/vendor/raphael/raphael.js') }}"></script>

    <script type="text/javascript">
        var shirtSizeData = [
            {
                x: 'S',
                y: 21
            },
            {
                x: 'M',
                y: 74
            },
            {
                x: 'L',
                y: 32
            },
            {
                x: 'XL',
                y: 11
            }
        ];

        var genderData = [{
            label: "ชาย",
            value: 44
        }, {
            label: "หญิง",
            value: 38
        }];


        Morris.Bar({
            resize: true,
            element: 'sizeBar',
            data: shirtSizeData,
            xkey: 'x',
            ykeys: ['y'],
            labels: ['Size'],
            hideHover: true,
            barColors: ['#2baab1']
        });

        Morris.Donut({
            resize: true,
            element: 'genderBar',
            data: genderData,
            colors: ['#0088cc', '#734ba9']
        });
    </script>
@endpush