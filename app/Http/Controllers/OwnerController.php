<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\EmployeeApplication;

class OwnerController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalVolunteers = User::where('role', 'volunteer')->count(); // adjust if your role logic is different
        $totalClients = User::where('role', 'client')->count();
        $totalProjects = Project::count();

        $projectsToReview = Project::where('status', 'pending')->with('client')->get();
        $employeeApplications = EmployeeApplication::where('status', 'pending')->get();

        return view('dashboard.owner', compact(
            'totalUsers',
            'totalVolunteers',
            'totalClients',
            'totalProjects',
            'projectsToReview',
            'employeeApplications'
        ));
    }
}
