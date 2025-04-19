<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Owner Dashboard - Handsson</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f5f5f5;
      padding-top: 80px;
    }
    .card {
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    nav.navbar {
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
    }
  </style>
</head>
<body>

 
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Handsson Owner</a>
      <form action="{{ route('logout') }}" method="POST" class="d-inline">
        @csrf
        <button class="btn btn-outline-light">Logout</button>
      </form>
    </div>
  </nav>

  <div class="container">

    
    <h3 class="mb-4">System Overview</h3>
    <div class="row mb-5">
      <div class="col-md-3">
        <div class="card text-white bg-primary mb-3">
          <div class="card-body text-center">
            <h5>Total Users</h5>
            <h3>{{ $totalUsers ?? 0 }}</h3>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card text-white bg-success mb-3">
          <div class="card-body text-center">
            <h5>Volunteers</h5>
            <h3>{{ $totalVolunteers ?? 0 }}</h3>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card text-white bg-info mb-3">
          <div class="card-body text-center">
            <h5>Projects</h5>
            <h3>{{ $totalProjects ?? 0 }}</h3>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card text-white bg-warning mb-3">
          <div class="card-body text-center">
            <h5>Clients</h5>
            <h3>{{ $totalClients ?? 0 }}</h3>
          </div>
        </div>
      </div>
    </div>

    
    <div class="card mb-5">
      <div class="card-header bg-dark text-white">
        <h5>Client Projects to Review</h5>
      </div>
      <div class="card-body">
        @forelse($projectsToReview ?? [] as $project)
          <div class="d-flex justify-content-between align-items-center border-bottom py-3">
            <div>
              <strong>Project Title: {{ $project->name }}</strong><br>
              Client: {{ $project->client->name }} | Budget: ${{ $project->budget }}
            </div>
            <div>
              <form action="{{ url('/owner/projects/accept/'.$project->id) }}" method="POST" class="d-inline">
                @csrf
                <button class="btn btn-sm btn-success">Accept</button>
              </form>
              <form action="{{ url('/owner/projects/reject/'.$project->id) }}" method="POST" class="d-inline">
                @csrf
                <button class="btn btn-sm btn-danger">Reject</button>
              </form>
            </div>
          </div>
        @empty
          <p>No projects to review.</p>
        @endforelse
      </div>
    </div>

    
    <div class="card mb-5">
      <div class="card-header bg-dark text-white">
        <h5>Employee Applications</h5>
      </div>
      <div class="card-body">
        @forelse($employeeApplications ?? [] as $application)
          <div class="d-flex justify-content-between align-items-center border-bottom py-3">
            <div>
              <strong>{{ $application->name }}</strong><br>
              Role: {{ $application->role }} | Email: {{ $application->email }}
            </div>
            <div>
              <a href="{{ Storage::url($application->cv_path) }}" class="btn btn-sm btn-secondary" target="_blank">View CV</a>
              <form action="{{ url('/owner/employee/accept/'.$application->id) }}" method="POST" class="d-inline">
                @csrf
                <button class="btn btn-sm btn-success">Accept</button>
              </form>
              <form action="{{ url('/owner/employee/reject/'.$application->id) }}" method="POST" class="d-inline">
                @csrf
                <button class="btn btn-sm btn-danger">Reject</button>
              </form>
            </div>
          </div>
        @empty
          <p>No employee applications at the moment.</p>
        @endforelse
      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
