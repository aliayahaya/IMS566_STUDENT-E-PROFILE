<?php
session_start();
if (!isset($_SESSION['username'])) {
    die("Session expired. Please log in again.");
}

$con = mysqli_connect("localhost", "root", "", "eprofile") or die(mysqli_connect_errno($con));

// Fetch user data
$username = $_SESSION['username'];
$query = mysqli_query($con, "SELECT * FROM register WHERE username='$username'") or die(mysqli_error($con));
$userData = mysqli_fetch_array($query);

if (!$userData) {
    die("User data not found in the database.");
}

// Handle profile update
if (isset($_POST['update_profile'])) {
    $name = htmlspecialchars($_POST['name']);
    $matric_no = htmlspecialchars($_POST['matric_no']);
    $dob = htmlspecialchars($_POST['dob']);
    $gender = htmlspecialchars($_POST['gender']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $address = htmlspecialchars($_POST['address']);
    $campus = htmlspecialchars($_POST['campus']);
    $course = htmlspecialchars($_POST['course']);
    $current_semester = htmlspecialchars($_POST['current_semester']);
    $cgpa = htmlspecialchars($_POST['cgpa']);
    $advisor = htmlspecialchars($_POST['advisor']);
    $selectedAvatar = isset($_FILES['avatar']) ? $_FILES['avatar'] : null; // Get the selected avatar

    // Handle avatar image upload
    $avatarPath = $userData['avatar'] ?? 'default.png'; // Set default if no avatar exists
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
        $avatarTmpName = $_FILES['avatar']['tmp_name'];
        $avatarName = basename($_FILES['avatar']['name']);
        $avatarDir = 'uploads/avatar/';
        $avatarPath = $avatarDir . $avatarName;

        if (!move_uploaded_file($avatarTmpName, $avatarPath)) {
            die("Failed to upload avatar.");
        }
    }

    // Update user information in the database
    $updateQuery = "UPDATE register SET 
        name='$name', 
        matric_no='$matric_no',
        dob='$dob',
        gender='$gender',
        phone='$phone', 
        email='$email', 
        address='$address',
        campus='$campus',
        course='$course',
        current_semester='$current_semester',
        cgpa='$cgpa',
        advisor='$advisor',
        avatar='$avatarPath' 
        WHERE username='$username'";
    mysqli_query($con, $updateQuery) or die(mysqli_error($con));

    echo "<p style='color: green;'>Profile updated successfully!</p>";
    // Refresh user data
    $query = mysqli_query($con, "SELECT * FROM register WHERE username='$username'") or die(mysqli_error($con));
    $userData = mysqli_fetch_array($query);

    header("Location: profile.php");
    exit(); // Make sure to exit to prevent further code execution

}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student e-Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script>
        // Highlight the selected profile
        function selectavatar(img, inputId) {
            document.querySelectorAll('.avatar-selection img').forEach(img => img.classList.remove('selected'));
            document.getElementById(inputId).checked = true;
            img.classList.add('selected');
        }
    </script>
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
        <h1 class="mt-3">Edit Profile</h1>
        <br><br>
    </div>

    <div class="container d-flex justify-content-center"> 
        <div class="card" style="width: 70%; max-width: 600%; border: 1px solid #ccc; 
            background-color:rgb(240, 240, 240); padding: 20px; margin-top: 15px; text-align: center;">
            
            <h2 class="text-center mb-4">Personal Information</h2>

            <form method="POST" action="" enctype="multipart/form-data">
            <div class="container d-flex justify-content-center">
            <label for="avatar">Profile:</label>
            <input type="file" name="avatar" id="avatar" accept="image/*">
            </div>
            
            <!-- Two-column layout -->
            <div class="container mt-4 w-75">
                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-6" style="text-align:left">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($userData['name']); ?>" required>

                    <label for="matric_no">Matric No:</label>
                    <input type="number" name="matric_no" id="matric_no" value="<?php echo htmlspecialchars($userData['matric_no']); ?>" required>

                    <label for="dob">Birthdate:</label>
                    <input type="date" name="dob" id="dob" value="<?php echo htmlspecialchars($userData['dob']); ?>" required>
                </div>

                    <!-- Right Column -->
                <div class="col-md-6" style="text-align:left">
                    <label for="gender">Gender:</label>
                    <input type="text" name="gender" id="gender" value="<?php echo htmlspecialchars($userData['gender']); ?>" required>
                    <br>
                    <label for="phone">Phone:</label>
                    <input type="text" name="phone" id="phone" value="<?php echo htmlspecialchars($userData['phone']); ?>" required>
                    <br>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($userData['email']); ?>" required>
                </div>
            </div>

                <!-- Address (Full Width) -->
                <div class="mt-3">
                    <label for="address">Address:</label>
                    <input type="text" name="address" id="address" value="<?php echo htmlspecialchars($userData['address']); ?>" required>
                </div>
            </div>
            <hr>

            <h2 class="text-center mb-4">Academic</h2>
            <div class="container mt-4 w-75">
                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-6" style="text-align:left">
                    <label for="campus">Campus:</label>
                    <input type="text" name="campus" id="campus" value="<?php echo htmlspecialchars($userData['campus']); ?>" required>

                    <label for="course">Course:</label>
                    <input type="text" name="course" id="course" value="<?php echo htmlspecialchars($userData['course']); ?>" required>
                </div>

                    <!-- Right Column -->
                <div class="col-md-6" style="text-align:left">
                    <label for="current_semester">Semester:</label>
                    <input type="number" name="current_semester" id="current_semester" value="<?php echo htmlspecialchars($userData['current_semester']); ?>" required>
                    <br>
                    <label for="cgpa">CGPA:</label>
                    <input type="text" name="cgpa" id="cgpa" value="<?php echo htmlspecialchars($userData['cgpa']); ?>" required>
                </div>
            </div>

                <!-- (Full Width) -->
                <div class="mt-3">
                    <label for="advisor">Advisor:</label>
                    <input type="text" name="advisor" id="advisor" value="<?php echo htmlspecialchars($userData['advisor']); ?>" required>
                </div>
            </div>
            <hr>
    <button type="submit" name="update_profile">Update Profile</button>
</form>
</div>
</div>
<br>

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
