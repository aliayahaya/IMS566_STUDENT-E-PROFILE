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
$matric_no = mysqli_real_escape_string($con, $_SESSION["matric_no"]);
$dob = mysqli_real_escape_string($con, $_SESSION["dob"]);
$gender = mysqli_real_escape_string($con, $_SESSION["gender"]);
$phone = mysqli_real_escape_string($con, $_SESSION["phone"]);
$email = mysqli_real_escape_string($con, $_SESSION["email"]);
$address = mysqli_real_escape_string($con, $_SESSION["address"]);

// Retrieve final form data from POST
$username = mysqli_real_escape_string($con, $_POST["username"]);
$password = mysqli_real_escape_string($con, $_POST["password"]);

// Insert into database
$sql = "INSERT INTO register (name, matric_no, dob, gender, phone, email, address, username, password)
        VALUES ('$name', '$matric_no', '$dob', '$gender', '$phone', '$email', '$address','$username', '$password')";

if (mysqli_query($con, $sql)) {
    echo "<script>
        alert('New user registered successfully');
        window.location.href = 'login.php';
    </script>";
} else {
    echo "<script>
        alert('Error: " . addslashes(mysqli_error($con)) . "');
        window.location.href = 'register.php';
    </script>";
}

// Clear session data
session_unset();
session_destroy();

// Close the database connection
mysqli_close($con);
?>
