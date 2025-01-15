@extends('layouts.admin')

@section('title', 'Create New Project')

@section('content')

@php
    $links = [
        'Dashboard' => route('admin.dashboard'),
        'Projects' => route('admin.projects.index'),  
        'create' => '', 
    ];
@endphp

{!! App\Helpers\Breadcrumbs::generate($links) !!}

<div class="container">
    <h1>Create New Project</h1>

    <form action="{{ route('admin.projects.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Project Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" class="form-control" rows="5" required>{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="link" class="form-label">Project Link</label>
            <input type="url" name="link" id="link" class="form-control" value="{{ old('link', $project->link ?? '') }}" placeholder="https://example.com">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select id="status" name="status" class="form-select">
                <option value="pending">Pending</option>
                <option value="completed">Completed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Create Project</button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection