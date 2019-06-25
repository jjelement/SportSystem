@extends('layouts.template')

@section('content')
    <div class="container paddings">
        <!-- Content Text-->
        <div class="panel-box block-form">
            <div class="titles text-center">
                <h4>REGISTER YOUR EVENT NOW !</h4>
            </div>

            <div class="info-panel">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('sign-up') }}" method="POST" class="form-horizontal padding-top-mini">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-sm-3">Username</label>
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
                        <label class="control-label col-sm-3">Confirm Password</label>
                        <div class="col-sm-9">
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Email</label>
                        <div class="col-sm-9">
                            <input type="email" id="email" name="email" class="form-control" required="" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">First Name</label>
                        <div class="col-sm-9">
                            <input type="text" id="firstName" name="firstName" class="form-control" required="" value="{{ old('firstName') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Last Name</label>
                        <div class="col-sm-9">
                            <input type="text" id="lastName" name="lastName" class="form-control" required="" value="{{ old('lastName') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Passport No (ถ้ามี)</label>
                        <div class="col-sm-9">
                            <input type="text" id="passportNo" name="passportNo" class="form-control" value="{{ old('passportNo') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Gender</label>
                        <div class="col-sm-9">
                            <select id="gender" name="gender" class="form-control" required="">
                                <option value="">Select Gender</option>
                                <option value="M" {!! old('gender') == 'M' ? 'selected' : '' !!}>Male</option>
                                <option value="F" {!! old('gender') == 'F' ? 'selected' : '' !!}>Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Birthdate</label>
                        <div class="col-sm-2">
                            <select name="day" id="day" class="form-control">
                                @foreach(range(1, 31) as $day)
                                    <option value="{{ $day }}" {!! $day == old('day') ? 'selected' : '' !!}>{{ $day }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <select name="month" id="month" class="form-control">
                                @foreach(range(1, 12) as $month)
                                    <option value="{{ $month }}" {!! $day == old('month') ? 'selected' : '' !!}>{{ date('F', mktime(0, 0, 0, $month, 10)) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select name="year" id="year" class="form-control">
                                @foreach(range(date('Y'), date('Y')-100) as $year)
                                    <option value="{{ $year }}" {!! $day == old('year') ? 'selected' : '' !!}>{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Phone Number</label>
                        <div class="col-sm-4">
                            <input type="number" id="tel" name="tel" class="form-control" required="" value="{{ old('tel') }}">
                        </div>

                        <label class="control-label col-sm-1">or</label>
                        <div class="col-sm-4">
                            <input type="number" id="tel_2" name="tel2" class="form-control" value="{{ old('tel2') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Blood Type</label>
                        <div class="col-sm-8">
                            <select id="bloodType" name="bloodType" class="form-control" required="">
                                <option value="">กรุ๊ปเลือด</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>
                                <option value="Unknown">Unknown</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Health Issue</label>
                        <div class="col-sm-9">
                            <input type="text" id="healthIssue" name="healthIssue" class="form-control" value="{{ old('healthIssue') }}">
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Province</label>
                        <div class="col-sm-9">
                            <select name="province" id="province" class="form-control">
                                @foreach($provinces as $province)
                                    <option value="{{ $province->name_th }}" {!! old('province') == $province->name_th ? 'selected' : '' !!}>
                                        {{ $province->name_th }} / {{ $province->name_en }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Area</label>
                        <div class="col-sm-9">
                            <input type="text" id="district" name="area" placeholder="อำเภอ/เขต" class="form-control" required="" value="{{ old('area') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">District</label>
                        <div class="col-sm-9">
                            <input type="text" id="area" name="district" placeholder="ตำบล/แขวง" class="form-control" required="" value="{{ old('district') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">House No. and Address</label>
                        <div class="col-sm-9">
                            <textarea name="address" id="address" class="form-control" rows="3" required>{{ old('address') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Postal Code</label>
                        <div class="col-sm-9">
                            <input type="number" maxlength="5" id="postalCode" name="postalCode" class="form-control" required="" value="{{ old('postalCode') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="offset-sm-3 col-sm-9 text-center">
                            <button type="submit" class="bnt btn-iw">REGISTER</button>
                            or <a href="{{ route('sign-in') }}">Login</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection