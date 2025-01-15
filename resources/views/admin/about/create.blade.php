@extends('layouts.admin')

@section('title', 'Create About Section')

@section('content')

@php
    $breadcrumbs = [
        'Dashboard' => route('admin.dashboard'),
        'About' => route('admin.about.index'),
        'Create' => '',
    ];
@endphp

{!! App\Helpers\Breadcrumbs::generate($breadcrumbs) !!}

<div class="container">
    <h1>Create About Section</h1>
    <form action="{{ route('admin.about.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea name="content" id="content" rows="5" class="form-control" required>{{ old('content') }}</textarea>
            @error('content')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-success mt-3">Save</button>
    </form>
</div>
@endsection