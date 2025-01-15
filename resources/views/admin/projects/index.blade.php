@extends('layouts.admin')

@section('title', 'Projects')

@section('content')
@php
    $links = [
        'Dashboard' => route('admin.dashboard'),
        'Projects' => route('admin.projects.index'),
    ];
@endphp
{!! App\Helpers\Breadcrumbs::generate($links) !!}

<div class="container">
    <h1>All Projects</h1>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary mb-3">Create New Project</a>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
            <tr>
                <td>{{ $project->id }}</td>
                <td>{{ $project->title }}</td>
                <td>{{ Str::limit($project->description, 50) }}</td>
                <td>
                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">No projects found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection