@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Operations Log on Documentation</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Documentation</th>
                    <th>User</th>
                    <th>Operation</th>
                    <th>Changes</th>
                    <th>Date</th>
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
