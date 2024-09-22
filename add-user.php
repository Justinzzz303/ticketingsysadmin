<?php
session_start();
include('../ADMINPG/includes/helper.php');
include('../ADMINPG/includes/header.php');
if (!isset($_SESSION['uid']) || !isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header("Location: alogin.php");
    exit();
}
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form fields
    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $phone = isset($_POST["phone"]) ? $_POST["phone"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $confirm_password = isset($_POST["confirm_password"]) ? $_POST["confirm_password"] : "";
    $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
    $role = isset($_POST["role"]) ? $_POST["role"] : "";

    // Validation errors array
    $errors = [];

    // Validate username
    if (empty($username)) {
        $errors[] = "Username is required";
    }
    // Validate email
    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    // Validate phone
    if (empty($phone)) {
        $errors[] = "Phone is required";
    } elseif (!preg_match("/^[0-9]{10,11}$/", $phone)) {
        $errors[] = "Invalid phone number";
    }

    // Validate password
    if (empty($password)) {
        $errors[] = "Password is required";
    } elseif (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long";
    }

    // Validate confirm password
    if (empty($confirm_password)) {
        $errors[] = "Confirm password is required";
    } elseif ($password !== $confirm_password) {
        $errors[] = "Passwords do not match";
    }

    // If there are no validation errors, proceed with database operations
    if (empty($errors)) {
        // Your database connection code goes here
        // Assuming $conn is your database connection

        // Prepare and bind the SQL statement
        $stmt = $conn->prepare("INSERT INTO user (username, email, phone, password, gender, role) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $username, $email, $phone, $password, $gender, $role);

        // Execute the statement
        if ($stmt->execute() === TRUE) {
            header('location:user-list.php');
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    } else {
        // Output validation errors
        foreach ($errors as $error) {
            echo "<p>Error: $error</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ADMINPG/css/table.css">
    <title>Add user</title>
</head>

<body>

    <form action="add-user.php" method="post">

        <h2>Add User</h2>

        <input type="text" id="username" name="username" placeholder="User name" required><br><br>
        <input type="email" id="email" name="email" placeholder="email" required><br><br>
        <input type="text" id="phone" name="phone" placeholder="phone" pattern="[0-9]{10,11}" title="Please enter a valid 10 or 11-digit phone number" required><br><br>
        <input type="password" id="password" name="password" placeholder="password" required><br><br>
        <input type="password" id="confirm_password" minlength="8" name="confirm_password" placeholder="confirm password" required><br><br>
        <input type="radio" name="gender" value="Male" required>Male
        <input type="radio" name="gender" value="Female" required>Female<br>
        <input type="radio" name="role" value="admin" required>Admin
        <input type="radio" name="role" value="member" required>Member

        <br><input type="submit" value="Add"><br><br><button class="btn1"><a href="user-list.php">back</a></button>

    </form>

</body>

</html>
