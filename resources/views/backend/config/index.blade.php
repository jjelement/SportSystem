@extends('backend.layouts.template')

@section('content')
    <section class="panel">
        <div class="panel-body">
            @include('backend.layouts.validation')
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                <tr>
                    <th width="50">#</th>
                    <th>Key</th>
                    <th>Value</th>
                    <th>แก้ไขล่าสุด</th>
                    <th width="150">จัดการ</th>
                </tr>
                </thead>
                <tbody>
                @forelse($configs as $config)
                    <tr>
                        <td>{{ $config->id }}</td>
                        <td>{{ $config->key }}</td>
                        <td>{{ $config->value }}</td>
                        <td>{{ $config->updated_at->format('d F Y H:i:s') }}</td>
                        <td>
                            <a href="{{ route('backend.config.edit', $config->id) }}" class="btn btn-warning"
                               data-toggle="tooltip" title="Edit">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9"><i>ไม่มีข้อมูล</i></td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection