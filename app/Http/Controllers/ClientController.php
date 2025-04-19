<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        
        $projects = Project::where('client_id', $user->id)->get();

        return view('client', compact('projects'));
    }

    public function storeProject(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Project::create([
            'client_id' => Auth::id(),
            'name' => $request->name,
            'description' => $request->description,
            'status' => 'pending'
        ]);

        return redirect()->route('client.dashboard')->with('success', 'Project created successfully!');
    }

    public function submitFeedback(Request $request)
    {
        $request->validate([
            'feedback' => 'required|string',
        ]);

        Feedback::create([
            'user_id' => Auth::id(),
            'message' => $request->feedback
        ]);

        return redirect()->route('client.dashboard')->with('success', 'Feedback submitted!');
    }
}
