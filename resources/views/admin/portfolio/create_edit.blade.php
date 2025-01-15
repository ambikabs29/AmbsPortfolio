@extends('layouts.admin')

@section('title', $portfolioContent ?? 'Create Portfolio Content')

@section('content')
<div class="container">
    <h1>{{ isset($portfolioContent) ? 'Edit' : 'Add' }} Portfolio Content</h1>

    <form action="{{ isset($portfolioContent) ? route('admin.portfolio.update', $portfolioContent->id) : route('admin.portfolio.store') }}" method="POST">
        @csrf
        @isset($portfolioContent)
            @method('PUT')
        @endisset

        <div class="form-group">
            <label for="section">Section</label>
            <input type="text" name="section" id="section" class="form-control" value="{{ $portfolioContent->section ?? old('section') }}" required>
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control" required>{{ $portfolioContent->content ?? old('content') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success mt-3">{{ isset($portfolioContent) ? 'Update' : 'Save' }}</button>
    </form>
</div>
@endsection