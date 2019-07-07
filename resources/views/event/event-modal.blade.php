<div class="modal fade" tabindex="-1" role="dialog" id="buyModal" style="z-index: 9999">
    <div class="modal-dialog" style="max-width: 80%" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Buy Ticket</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('event.submit', $event->id) }}" id="submit-form" method="POST" class="form-horizontal padding-top-mini">
                            @csrf
                            <div class="form-group">
                                <label class="control-label col-sm-3">Delivery Method</label>
                                <div class="col-sm-8">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-secondary active text-white">
                                            <input type="radio" name="deliveryMethod" autocomplete="off" checked value="post"> By post
                                        </label>
                                        @if($event->canWalkIn)
                                            <label class="btn btn-secondary text-white">
                                                <input type="radio" name="deliveryMethod" autocomplete="off" value="walk-in"> Walk In
                                            </label>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div id="address-area">
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
                            </div>

                            <hr>

                            <div id="participant-error" class="alert alert-danger" style="display: none;">
                                <i class="fa fa-times"></i>
                                กรุณาเพิ่มผู้เข้าร่วมงาน
                            </div>
                            <table class="table participant-table">
                                <thead>
                                    <tr class="bg-success">
                                        <th colspan="4" class="text-white">Participant(s)</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>

                            <div class="text-right">
                                <button type="button" class="btn btn-primary add-part-btn">
                                    <i class="fa fa-plus"></i> Add Participant
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6" style="border-left: 1px solid #CCC;">
                        <div id="add-participant-box" style="display: none">
                            <h4 id="info-header">
                                Add Ticket
                            </h4>
                            <form action="#" id="add-ticket-form" class="form-horizontal padding-top-mini">
                                @csrf
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" id="email" name="email" class="form-control" required="" value="{{ $profile->email }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">First Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="firstName" name="firstName" class="form-control" required="" value="{{ $profile->firstName }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Last Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="lastName" name="lastName" class="form-control" required="" value="{{ $profile->lastName }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">ID Card / Passport No</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="passportNo" name="passportNo" class="form-control" value="{{ $profile->passportNo }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Gender</label>
                                    <div class="col-sm-8">
                                        <select id="gender" name="gender" class="form-control" required="">
                                            <option value="">Select Gender</option>
                                            <option value="M" {!! $profile->gender == 'M' ? 'selected' : '' !!}>Male</option>
                                            <option value="F" {!! $profile->gender == 'F' ? 'selected' : '' !!}>Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Birthdate</label>
                                    <div class="col-sm-2">
                                        <select name="day" id="day" class="form-control">
                                            @foreach(range(1, 31) as $day)
                                                <option value="{{ $day }}" {!! $day == $birthDate['day'] ? 'selected' : '' !!}>{{ $day }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select name="month" id="month" class="form-control">
                                            @foreach(range(1, 12) as $month)
                                                <option value="{{ $month }}" {!! $month == $birthDate['month'] ? 'selected' : '' !!}>{{ date('F', mktime(0, 0, 0, $month, 10)) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="year" id="year" class="form-control">
                                            @foreach(range(date('Y'), date('Y')-100) as $year)
                                                <option value="{{ $year }}" {!! $year == $birthDate['year'] ? 'selected' : '' !!}>{{ $year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Phone Number</label>
                                    <div class="col-sm-8">
                                        <input type="number" id="tel" name="tel" class="form-control" required="" value="{{ $profile->tel }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-3">Health Issue</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="healthIssue" name="healthIssue" class="form-control" value="{{ $profile->healthIssue }}" placeholder="โรคประจำตัว">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Blood Type</label>
                                    <div class="col-sm-8">
                                        <select id="bloodType" name="bloodType" class="form-control" required="">
                                            <option value="">กรุ๊ปเลือด</option>
                                            <option value="A" {!! $profile->bloodType == 'A' ? 'selected' : '' !!}>A</option>
                                            <option value="B" {!! $profile->bloodType == 'B' ? 'selected' : '' !!}>B</option>
                                            <option value="AB" {!! $profile->bloodType == 'AB' ? 'selected' : '' !!}>AB</option>
                                            <option value="O" {!! $profile->bloodType == 'O' ? 'selected' : '' !!}>O</option>
                                            <option value="Unknown" {!! $profile->bloodType == 'Unknown' ? 'selected' : '' !!}>Unknown</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Emergency Contact Person</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="contactName" name="contactName" class="form-control" placeholder="ชื่อผู้ติดต่อฉุกเฉิน">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Contact Relationship</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="contactRelationship" name="contactRelationship" class="form-control" placeholder="ความสัมพันธ์">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Emergency Phone Number</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="contactPhoneNumber" name="contactPhoneNumber" class="form-control" placeholder="เบอร์ติดต่อฉุกเฉิน">
                                    </div>
                                </div>
                                @if($event->shirtType)
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Shirt Type</label>
                                        <div class="col-sm-8">
                                            <select name="shirtType" id="shirtType" class="form-control" required>
                                                <option value="">--- Select Shirt Type ---</option>
                                                @foreach(explode(',', $event->shirtType) as $shirtType)
                                                    <option value="{{ $shirtType }}">{{ $shirtType }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif
                                @if($event->shirtSize)
                                    <div class="form-group">
                                        <label class="control-label col-sm-3">Shirt Size</label>
                                        <div class="col-sm-8">
                                            <select name="shirtSize" id="shirtSize" class="form-control" required>
                                                <option value="">--- Select Shirt Size ---</option>
                                                @foreach(explode(',', $event->shirtSize) as $shirtSize)
                                                    <option value="{{ $shirtSize }}">{{ $shirtSize }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Race Type</label>
                                    <div class="col-sm-8">
                                        <select name="raceTypeId" id="raceTypeId" class="form-control" required>
                                            <option value="">--- Select Race Type ---</option>
                                            @foreach($event->raceTypeList as $raceType)
                                                <option value="{{ $raceType->id }}">{{ $raceType->name }} - {{ number_format($raceType->price) }} THB</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="timestamp" id="timestamp" value="">

                                <button type="submit" class="btn btn-info btn-sm ok-btn">
                                    <i class="fa fa-check"></i> Save
                                </button>
                                <button type="button" class="btn btn-secondary cancel-btn btn-sm">
                                    <i class="fa fa-ban"></i> Cancel
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="submit-ticket-btn"><i class="fa fa-shopping-cart"></i> BUY TICKET !</button>
            </div>
        </div>
    </div>
</div>

@push('javascript')
    <script>
        $(function() {
            let editTimestamp = null;
            $('#submit-ticket-btn').click(function () {
                if($('.participant-table tbody tr').length) {
                    $('#participant-error').hide();
                    $('#submit-form').submit();
                } else {
                    $('#participant-error').show();
                }
            });

            $('#provinceId').change(function() {
                let val = $(this).val();
                if(val) {
                    $.get('/api/address/area/' + val, function(data) {
                        $('#areaId option:not(:first-child)').remove();
                        $('#districtId option:not(:first-child)').remove();

                        $('#areaId').attr('disabled', false);
                        $('#districtId').attr('disabled', true);

                        let areas = data.map(function(area) {
                            return '<option value="'+area.id+'" data-postcode="'+area.postcode+'">'+area.name+'</option>';
                        });
                        $('#areaId').append(areas.join(''));
                    });
                } else {
                    $('#postalCode').val('');
                    $('#areaId').val('').attr('disabled', true);
                    $('#districtId').val('').attr('disabled', true);
                }
            });

            $('#areaId').change(function() {
                let val = $(this).val();
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
                } else {
                    $('#postalCode').val('');
                    $('#districtId').val('').attr('disabled', true);
                }
            });

            let hidePartBox = function() {
                $('#add-participant-box').hide();
                $('.add-part-btn').removeClass('disabled');
            }

            let clearPartBox = function() {
                // console.log('asd')
                $('#add-participant-box input').not('[name^="_"]').val('');
                $('#add-participant-box select').val('');
            }

            let getParticipant = function() {
                $.ajax({
                    url: "{{ route('event.get-participants', $event->id) }}",
                    method: "GET",
                    success: function(response) {
                        let totalPrice = 0;
                        let html = Object.keys(response).map(function(key) {
                            let participant = response[key];
                            totalPrice += participant.raceType.price;
                            return '<tr>\n' +
                                '    <th>' + participant.raceType.name + '</th>\n' +
                                '    <td>' + participant.firstName + ' ' + participant.lastName + '</td>\n' +
                                '    <td>' + participant.raceType.price + ' THB</td>\n' +
                                '    <td>' +
                                '       <button type="button" data-timestamp="' + key + '" class="edit-participant-btn btn btn-sm btn-info text-white" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></button>' +
                                '       <button type="button" data-timestamp="' + key + '" class="remove-participant-btn btn btn-sm btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></button>' +
                                '    </td>' +
                                '</tr>';
                        })
                        $('.participant-table tbody').html(html.join(''));

                        $('.edit-participant-btn').unbind().click(function() {
                            editTimestamp = $(this).data('timestamp');
                            let $tr = $(this).parent().parent();
                            $.ajax({
                                url: "{{ route('event.get-participants', $event->id) }}?timestamp=" + editTimestamp,
                                method: "GET",
                                success: function(response) {
                                    Object.keys(response).forEach(function(key) {
                                        if(key != 'raceType')
                                            $('#add-participant-box #' + key).val(response[key]);
                                    })
                                    $('#info-header').html('Edit Participant: ' + response.firstName + ' ' + response.lastName);
                                    $('#add-participant-box').show();
                                    $('.add-part-btn').addClass('disabled');
                                    $tr.addClass('bg-warning');
                                }
                            })
                        });

                        $('.remove-participant-btn').unbind().click(function() {
                            let timestamp = $(this).data('timestamp');
                            if(!confirm('Are you sure to remove this participant ?')) return;

                            $.ajax({
                                url: "{{ route('event.remove-participant', $event->id) }}?timestamp=" + timestamp,
                                method: "DELETE",
                                data: { _token: "{{ csrf_token() }}" },
                                complete: function() {
                                    getParticipant();
                                    $('.cancel-btn').click();
                                }
                            })
                        })
                    }
                })
            }
            getParticipant();

            $('input[name="deliveryMethod"]').change(function() {
                if($(this).val() == 'post') {
                    $('#address-area').slideDown();
                } else {
                    $('#address-area').slideUp();
                }
            });

            $('.add-part-btn').click(function() {
                if(!$(this).hasClass('disabled')) {
                    $(this).addClass('disabled');
                    $('#info-header').html('Add Participant');
                    if($('.participant-table tbody tr').length) {
                        clearPartBox();
                    }
                    $('#add-participant-box').show();
                }
            })

            $('form#add-ticket-form').submit(function(e) {
                e.preventDefault();
                let $form = $(this);
                $.ajax({
                    url: "{{ route('event.add-participant', $event->id) }}",
                    method: "POST",
                    data: $form.serialize(),
                    complete: function() {
                        getParticipant();
                        hidePartBox();
                        clearPartBox();
                        $('.cancel-btn').click();
                    }
                });
            })

            $('.cancel-btn').click(function() {
                hidePartBox();
                $('.participant-table tbody tr.bg-warning').removeClass('bg-warning');
                editTimestamp = null;
            })
        })
    </script>
@endpush