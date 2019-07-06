@extends('backend.layouts.template')

@section('content')
    <section class="panel">
        <div class="panel-body">
            <div class="text-right mb-md">
                <a href="{{ route('backend.slide.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Add</a>
            </div>
            @include('backend.layouts.validation')
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                <tr>
                    <th width="50">#</th>
                    <th>หัวข้อ</th>
                    <th>คำอธิบาย</th>
                    <th>ลิงค์</th>
                    <th>วันที่เพิ่ม</th>
                    <th width="150">จัดการ</th>
                </tr>
                </thead>
                <tbody>
                @forelse($slides as $slide)
                    <tr>
                        <td>{{ $slide->id }}</td>
                        <td>{{ $slide->title }}</td>
                        <td>{{ \Str::limit($slide->description, 32) }}</td>
                        <td><a href="{{ $slide->link }}" target="_blank">{{ $slide->link }}</a></td>
                        <td>{{ $slide->created_at->format('d F Y H:i:s') }}</td>
                        <td>
                            <a href="{{ route('backend.slide.edit', $slide->id) }}" class="btn btn-warning"
                               data-toggle="tooltip" title="Edit">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form method="POST" action="{{ route('backend.slide.delete', $slide->id) }}" style="display: inline" onsubmit="return confirm('ยืนยันที่จะลบ Slide นี้ใช่หรือไม่ ?')">
                                @method('DELETE') @csrf
                                <button type="submit" class="btn btn-danger" data-toggle="tooltip" title="Delete">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9"><i>ไม่มีข้อมูล</i></td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <div class="text-right">
                {!! $slides->links() !!}
            </div>
        </div>
    </section>
@endsection