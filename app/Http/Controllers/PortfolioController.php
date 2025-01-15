<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\About;
use App\Models\Contact;

class PortfolioController extends Controller
{
    public function index()
    {
        $about = About::first(); // Fetch the first record from the 'abouts' table
        $projects = Project::all(); // Fetch all projects
        $portfolioOwner = 'Ambika Balasubramanian'; // Dynamic name or fallback

        return view('portfolio.index', compact('about', 'projects', 'portfolioOwner'));
    }

    public function submitContact(Request $request)
    {
        // Validate the form input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Store the contact details in the database
        Contact::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'message' => $validated['message'],
        ]);

        return back()->with('success', 'Message sent successfully!');
    }    
}