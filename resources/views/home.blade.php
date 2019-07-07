@extends('layouts.template')

@push('stylesheet')
    <style>
        div.titles > h4 {
            font-size: 1.8rem;
        }
        .clear-title {
            display: block;
        }
        iframe {
            height: 280px;
        }
    </style>
@endpush

@section('content')
    <div class="white-section paddings">
        <div class="container">

            <div class="row">
                <div class="col-sm-7">
                    <h3 class="clear-title"><i class="fa fa-list"></i> Events</h3>
                    <div class="row portfolioContainer">
                        @foreach($events as $event)
                            <div class="col-sm-6 soccer">
                                <div class="item-gallery">
                                    <div class="hover">
                                        <a href="{{ route('event.show', $event->id) }}">
                                            <img src="{{ asset('storage/'.$event->profileImage) }}" alt="{{ $event->name }}" />
                                        </a>
                                    </div>
                                    <div class="info-gallery text-center">
                                        <h3><a href="{{ route('event.show', $event->id) }}">{{ $event->name }}</a></h3>
                                        <hr>
                                        <p>{{ $event->description }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-5">
                    <h3 class="clear-title"><i class="fa fa-video-camera"></i> Video</h3>
                    @if(!empty($configs['youtube_url']))
                        <iframe width="560" height="500" src="{{ str_replace('watch?v=', 'embed/', $configs['youtube_url']) }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection