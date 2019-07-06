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

                    <div class="form-group">
                        <label class="control-label col-sm-3">Blood Type</label>
                        <div class="col-sm-9">
                            <select id="bloodType" name="bloodType" class="form-control" required="">
                                <option value="">กรุ๊ปเลือด</option>
                                @foreach(['A', 'B', 'AB', 'O', 'Unknown'] as $bloodType)
                                    <option value="{{ $bloodType }}" {{ old('bloodType', $profile->bloodType) == $bloodType ? 'selected' : ''}}>{{ $bloodType }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Health Issue</label>
                        <div class="col-sm-9">
                            <input type="text" id="healthIssue" name="healthIssue" class="form-control" value="{{ old('healthIssue', $profile->healthIssue) }}">
                        </div>
                    </div>
                    <hr>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Province</label>
                        <div class="col-sm-9">
                            <select name="provinceId" id="provinceId" class="form-control" required>
                                <option value="">----- เลือกจังหวัด -----</option>
                                @foreach($provinces as $province)
                                    <option value="{{ $province->id }}" {!! old('provinceId', $profile->district->province_id) == $province->id ? 'selected' : '' !!}>
                                        {{ $province->name }} / {{ ucfirst($province->name_en) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Area</label>
                        <div class="col-sm-9">
                            <select name="areaId" id="areaId" class="form-control" required>
                                <option value="">----- เลือกเขต/อำเภอ -----</option>
                                @foreach($provinces->find(old('provinceId', $profile->district->province_id))->areas as $area)
                                    <option value="{{ $area->id }}" {!! old('areaId', $profile->district->area_id) == $area->id ? 'selected' : '' !!} data-postcode="{{ $area->postcode }}">
                                        {{ $area->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">District</label>
                        <div class="col-sm-9">
                            <select name="districtId" id="districtId" class="form-control" required>
                                <option value="">----- เลือกแขวง/ตำบล -----</option>
                                @foreach($provinces->find(old('provinceId', $profile->district->province_id))->districts()->where('area_id', old('areaId', $profile->district->area_id))->get() as $district)
                                    <option value="{{ $district->id }}" {!! old('districtId', $profile->district_id) == $district->id ? 'selected' : '' !!}>
                                        {{ $district->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Postal Code</label>
                        <div class="col-sm-9">
                            <input type="number" maxlength="5" id="postalCode" name="postalCode" class="form-control" required="" value="{{ old('postalCode', $profile->district->area->postcode) }}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">House No. and Address</label>
                        <div class="col-sm-9">
                            <textarea name="address" id="address" class="form-control" rows="3">{{ old('address', $profile->address) }}</textarea>
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


@push('javascript')
    <script>
        $(function() {
            $('#provinceId').change(function() {
                let val = $(this).val();
                $('#postalCode').val('');
                $('#areaId').val('').attr('disabled', true);
                $('#districtId').val('').attr('disabled', true);

                if(val) {
                    $.get('/api/address/area/' + val, function(data) {
                        $('#areaId option:not(:first-child)').remove();
                        $('#districtId option:not(:first-child)').remove();

                        $('#areaId').attr('disabled', false);

                        let areas = data.map(function(area) {
                            return '<option value="'+area.id+'" data-postcode="'+area.postcode+'">'+area.name+'</option>';
                        });
                        $('#areaId').append(areas.join(''));
                    });
                }
            });

            $('#areaId').change(function() {
                let val = $(this).val();
                $('#postalCode').val('');
                $('#districtId').val('').attr('disabled', true);

                if(val) {
                    let postcode = $(this).find('option:selected').data('postcode');
                    $('#postalCode').val(postcode);
                    $.get('/api/address/district/' + val, function(data) {
                        $('#districtId option:not(:first-child)').remove();

                        $('#districtId').attr('disabled', false);

                        let districts = data.map(function(district) {
                            return '<option value="'+district.id+'">'+district.name+'</option>';
                        })
                        $('#districtId').append(districts.join(''));
                    });
                }
            });
        })
    </script>
@endpush