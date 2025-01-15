@extends('layouts.admin')

@section('title', 'About Section')

@section('content')

@php
    $breadcrumbs = [
        'Dashboard' => route('admin.dashboard'),
        'About' => route('admin.about.index'),
    ];
@endphp

{!! App\Helpers\Breadcrumbs::generate($breadcrumbs) !!}

<div class="container">
    <h1>About Section</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($about)
        <div class="card mb-3">
            <div class="card-body">
                <h2 class="card-title">Content</h2>
                <p class="card-text">{{ $about->content }}</p>
                <a href="{{ route('admin.about.edit', $about->id) }}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    @else
        <p>No content available. Please create the About section.</p>
        <a href="{{ route('admin.about.create') }}" class="btn btn-success">Create</a>
    @endif
</div>
@endsection