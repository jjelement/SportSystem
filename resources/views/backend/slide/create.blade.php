@extends('backend.layouts.template')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <form method="POST" action="{{ route('backend.slide.store') }}" class="form-horizontal form-bordered" enctype="multipart/form-data">
                    @csrf
                    <header class="panel-heading">
                        <div class="panel-actions">
                            <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                        </div>

                        <h2 class="panel-title">Add Slide</h2>
                    </header>

                    <div class="panel-body">
                        @include('backend.layouts.validation')

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="profile_image">รูป</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" id="profileImage" name="profileImage" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="title">หัวข้อ</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="description">คำอธิบาย</label>
                            <div class="col-md-6">
                                <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="link">ลิงค์ (URL)</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="link" name="link" value="{{ old('link') }}" required>
                            </div>
                        </div>
                    </div>

                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-sm-9 col-sm-offset-3">
                                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Submit</button>
                                <a href="{{ route('backend.slide.index') }}" class="btn btn-info"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
                            </div>
                        </div>
                    </footer>
                </form>
            </section>
        </div>
    </div>
@endsection