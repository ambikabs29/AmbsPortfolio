@extends('layouts.admin')

@section('title', 'Edit About Section')

@section('content')

@php
    $breadcrumbs = [
        'Dashboard' => route('admin.dashboard'),
        'About' => route('admin.about.ineex'),
        'edit' => '',
    ];
@endphp

{!! App\Helpers\Breadcrumbs::generate($breadcrumbs) !!}

<div class="container">
    <h1>Edit About Section</h1>

    <!-- Display Success or Error Messages -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form to Update About Section -->
    <form action="{{ route('admin.about.update', $about->id ?? 0) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="content">About Content</label>
            <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content', $about->content ?? '') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update About Section</button>
    </form>
</div>
@endsection