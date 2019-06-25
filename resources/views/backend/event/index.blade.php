@extends('backend.layouts.template')

@section('content')
    <section class="panel">
        <div class="panel-body">
            <div class="text-right mb-md">
                <a href="{{ route('backend.event.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Add</a>
            </div>
            @include('backend.layouts.validation')
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th width="50">#</th>
                        <th>ชื่อ</th>
                        <th>ผู้เข้าร่วม</th>
                        <th>วันที่รับสมัคร</th>
                        <th>วันจัดงาน</th>
                        <th width="150">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($events as $event)
                    <tr>
                        <td>{{ $event->id }}</td>
                        <td>{{ $event->name }}</td>
                        <td>
                            {{ $event->ticketParticipants->count() }}
                            @if($event->maxParticipants)
                                / {{ $event->maxParticipants }}
                            @endif
                        </td>
                        <td>
                            {{ $event->startRegisterDate->format('d/m/Y') }}
                            @if($event->endRegisterDate)
                                - {{ $event->endRegisterDate->format('d/m/Y') }}
                                ({{ $event->startRegisterDate->diff($event->endRegisterDate)->days }} วัน)
                            @else
                                (1 วัน)
                            @endif
                        </td>
                        <td>
                            {{ $event->startDate->format('d/m/Y') }}
                            @if($event->endDate)
                                - {{ $event->endDate->format('d/m/Y') }}
                                ({{ $event->startDate->diff($event->endDate)->days }} วัน)
                            @else
                                (1 วัน)
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('backend.event.show', $event->id) }}" class="btn btn-info"
                                data-toggle="tooltip" title="View">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('backend.event.edit', $event->id) }}" class="btn btn-warning"
                               data-toggle="tooltip" title="Edit">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form method="POST" action="{{ route('backend.event.delete', $event->id) }}" style="display: inline" onsubmit="return confirm('ยืนยันที่จะลบ Event นี้ใช่หรือไม่ ?')">
                                @method('DELETE')
                                @csrf
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
                {!! $events->links() !!}
            </div>
        </div>
    </section>
@endsection