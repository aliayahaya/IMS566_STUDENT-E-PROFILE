<?php
session_start(); // Start session

if (!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

$con = mysqli_connect("localhost", "root", "", "eprofile") or die(mysqli_connect_errno($con));

// Fetch user data from the database
$username = $_SESSION['username'];
$query = mysqli_query($con, "SELECT * FROM register WHERE username='$username'") or die(mysqli_error($con));
$userData = mysqli_fetch_array($query);


if (!$userData) {
    die("User not found!"); // Handle the case when user doesn't exist
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student e-Profile</title>
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
    <div class="container-fluid d-flex justify-content-center">
        <h1 class="mt-3">Welcome to Your e-Profile!</h1>
        <br><br>
    </div>

    <div class="container d-flex justify-content-center"> 
        <div class="card" style="width: 70%; max-width: 600%; border: 1px solid #ccc; 
            background-color:rgb(240, 240, 240); padding: 20px; margin-top: 15px; text-align: center;">
            
            <h2 class="text-center mb-4">Personal Information</h2>

            <div class="container d-flex justify-content-center"> 
                

                <img src="<?php echo htmlspecialchars($userData['avatar']); ?>" 
                            alt="avatar" 
                            style="width: 150px; height: 150px; border-radius: 50%;">
                
            </div>

            <!-- Two-column layout -->
            <div class="container mt-4 w-75">
                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-6" style="text-align:justify">
                        <p><strong>Name:</strong> <?php echo htmlspecialchars($userData['name']); ?></p>
                        <p><strong>Matric No:</strong> <?php echo htmlspecialchars($userData['matric_no']); ?></p>
                        <p><strong>Birthdate:</strong> <?php echo htmlspecialchars($userData['dob']); ?></p>
                    </div>

                    <!-- Right Column -->
                    <div class="col-md-6" style="text-align:justify">
                        <p><strong>Gender:</strong> <?php echo htmlspecialchars($userData['gender']); ?></p>
                        <p><strong>Phone:</strong> <?php echo htmlspecialchars($userData['phone']); ?></p>
                        <p><strong>Email:</strong> <?php echo htmlspecialchars($userData['email']); ?></p>
                    </div>
                </div>

                <!-- Address (Full Width) -->
                <div class="mt-3">
                    <p><strong>Address:</strong> <?php echo nl2br(htmlspecialchars($userData['address'])); ?></p>
                </div>
            </div>
            <hr>
                    
            <h2 class="text-center mb-4">Academic</h2>

            <!-- Two-column layout -->
            <div class="container mt-4 w-75">
                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-6" style="text-align:justify">
                        <p><strong>Campus:</strong> <?php echo htmlspecialchars($userData['campus']); ?></p>
                        <p><strong>Course:</strong> <?php echo htmlspecialchars($userData['course']); ?></p>
                    </div>

                    <!-- Right Column -->
                    <div class="col-md-6" style="text-align:justify">
                        <p><strong>Semester:</strong> <?php echo htmlspecialchars($userData['current_semester']); ?></p>
                        <p><strong>CGPA:</strong> <?php echo htmlspecialchars($userData['cgpa']); ?></p>
                    </div>
                </div>

                <!-- Address (Full Width) -->
                <div class="mt-3">
                    <p><strong>Advisor:</strong> <?php echo nl2br(htmlspecialchars($userData['advisor'])); ?></p>
                </div>
            </div>
            <hr>

            <!-- Buttons (Edit and Logout) -->
            <div class="d-flex justify-content-center gap-3 mt-3"> 
                <a href='edit_profile.php' class="btn btn-primary" style="width: 120px;">Edit Profile</a>
                <a href="logout.php" class="btn btn-danger" style="width: 120px;">Logout</a>
            </div>
        </div>
    </div>





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