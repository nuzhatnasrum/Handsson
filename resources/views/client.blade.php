<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Client Dashboard - Handsson</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-image: url('{{ asset('image.png') }}'); /* Laravel asset helper */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            padding-top: 100px;
        }

        nav.navbar {
            background-color: rgba(0, 0, 0, 0.85) !important;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
            padding: 10px 0;
        }

        .container {
            max-width: 900px;
            margin: 0 auto 40px;
            padding: 22px;
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .modal-content {
            background-color: rgba(255, 255, 255, 0.97);
            padding: 22px;
            border-radius: 10px;
        }

        .btn-your-projects {
            background-color: #007bff;
            color: #fff;
            border: none;
        }

        .btn-your-projects:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

   
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Handsson</a>
            <div class="ms-auto d-flex gap-2">
                <a href="{{ url('/client/home') }}" class="btn btn-outline-light">Home</a>
                <button class="btn btn-outline-light" onclick="logout()">Logout</button>
            </div>
        </div>
    </nav>

  
    <div class="container mt-4">
        <h2>Welcome, Client!</h2>

        
        <div class="mt-3">
            <button type="button" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#projectModal">
                + Create New Project
            </button>

            <button type="button" class="btn btn-your-projects" data-bs-toggle="modal" data-bs-target="#yourProjectsModal">
                📂 Your Projects
            </button>
        </div>

       
        <div class="mt-5">
            <h4>Give Feedback</h4>
            <form action="{{ url('/client/feedback') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <textarea class="form-control" name="feedback" rows="4" placeholder="Your feedback..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit Feedback</button>
            </form>
        </div>
    </div>

    
    <div class="modal fade" id="projectModal" tabindex="-1" aria-labelledby="projectModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ url('/client/projects') }}" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="projectModalLabel">New Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="projectName" class="form-label">Project Name</label>
                        <input type="text" class="form-control" id="projectName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Project Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="requirements" class="form-label">Requirements</label>
                        <textarea class="form-control" id="requirements" name="requirements" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="volunteerNeeds" class="form-label">Number of Volunteers Needed</label>
                        <input type="number" class="form-control" id="volunteerNeeds" name="volunteer_needs" min="1" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Create Project</button>
                </div>
            </form>
        </div>
    </div>

    
    <div class="modal fade" id="yourProjectsModal" tabindex="-1" aria-labelledby="yourProjectsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="yourProjectsModalLabel">Your Projects</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <ul class="list-group">
                        <li class="list-group-item">Sample Project 1 - Needs 5 Volunteers</li>
                        <li class="list-group-item">Community Clean-up - Needs 10 Volunteers</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function logout() {
            window.location.href = "{{ url('/logout') }}";
        }
    </script>
</body>
</html>
