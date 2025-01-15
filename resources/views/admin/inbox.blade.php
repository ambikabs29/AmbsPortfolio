@extends('layouts.admin')

@section('content')

@php
    $links = [
        'Dashboard' => route('admin.dashboard'),
        'Inbox ('. $unreadCount .')' => '',
    ];
@endphp

{!! App\Helpers\Breadcrumbs::generate($links) !!}

<div class="container mt-5">
    <h1>
        Contact Form Messages - {{ $unreadCount}} unread
    </h1>
    @if($messages->isEmpty())
        <p>No messages found.</p>
    @else
        <div class="table-responsive"> <!-- Added responsive table wrapper -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Received At</th>
                        <th>Actions</th> <!-- Added column for actions -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($messages as $message)
                        <tr>
                            <td>{{ $message->id }}</td>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($message->message, 50) }}</td>
                            <td>{{ $message->created_at->format('d-m-Y H:i') }}</td>
                            <td>
                                <!-- View Message -->
                                <a href="{{ route('admin.messages.show', $message->id) }}" class="btn btn-sm btn-primary">View</a>

                                <!-- Delete Message -->
                                <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this message?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $messages->links() }} <!-- Pagination Links -->
    @endif
</div>
@endsection