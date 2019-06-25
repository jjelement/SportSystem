@extends('layouts.template')

@section('content')
    <div class="container paddings">
        <!-- Content Text-->
        <div class="panel-box block-form">
            <div class="titles text-center">
                <h4><i class="fa fa-pencil"></i> EDIT PROFILE</h4>
            </div>

            <div class="info-panel">
                @if(session('success'))
                    <div class="alert alert-success">
                        <i class="fa fa-check"></i> {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('profile') }}" method="POST" class="form-horizontal padding-top-mini">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-sm-3">Email</label>
                        <div class="col-sm-9">
                            <input type="email" id="email" name="email" class="form-control" required="" value="{{ $profile->email }}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">First Name</label>
                        <div class="col-sm-9">
                            <input type="text" id="firstName" name="firstName" class="form-control" required="" value="{{ $profile->firstName }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Last Name</label>
                        <div class="col-sm-9">
                            <input type="text" id="lastName" name="lastName" class="form-control" required="" value="{{ $profile->lastName }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Passport No (ถ้ามี)</label>
                        <div class="col-sm-9">
                            <input type="text" id="passportNo" name="passportNo" class="form-control" value="{{ $profile->passportNo }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Gender</label>
                        <div class="col-sm-9">
                            <select id="gender" name="gender" class="form-control" required="">
                                <option value="">Select Gender</option>
                                <option value="M" {!! $profile->gender == 'M' ? 'selected' : '' !!}>Male</option>
                                <option value="F" {!! $profile->gender == 'F' ? 'selected' : '' !!}>Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Phone Number</label>
                        <div class="col-sm-4">
                            <input type="number" id="tel" name="tel" class="form-control" required="" value="{{ $profile->tel }}">
                        </div>

                        <label class="control-label col-sm-1">or</label>
                        <div class="col-sm-4">
                            <input type="number" id="tel_2" name="tel2" class="form-control" value="{{ $profile->tel2 }}">
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Province</label>
                        <div class="col-sm-9">
                            <select name="province" id="province" class="form-control">
                                @foreach($provinces as $province)
                                    <option value="{{ $province->name_th }}" {!! $profile->province == $province->name_th ? 'selected' : '' !!}>
                                        {{ $province->name_th }} / {{ $province->name_en }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Area</label>
                        <div class="col-sm-9">
                            <input type="text" id="district" name="area" placeholder="อำเภอ/เขต" class="form-control" required="" value="{{ $profile->area }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">District</label>
                        <div class="col-sm-9">
                            <input type="text" id="area" name="district" placeholder="ตำบล/แขวง" class="form-control" required="" value="{{ $profile->district }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">House No. and Address</label>
                        <div class="col-sm-9">
                            <textarea name="address" id="address" class="form-control" rows="3" required>{{ $profile->address }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Postal Code</label>
                        <div class="col-sm-9">
                            <input type="number" id="postalCode" name="postalCode" class="form-control" required="" value="{{ $profile->postalCode }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="offset-sm-3 col-sm-9 text-center">
                            <button type="submit" class="bnt btn-iw">SAVE</button>
                            or <a href="{{ route('sign-in') }}">Login</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection