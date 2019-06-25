@extends('layouts.template')

@push('stylesheet')
    <style>
        .form-theme input[type="checkbox"] {
            width: auto;
            height: auto;
        }
    </style>
@endpush

@section('content')
    <div class="container paddings">
        <!-- Content Text-->
        <div class="panel-box block-form">
            <div class="titles text-center">
                <h4>LOGIN TO JOIN YOUR EVENT !</h4>
            </div>

            <div class="info-panel">
                @if(session('success'))
                    <div class="alert alert-success">
                        <i class="fa fa-check"></i> {{ session('success') }}
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger">
                        <i class="fa fa-times"></i> {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('sign-in') }}" method="POST" class="form-horizontal padding-top-mini">
                    @csrf
                    <input type="hidden" name="ref" value="{{ request('ref') }}">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Username / E-mail</label>
                        <div class="col-sm-9">
                            <input type="text" id="username" name="username" class="form-control" required="" value="{{ old('username') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Password</label>
                        <div class="col-sm-9">
                            <input type="password" id="password" name="password" class="form-control" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 offset-sm-3">
                            <input type="checkbox" id="rememberme" name="rememberme" {!! old('rememberme') ? 'checked' : '' !!}>
                            <label class="control-label" for="rememberme">Remember Me</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="offset-sm-3 col-sm-9 text-center">
                            <input type="submit" value="LOGIN" class="bnt btn-iw">
                            or <a href="{{ route('sign-up') }}">Register</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection