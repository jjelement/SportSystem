@extends('backend.layouts.template')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <form method="POST" action="{{ route('backend.event.update', $event->id) }}" class="form-horizontal form-bordered" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <header class="panel-heading">
                        <div class="panel-actions">
                            <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                        </div>

                        <h2 class="panel-title">Edit Event: {{ $event->name }}</h2>
                    </header>

                    <div class="panel-body">
                        @include('backend.layouts.validation')

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="profile_image">รูป</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" id="profileImage" name="profileImage">
                                <br>
                                <img src="{{ asset('storage/'.$event->profileImage) }}" alt="" class="img-responsive">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="title">ชื่องาน</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $event->name) }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="description">คำโปรย</label>
                            <div class="col-md-6">
                                <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $event->description) }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="maxParticipants">จำกัดจำนวนผู้เข้าร่วมงาน (ถ้าไม่จำกัดไม่ต้องใส่)</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" id="maxParticipants" name="maxParticipants" value="{{ old('maxParticipants', $event->maxParticipants) }}" min="1">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="maxParticipants">เปิดรับสมัคร</label>
                            <div class="col-md-6">
                                <div class="input-daterange input-group" data-plugin-datepicker data-plugin-options='{"format": "yyyy-mm-dd"}'>
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" class="form-control" name="startRegisterDate" value="{{ old('startRegisterDate', $event->startRegisterDate->format('Y-m-d')) }}" required>
                                    <span class="input-group-addon">ถึง</span>
                                    <input type="text" class="form-control" name="endRegisterDate" value="{{ old('endRegisterDate', $event->endRegisterDate->format('Y-m-d')) }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="maxParticipants">วันงาน</label>
                            <div class="col-md-6">
                                <div class="input-daterange input-group" data-plugin-datepicker data-plugin-options='{"format": "yyyy-mm-dd"}'>
                                    <span class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="text" class="form-control" name="startDate" value="{{ old('startDate', $event->startDate->format('Y-m-d')) }}" required>
                                    <span class="input-group-addon">ถึง</span>
                                    <input type="text" class="form-control" name="endDate" value="{{ old('endDate', $event->endDate->format('Y-m-d')) }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">รับบัตรหน้างาน</label>
                            <div class="col-md-6">
                                <select class="form-control" name="canWalkIn">
                                    <option value="1" {{ old('canWalkIn', $event->canWalkIn) == 1 ? 'selected' : '' }}>ได้</option>
                                    <option value="0" {{ old('canWalkIn', $event->canWalkIn) == 0 ? 'selected' : '' }}>ไม่ได้</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">ประเภทเสื้อ (ว่างหากไม่มี)</label>
                            <div class="col-md-6">
                                <input name="shirtType" id="shirtType" data-role="tagsinput" data-tag-class="label label-primary" class="form-control" value="{{ old('shirtType', $event->shirtType) }}"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">ไซส์เสื้อ (ว่างหากไม่มี)</label>
                            <div class="col-md-6">
                                <input name="shirtSize" id="shirtSize" data-role="tagsinput" data-tag-class="label label-primary" class="form-control" value="{{ old('shirtSize', $event->shirtSize) }}"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="content">Content</label>
                            <div class="col-md-6">
                                <textarea class="form-control summernote" id="content" name="content" rows="4">{!! old('content', $event->content) !!}</textarea>
                            </div>
                        </div>

                        @include('backend.event.race-type')
                    </div>

                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-sm-9 col-sm-offset-3">
                                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Submit</button>
                                <a href="{{ route('backend.event.index') }}" class="btn btn-info"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
                            </div>
                        </div>
                    </footer>
                </form>
            </section>
        </div>
    </div>
@endsection