@extends('layouts.admin')

@section('title', 'Manage Portfolio Content')

@section('content')
<div class="container">
    <h1>Manage Portfolio Content</h1>
    <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary">Add New Content</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Section</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($contents as $content)
            <tr>
                <td>{{ $content->section }}</td>
                <td>{{ Str::limit($content->content, 50) }}</td>
                <td>
                    <a href="{{ route('admin.portfolio.edit', $content->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.portfolio.destroy', $content->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3">No content available.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection