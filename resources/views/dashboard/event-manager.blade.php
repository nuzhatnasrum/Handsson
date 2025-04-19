<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Event Manager Dashboard - Handsson</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color: #f4f6f9; padding-top: 80px; }
    nav.navbar { position: fixed; top: 0; width: 100%; z-index: 1000; }
    .card { margin-bottom: 30px; border-radius: 10px; box-shadow: 0 0 12px rgba(0, 0, 0, 0.08); }
    .status-badge { font-size: 0.85rem; }
  </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand">Event Manager - Handsson</a>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button class="btn btn-outline-light" type="submit">Logout</button>
    </form>
  </div>
</nav>

<div class="container">
  
  <div class="card">
    <div class="card-header bg-primary text-white">
      <h5>Client Projects</h5>
    </div>
    <div class="card-body">
      @foreach ($projects as $project)
      <div class="mb-4 p-3 border rounded bg-light">
        <h6>{{ $project->title }}</h6>
        <p><strong>Client:</strong> {{ $project->client->name }}<br>
           <strong>Volunteers Needed:</strong> {{ $project->volunteers_needed }}<br>
           <strong>Status:</strong> <span class="badge bg-warning status-badge">{{ $project->status }}</span>
        </p>

        
        <form class="row g-3 mb-2" action="{{ route('event-manager.assign-volunteers') }}" method="POST">
          @csrf
          <input type="hidden" name="project_id" value="{{ $project->id }}">
          <div class="col-md-6">
            <label class="form-label">Select Volunteers</label>
            <select name="volunteers[]" class="form-select" multiple required>
              @foreach ($volunteers as $volunteer)
                <option value="{{ $volunteer->id }}">{{ $volunteer->name }} ({{ $volunteer->skills }})</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-3 d-flex align-items-end">
            <button type="submit" class="btn btn-success w-100">Assign Volunteers</button>
          </div>
        </form>

       
        <form class="row g-2" action="{{ route('event-manager.update-status') }}" method="POST">
          @csrf
          <input type="hidden" name="project_id" value="{{ $project->id }}">
          <div class="col-md-6">
            <select class="form-select" name="status">
              <option {{ $project->status == 'Pending' ? 'selected' : '' }} value="Pending">Pending</option>
              <option {{ $project->status == 'In Progress' ? 'selected' : '' }} value="In Progress">In Progress</option>
              <option {{ $project->status == 'Completed' ? 'selected' : '' }} value="Completed">Completed</option>
            </select>
          </div>
          <div class="col-md-3">
            <button type="submit" class="btn btn-outline-primary w-100">Update Status</button>
          </div>
        </form>
      </div>
      @endforeach
    </div>
  </div>

  
  <div class="card">
    <div class="card-header bg-success text-white">
      <h5>Ongoing Projects Monitoring</h5>
    </div>
    <div class="card-body">
      <table class="table table-striped table-bordered">
        <thead class="table-dark">
          <tr>
            <th>Project</th>
            <th>Client</th>
            <th>Assigned Volunteers</th>
            <th>Status</th>
            <th>Last Updated</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($monitoredProjects as $project)
          <tr>
            <td>{{ $project->title }}</td>
            <td>{{ $project->client->name }}</td>
            <td>
              @foreach ($project->volunteers as $v)
                {{ $v->name }}{{ !$loop->last ? ',' : '' }}
              @endforeach
            </td>
            <td><span class="badge bg-info">{{ $project->status }}</span></td>
            <td>{{ $project->updated_at->format('Y-m-d') }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
