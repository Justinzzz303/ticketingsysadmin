<?php session_start(); 
if (!isset($_SESSION['uid']) || !isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header("Location: alogin.php");
    exit();
}?>
<!DOCTYPE html>
<html lang="en">
<header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ADMINPG/css/table.css">
    <title>Add Event</title>
</header>
<?php

include('../ADMINPG/includes/helper.php');

include('../ADMINPG/includes/header.php');
?>
</head>

<body>



<form action="add-event.php" method="post">

    <h2>Add Event</h2>


        <input type="text" id="ename" name="ename" placeholder="event name"required><br><br>
        <input type="text" id="eprice" name="eprice"placeholder="price"required><br><br>
        <textarea id="edescription" name="edescription" rows="4" cols="50" placeholder="Enter description"></textarea><br><br>
        <input type="text" id="edate" name="edate"placeholder="date" required><br><br>
        <input type="text" id="eqty" name="eqty"placeholder="quantity" required><br><br>
        
     
        <input type="submit" value="Add"><br><br><button class="btn1"><a href="event-list.php">back</a></button>
      
    </form>

</body>
<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form fields are set before accessing their values
    $ename = isset($_POST["ename"]) ? trim($_POST["ename"]) : "";
    $eprice = isset($_POST["eprice"]) ? trim($_POST["eprice"]) : "";
    $edescription = isset($_POST["edescription"]) ? trim($_POST["edescription"]) : "";
    $edate = isset($_POST["edate"]) ? trim($_POST["edate"]) : "";
    $eqty = isset($_POST["eqty"]) ? trim($_POST["eqty"]) : "";
 

    // Validate required fields
    $errors = [];
    if (empty($ename)) {
        $errors[] = "event name is required";
    }
    if (empty( $eprice)) {
        $errors[] = "price is required";
    }
    if (empty($edescription)) {
        $errors[] = "description is required";
    }
    if (empty($edate)) {
        $errors[] = "date is required";
    }
    if (empty($eqty)) {
        $errors[] = "quantity is required";
    }
   

    // If there are no validation errors, proceed with database operations
    if (empty($errors)) {
        // Your database connection code goes here
      

        // Prepare and bind the SQL statement
        $stmt = $conn->prepare("INSERT INTO event (ename, eprice,edescription,edate,eqty) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi",$ename, $eprice,$edescription,$edate,$eqty);

        // Execute the statement
        if ($stmt->execute() === TRUE) {
            header('location:event-list.php');
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

</html>












