<?php
session_start(); // Start the session

// Connect to the database
$con = mysqli_connect("localhost", "root", "", "eprofile") 
    or die("Connection failed: " . mysqli_connect_error());

    $con = mysqli_connect("localhost", "root", "", "eprofile");

if (!isset($_SESSION["name"]) || !isset($_POST["username"])) {
    die("Session data is missing. Please complete the registration form.");
}

// Retrieve session data
$name = mysqli_real_escape_string($con, $_SESSION["name"]);
$phone = mysqli_real_escape_string($con, $_SESSION["phone"]);

// Retrieve final form data from POST
$username = mysqli_real_escape_string($con, $_POST["username"]);
$password = mysqli_real_escape_string($con, $_POST["password"]);

// Insert into database
$sql = "INSERT INTO admin (name, phone, username, password)
        VALUES ('$name', '$phone', '$username', '$password')";

if (mysqli_query($con, $sql)) {
    echo "<script>
        alert('New user registered successfully');
        window.location.href = 'login_admin.php';
    </script>";
} else {
    echo "<script>
        alert('Error: " . addslashes(mysqli_error($con)) . "');
        window.location.href = 'register_admin.php';
    </script>";
}

// Clear session data
session_unset();
session_destroy();

// Close the database connection
mysqli_close($con);
?>
