<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Volunteer Management Software - Handsson</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    body, html {
      height: 100%;
      margin: 0;
      overflow: hidden; 
      font-family: Arial, sans-serif;
      background: url('image.png') no-repeat center center/cover;
      background-attachment: fixed;
    }

    .hero {
      height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      color: #e3dfdf;
      background-color: rgba(0, 0, 0, 0.6);
    }

    .hero h1 {
      font-size: 5rem;
      font-weight: bold;
    }

    .hero p {
      font-size: 1.8rem;
      margin-bottom: 20px;
    }

    .cta-button {
      background: #ff9800;
      color: white;
      font-size: 1.2rem;
      font-weight: bold;
      padding: 15px 30px;
      border: none;
      border-radius: 5px;
      text-decoration: none;
      transition: background 0.3s;
    }

    .cta-button:hover {
      background: #e68900;
    }

    
    .sidebar {
      position: fixed;
      top: 0;
      right: -250px; 
      height: 100%;
      width: 250px;
      background-color: white;
      color: white;
      padding: 20px;
      transition: right 0.3s ease;
      z-index: 1001;
    }

    .sidebar.active {
      right: 0;
    }

    .sidebar h3 {
      margin-bottom: 30px;
      color: blue;
    }

    .sidebar button {
      width: 100%;
      margin-bottom: 15px;
    }

    .overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 1000;
    }

    .overlay.active {
      display: block;
    }
  </style>
</head>
<body>

  <div class="hero">
    <h1>Handsson</h1>
    <p></p>
    <button class="cta-button" onclick="toggleSidebar()">Get Started</button>
  </div>

 
  <div class="sidebar" id="sidebar">
    <h3>Handsson</h3>
    <a href="{{ route('login') }}" class="btn btn-outline-dark">Authentication</a><br><br>
    <button class="btn btn-outline-warning">Notice</button>
    <button class="btn btn-outline-success">About Us</button>
    <button class="btn btn-outline-danger mt-3" onclick="toggleSidebar()">Close</button>
  </div>

  
  <div class="overlay" id="overlay" onclick="toggleSidebar()"></div>

  <script>
    function toggleSidebar() {
      document.getElementById('sidebar').classList.toggle('active');
      document.getElementById('overlay').classList.toggle('active');
    }
  </script>

</body>
</html>
