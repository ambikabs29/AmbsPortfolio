<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function projects()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects');
        }

        Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.projects')->with('success', 'Project created successfully!');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image',
        ]);

        $project = Project::findOrFail($id);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects');
            $project->image = $imagePath;
        }

        $project->update($request->only('title', 'description'));
        return redirect()->route('admin.projects')->with('success', 'Project updated successfully!');
    }

    public function destroy($id)
    {
        Project::findOrFail($id)->delete();
        return redirect()->route('admin.projects')->with('success', 'Project deleted successfully!');
    }
}