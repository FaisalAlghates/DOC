@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">سجل العمليات على التوثيقات</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>التوثيق</th>
                    <th>المستخدم</th>
                    <th>العملية</th>
                    <th>التغييرات</th>
                    <th>التاريخ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($histories as $history)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $history->documentation->title ?? '-' }}</td>
                    <td>{{ $history->user->name ?? '-' }}</td>
                    <td>{{ $history->action }}</td>
                    <td><pre style="max-width:400px;white-space:pre-wrap;word-break:break-all;">{{ Str::limit($history->changes, 200) }}</pre></td>
                    <td>{{ $history->created_at->format('Y-m-d H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
