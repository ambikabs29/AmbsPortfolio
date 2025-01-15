@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="row">
    <!-- Sidebar -->
    <div class="col-md-3">
        <div class="bg-light p-3 rounded">
            <h4>Manage Portfolio</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('admin.about.index') }}" class="nav-link">About Page Management</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.projects.index') }}" class="nav-link">Projects Management</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.inbox') }}" class="nav-link">Inbox ({{ $unreadCount }})</a> <!-- Link to Inbox -->
                </li>
                <li>
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm w-100">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="col-md-9">
        <div class="p-3">
            <h2>Admin Dashboard</h2>
            <p>Welcome, {{ auth()->user()->name }}! Manage your portfolio content below.</p>
            
            <!-- Main Dashboard Content -->
            <div>
                <h4>Quick Links</h4>
                <a href="{{ route('admin.about.index') }}" class="btn btn-primary mb-3">Manage About Content</a>
                <a href="{{ route('admin.projects.create') }}" class="btn btn-secondary mb-3">Create New Project</a>
                <a href="{{ route('admin.inbox') }}" class="btn btn-success mb-3">View Inbox</a> <!-- Quick Link to Inbox -->
                <hr>
                <p>Use the left menu to navigate between sections of your admin panel.</p>
            </div>
        </div>
    </div>
</div>
@endsection