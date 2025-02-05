<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <header>
    <nav class="navbar navbar-expand-lg py-3" style="background-color:rgb(234, 172, 244);">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
            <img src="uitm.png" alt="Bootstrap" width="150" height="55">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profile</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    </header>
    <div class="container-fluid d-flex justify-content-center" style="padding-top: 20px">
        <h2 class="fw-normal">Want to build your own profile? Register now!</h2>
        <br><br>
    </div>

    <div class="container-fluid d-flex justify-content-center" style="padding-top: 20px">
    <div class="card" style="width: 50%; max-width: 800px; border: 1px solid #ccc; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <p class="h4 d-flex justify-content-center" style="padding-top: 10px">Registration</p>
        <div class="card-body">
                <form action="next_form.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="matric_no" class="form-label">Matric No.</label>
                        <input type="number" class="form-control" id="matric_no" name="matric_no" required>
                    </div>
                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <input class="form-control" list="datalistOptions" id="gender" name="gender" required>
                        <datalist id="datalistOptions">
                            <option value="Male">
                            <option value="Female">
                        </datalist>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="number" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="adress" class="form-label">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                    </div>

                    <div class="d-grid gap-2 col-6 mx-auto" style="padding-bottom: 20px">
                        <button class="btn btn-secondary" type="reset">Clear</button>
                        <button class="btn btn-primary" type="submit">Next</button>
                    </div>
                </form>
        </div>
    </div>
    </div>
    <br><br>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" 
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" 
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    
    <!-- Footer -->
    <footer class="bg-light text-center py-3 mt-auto">
        <p>&copy; 2025 UiTM. All rights reserved.</p>
    </footer>
    </body>
    </html>