@extends('backend.layouts.template')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <form method="POST" action="{{ route('backend.config.update', $config->id) }}" class="form-horizontal form-bordered" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <header class="panel-heading">
                        <div class="panel-actions">
                            <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                        </div>

                        <h2 class="panel-title">Edit Config</h2>
                    </header>

                    <div class="panel-body">
                        @include('backend.layouts.validation')

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="key">Key</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="key" name="key" value="{{ old('key', $config->key) }}" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="value">Value</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="value" name="value" value="{{ old('value', $config->value) }}" required>
                            </div>
                        </div>
                    </div>

                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-sm-9 col-sm-offset-3">
                                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Submit</button>
                                <a href="{{ route('backend.config.index') }}" class="btn btn-info"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
                            </div>
                        </div>
                    </footer>
                </form>
            </section>
        </div>
    </div>
@endsection