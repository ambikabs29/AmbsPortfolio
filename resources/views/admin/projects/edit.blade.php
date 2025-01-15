@extends('layouts.admin')

@section('title', 'Edit Project')

@section('content')

@php
    $links = [
        'Dashboard' => route('admin.dashboard'),
        'Projects' => route('admin.projects.index'),
        'edit'=> '',
    ];
@endphp

{!! App\Helpers\Breadcrumbs::generate($links) !!}

<div class="container">
    <h1>Edit Project</h1>

    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Project Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $project->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" class="form-control" rows="5" required>{{ old('description', $project->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="link" class="form-label">Project Link</label>
            <input type="url" name="link" id="link" class="form-control" value="{{ old('link', $project->link ?? '') }}" placeholder="https://example.com">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select id="status" name="status" class="form-select">
                <option value="pending" {{ $project->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="completed" {{ $project->status == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection