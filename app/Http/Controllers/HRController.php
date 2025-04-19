<?php

namespace App\Http\Controllers;

use App\Models\VolunteerApplication;
use App\Models\Volunteer; // If you have a Volunteer model
use Illuminate\Http\Request;

class HRController extends Controller
{
    public function index()
    {
        
        $applications = VolunteerApplication::where('status', 'pending')->get();
        $acceptedVolunteers = Volunteer::all();
 
        return view('dashboard.hr', compact('applications', 'acceptedVolunteers'));
    }

    public function acceptApplication($id)
    {
        
        $application = VolunteerApplication::find($id);
        $application->status = 'accepted';
        $application->save();
        
        return redirect()->route('hr.dashboard')->with('status', 'Volunteer Accepted');
    }
}
