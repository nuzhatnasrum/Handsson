

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Volunteer Dashboard - Handsson</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('image.png'); /* Replace with your image path */
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

        .btn-custom {
            background-color: #007bff;
            color: #fff;
            border: none;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Handsson</a>
        <div class="ms-auto d-flex gap-2">
            <a href="/volunteer/dashboard" class="btn btn-outline-light">Home</a>

            
            <form method="POST" action="{{ route('logout') }}" id="logout-form">
                @csrf
                <button type="submit" class="btn btn-outline-light">Logout</button>
            </form>
        </div>
    </div>
</nav>


<div class="container mt-4">
    <h2>Welcome, {{ $user->name }}!</h2>

    
    <div class="mt-3">
        <button type="button" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#availableProjectsModal">
            📌 Available Projects
        </button>
        <button type="button" class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#assignedProjectsModal">
            📝 Assigned Projects
        </button>
    </div>

    
    <div class="mt-5">
        <h4>Project History</h4>
        <ul class="list-group" id="projectHistory">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Book Donation Camp
                <span class="badge bg-success">Completed</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Hospital Support Program
                <span class="badge bg-success">Completed</span>
            </li>
        </ul>
    </div>
</div>


<div class="modal fade" id="availableProjectsModal" tabindex="-1" aria-labelledby="availableProjectsLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="availableProjectsLabel">Available Projects</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Beach Cleanup Drive
                        <button class="btn btn-sm btn-success">Join</button>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Tree Plantation Program
                        <button class="btn btn-sm btn-success">Join</button>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="assignedProjectsModal" tabindex="-1" aria-labelledby="assignedProjectsLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="assignedProjectsLabel">Assigned Projects</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item">Flood Relief Campaign - Working</li>
                    <li class="list-group-item">Old Age Home Assistance - Working</li>
                </ul>
            </div>

        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
