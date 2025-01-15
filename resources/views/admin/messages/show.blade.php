@extends('layouts.admin')

@section('content')

@php
    $breadcrumbs = [
        'Dashboard' => route('admin.dashboard'),
        'Inbox ('. $unreadCount .')' => route('admin.inbox'),
        'Message' => '',
    ];
@endphp

{!! App\Helpers\Breadcrumbs::generate($breadcrumbs) !!}

<div class="container mt-5">
    <h1>Message Details</h1>
    <p><strong>Name:</strong> {{ $message->name }}</p>
    <p><strong>Email:</strong> {{ $message->email }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $message->message }}</p>
    <a href="{{ route('admin.inbox') }}" class="btn btn-secondary">Back to Inbox</a>
</div>
@endsection