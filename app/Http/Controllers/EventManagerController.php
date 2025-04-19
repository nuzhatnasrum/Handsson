<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EventManagerController extends Controller
{
    public function index()
    {
        $projects = Project::where('status', '!=', 'Completed')->with('client')->get();
        $monitoredProjects = Project::with(['client', 'volunteers'])->whereIn('status', ['In Progress', 'Completed'])->get();
        $volunteers = User::where('role', 'volunteer')->get();

        return view('dashboard.event-manager', compact('projects', 'monitoredProjects', 'volunteers'));
    }

    public function assignVolunteers(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'volunteers' => 'required|array',
        ]);

        $project = Project::findOrFail($request->project_id);
        $project->volunteers()->syncWithoutDetaching($request->volunteers);

        return redirect()->back()->with('success', 'Volunteers assigned successfully!');
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'status' => 'required|in:Pending,In Progress,Completed',
        ]);

        $project = Project::findOrFail($request->project_id);
        $project->status = $request->status;
        $project->save();

        return redirect()->back()->with('success', 'Project status updated.');
    }
}
