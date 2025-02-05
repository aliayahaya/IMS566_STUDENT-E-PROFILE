<!doctype html>
<html>
<head>
    <title>Admin Page</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .edit-btn {
            background-color: #c69b6b;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-right: 5px;
        }
        .edit-btn:hover {
            background-color: #45a049;
        }
        .delete-btn {
            background-color: #ff4444;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
        .delete-btn:hover {
            background-color: #ff0000;
        }
    </style>
</head>
<body>

<?php
$con = mysqli_connect("localhost", "root", "", "eprofile") or die(mysqli_connect_errno($con));

// Handle logout
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}

// Handle Delete
if(isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    
    // Check if it's the admin account
    $check_query = mysqli_query($con, "SELECT status FROM register WHERE user_id=$delete_id");
    $user_data = mysqli_fetch_array($check_query);
    
    mysqli_query($con, "DELETE FROM register WHERE id=$delete_id") or die(mysqli_error($con));
    echo "<div style='color: green; margin-bottom: 20px;'>Record deleted successfully!</div>";
}

// Handle Update
if(isset($_POST['update'])) {
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $matric_no= $_POST['matric_no'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $campus = $_POST['campus'];
    $course = $_POST['course'];
    $current_semester = $_POST['current_semester'];
    $advisor = $_POST['advisor'];
    
    $update_query = "UPDATE register SET 
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
        advisor='$advisor'
        WHERE user_id=$id";
    
    mysqli_query($con, $update_query) or die(mysqli_error($con));
    echo "<div style='color: green; margin-bottom: 20px;'>Record updated successfully!</div>";

     // Redirect after successful update
     header("Location: admin.php");
     exit(); // Make sure to exit to prevent further code execution
}

if(isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];
    $edit_query = mysqli_query($con, "SELECT * FROM register WHERE user_id=$edit_id") or die(mysqli_error($con));
    $edit_data = mysqli_fetch_array($edit_query);
    ?>
    <h2>Edit Registration</h2>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $edit_data['user_id']; ?>">
        <p>Name: <input type="text" name="name" value="<?php echo $edit_data['name']; ?>"></p>
        <p>Matric No: <input type="number" name="matric_no" value="<?php echo $edit_data['matric_no']; ?>"></p>
        <p>Birthdate: <input type="date" name="dob" value="<?php echo $edit_data['dob']; ?>"></p>
        <p>Gender: <input type="gender" name="gender" value="<?php echo $edit_data['gender']; ?>"></p>
        <p>Phone: <input type="text" name="phone" value="<?php echo $edit_data['phone']; ?>"></p>
        <p>Email: <input type="email" name="email" value="<?php echo $edit_data['email']; ?>"></p>
        <p>Address: <input type="text" name="address" value="<?php echo $edit_data['address']; ?>"></p>
        <p>Campus: <input type="text" name="campus" value="<?php echo $edit_data['campus']; ?>"></p>
        <p>Course: <input type="text" name="course" value="<?php echo $edit_data['course']; ?>"></p>
        <p>Semester: <input type="number" name="current_semester" value="<?php echo $edit_data['current_semester']; ?>"></p>
        <p>CGPA: <input type="number" name="cgpa" value="<?php echo $edit_data['cgpa']; ?>"></p>
        <p>Advisor: <input type="text" name="advisor" value="<?php echo $edit_data['advisor']; ?>"></p>
        <p>Username: <input type="text" name="username" value="<?php echo $edit_data['username']; ?>"></p>
        <p>Password: <input type="password" name="password" value="<?php echo $edit_data['password']; ?>"></p>
        <input type="submit" name="update" value="Update" class="edit-btn">
    </form>
    <?php
} else {
    $carian = mysqli_query($con, "SELECT * FROM register") or die(mysqli_error($con));

    echo "<h1 style='text-align:center'>Registered Students</h1>";

    // Logout button
    echo "<form method='POST' action='' style='text-align: right; margin-bottom: 20px;'>
            <button type='submit' name='logout' style='background-color: #c69b6b; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;'>Log Out</button>
        </form>";
    
    echo "<table>
        <tr>
            <th>Name</th>
            <th>Matric No</th>
            <th>Birthdate</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Campus</th>
            <th>Course</th>
            <th>Semester</th>
            <th>CGPA</th>
            <th>Advisor</th>
            <th>Username</th>
            <th>Password</th>
            <th>Action</th>
        </tr>";
    
    while($data = mysqli_fetch_array($carian)) {
        echo "<tr>";
        echo "<td>{$data['name']}</td>";
        echo "<td>{$data['matric_no']}</td>";
        echo "<td>{$data['dob']}</td>";
        echo "<td>{$data['gender']}</td>";
        echo "<td>{$data['phone']}</td>";
        echo "<td>{$data['email']}</td>";
        echo "<td>{$data['campus']}</td>";
        echo "<td>{$data['course']}</td>";
        echo "<td>{$data['current_semester']}</td>";
        echo "<td>{$data['cgpa']}</td>";
        echo "<td>{$data['advisor']}</td>";
        echo "<td>{$data['username']}</td>";
        echo "<td>{$data['password']}</td>";
        echo "<td>
                <a href='?edit_id={$data['user_id']}' class='edit-btn'>Edit</a>
                <a href='?delete_id={$data['user_id']}' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a>
              </td>";
        echo "</tr>";
    }
    echo "</table>";
}

mysqli_close($con);
?>

</body>
</html>