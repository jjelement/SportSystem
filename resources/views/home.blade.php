@extends('layouts.template')

@push('stylesheet')
    <style>
        div.titles > h4 {
            font-size: 1.8rem;
        }
    </style>
@endpush

@section('content')
    <div class="white-section paddings">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <h3 class="clear-title no-margin"><i class="fa fa-list"></i> Events</h3>
                </div>
            </div>

            <div class="row portfolioContainer margin-top">
                @foreach($events as $event)
                    <div class="col-sm-6 col-lg-4 soccer">
                        <div class="item-gallery">
                            <div class="hover">
                                <a href="{{ route('event', $event->id) }}">
                                    <img src="{{ asset('storage/'.$event->profileImage) }}" alt="{{ $event->name }}" />
                                </a>
                            </div>
                            <div class="info-gallery text-center">
                                <h3><a href="{{ route('event', $event->id) }}">{{ $event->name }}</a></h3>
                                <hr>
                                <p>{{ $event->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection