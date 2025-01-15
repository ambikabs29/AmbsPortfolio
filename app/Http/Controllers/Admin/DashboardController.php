<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project; // Import your Project model
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch all projects from the database
        $projects = Project::all();

        // Pass the projects to the admin dashboard view
        return view('admin.dashboard');
    }
}