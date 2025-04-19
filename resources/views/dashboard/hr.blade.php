<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>HR Dashboard - Handsson</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f4f6f9;
      padding-top: 80px;
    }
    .card {
      border-radius: 10px;
      box-shadow: 0 0 12px rgba(0,0,0,0.08);
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

  
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand">Handsson HR Panel</a>
      <form action="{{ route('logout') }}" method="POST" class="d-inline">
        @csrf
        <button class="btn btn-outline-light">Logout</button>
      </form>
    </div>
  </nav>
  


  <div class="container">
    
    <div class="card mb-5">
      <div class="card-header bg-dark text-white">
        <h5>Volunteer Applications</h5>
      </div>
      <div class="card-body">
        @foreach($applications as $application)
        <div class="d-flex justify-content-between align-items-center border-bottom py-3">
          <div>
            <strong>{{ $application->name }}</strong><br>
            Email: {{ $application->email }}<br>
            Skills: {{ $application->skills }}
          </div>
          <div>
            <a href="/storage/volunteer_cvs/{{ $application->cv }}" class="btn btn-sm btn-secondary" target="_blank">View CV</a>
            <form action="{{ route('hr.acceptApplication', $application->id) }}" method="POST" style="display:inline;">
              @csrf
              <button type="submit" class="btn btn-sm btn-success">Accept</button>
            </form>
            <form action="{{ route('hr.rejectApplication', $application->id) }}" method="POST" style="display:inline;">
              @csrf
              <button type="submit" class="btn btn-sm btn-danger">Reject</button>
            </form>
          </div>
        </div>
        @endforeach
      </div>
    </div>

    
    <div class="card mb-5">
      <div class="card-header bg-success text-white">
        <h5>Volunteer Pool (Accepted Volunteers)</h5>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped">
          <thead class="table-dark">
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Skills</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach($acceptedVolunteers as $volunteer)
            <tr>
              <td>{{ $volunteer->name }}</td>
              <td>{{ $volunteer->email }}</td>
              <td>{{ $volunteer->skills }}</td>
              <td><span class="badge bg-success">Accepted</span></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    
    <div class="card mb-5">
      <div class="card-header bg-primary text-white">
        <h5>Add New Volunteer (Simulated Submission)</h5>
      </div>
      <div class="card-body">
        <form action="{{ route('hr.submitVolunteer') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="volunteerName" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="volunteerName" name="name" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="skills" class="form-label">Skills</label>
            <input type="text" class="form-control" id="skills" name="skills" required>
          </div>
          <div class="mb-3">
            <label for="cv" class="form-label">Upload CV (PDF)</label>
            <input type="file" class="form-control" id="cv" name="cv" accept="application/pdf" required>
          </div>
          <button type="submit" class="btn btn-primary">Submit Volunteer</button>
        </form>
      </div>
    </div>
  </div>

 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    function logout() {
      window.location.href = "/logout";
    }
  </script>
</body>
</html>
