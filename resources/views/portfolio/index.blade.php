@extends('layouts.main')

@section('title', 'My Portfolio')

@section('content')
<div class="hero">
    <h1>Welcome to My Portfolio</h1>
    <p>Hi, I'm {{ $portfolioOwner ?? 'Ambika Balasubramanian' }}, a passionate Software Developer.</p>
</div>

<section id="about" class="section">
    <h2>About Me</h2>
    <p>
        {{ $about->content ?? 'Add about section content from the admin panel.' }}
    </p>
</section>

<section id="projects" class="section">
    <h2>My Projects</h2>
    @if ($projects->isEmpty())
        <p>No projects available. Add projects from the admin panel.</p>
    @else
        <div class="projects">
            @foreach ($projects as $project)
            <div class="project-card">
                <h3>{{ $project->title }}</h3>
                <p>{{ Str::limit($project->description, 100) }}</p>
                <a href="{{ $project->link }}" target="_blank" class="btn">View Project</a>
            </div>
            @endforeach
        </div>
    @endif
</section>

<section id="contact" class="section">
    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div style="color: red;">
            {{ $errors->first() }}
        </div>
    @endif
    <h2>Contact Me</h2>
    <form action="{{ route('contact.submit') }}" method="POST" class="contact-form">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="message">Message:</label>
            <textarea name="message" id="message" class="form-control" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Send Message</button>
    </form>
</section>
@endsection