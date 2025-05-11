<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $activity = $_POST['activity'];
    $status = $_POST['status'];
    $category = $_POST['category'];
    $timestamp = date("Y-m-d H:i:s"); 

    $sql = "INSERT INTO users (name, activity, timestamp, status, category)
            VALUES ('$name', '$activity', '$timestamp', '$status', '$category')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
    <link rel="stylesheet" href="style/style.css">
    <div class="dashboard">
        <div class="sidebar">
            <div class="heads">
                <img src="img/buksulogo.png" alt="Logo">
            </div>
            <ul class="menu">
                <li>
                    <a href="index.php" class="active">
                        <img src="img/dashboardwhite.png" alt="dashboard">
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="adduser.php">
                        <img src="img/costumerorder.png" alt="products">
                        <span>Add User</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main-content">
            <div class="topbar">
                <div class="search">
                    <input type="text" placeholder="Search. . .">
                </div>

                <div class="user-profile">
                    <span>Welcome, User</span>
                    <a>
                        <img src="img/usericonwhite.png" alt="user" class="click-user"></a>
                </div>
            </div>
</head>
<body>
<h2>Add New User</h2>
<form method="post">
    <input type="text" name="name" placeholder="Enter Name" required><br>

    <label>Activity:</label>
    <input type="text" name="activity" placeholder="Enter Activity" required><br>

    <label>Status:</label>
    <select name="status" required>
        <option value="Ongoing">Ongoing</option>
        <option value="Completed">Completed</option>
    </select><br>

    <label>Category:</label>
    <select name="category" required>
        <option value="Personal">Personal</option>
        <option value="Academic">Academic</option>
        <option value="Work">Work</option>
    </select><br>

    <input type="submit" value="Save" class="btn">
</form>
</body>
</html>
