<?php
session_start();
include('../ADMINPG/includes/header.php');
// Check if user is logged in
if (!isset($_SESSION['uid']) || !isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header("Location: alogin.php");
    exit();
}

// Include database connection or any required files
include('../ADMINPG/includes/helper.php');

// Create connection
$conn = new mysqli("localhost", "root", "", "ts");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to get count from database
function getCount($conn, $table) {
    $sql = "SELECT COUNT(*) as bid FROM $table";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['bid'];
    } else {
        return 0;
    }
}

// Get counts
$totalUsers = getCount($conn, 'user');
$totalEvents = getCount($conn, 'event');
$totalBookings = getCount($conn, 'booking');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ADMINPG/css/admin.css">
    <title>Admin Panel</title>
    <!-- CSS styles for the layout -->
    <link rel="stylesheet" href="styles.css">
</head>
<style>
        *{
            margin: 0;
            padding: 0;
        }

        body{
            background-color: black;
        }



        .middle{
            margin-top: 20px;
            width: 100vw;
            height: 430px;
            background-color:#333 ;
        }

        h1{
            text-align: center;
            font-family: 'Pixel' ;
            color: white;
            height: 30px;
            margin-top: 20px;
        }

        input{
            width: 200px;
        }

        @font-face {
    font-family: 'Pixel'; 
    src:url('../press_start_2p/PressStart2P.ttf') format('truetype'); 
    }

    h2{
        margin-top: 20px;
        color: aliceblue;
        font-family: 'Pixel'; 
        margin-bottom: 5px;
    }

    .total{
        color: white;
        font-size: 20px;
        margin-bottom: 20px;
    }

   .total a{
        color: white;
        text-decoration: none;
        text-decoration: underline;
        font-size: 20px;
    }

    .total a:hover{
        font-size:24px ;
    }


    </style>
<body>
    <header>
        <h1>Welcome to the Admin Panel</h1><br>
    </header>
    
    <div>
        <h2>Statistics Overview</h2>
        <p>Total Users: <?php echo $totalUsers; ?></p>
        <p>Total Events: <?php echo $totalEvents; ?></p>
        <p>Total Booking: <?php echo $totalBookings; ?></p>
    </div>
    <div>
       <br> <h2>Search Member</h2><br>
        <form action="" method="GET">
            <label for="search">Search by Username:</label><br>
            <input type="text" id="search" name="search" placeholder="Enter username">
            <button type="submit">Search</button>
        </form>
        <?php
            // Check if search form is submitted
            if(isset($_GET['search'])) {
                $search = $_GET['search'];
                // Perform a SQL query to search for users
                $sql = "SELECT * FROM user WHERE username LIKE '%$search%'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Display search results
                    echo "<h3>Search Results:</h3>";
                    echo "<ul>";
                    while($row = $result->fetch_assoc()) {
                        echo "<li>{$row['username']}</li>";
                        // You can display more information about each user if needed
                    }
                    echo "</ul>";
                } else {
                    echo "<p>No results found.</p>";
                }
            }
        ?>
    </div>
    <div>
    <br><h2>Search Event</h2><br>
    <form action="" method="GET">
        <label for="searchEvent">Search by Event Name:</label><br>
        <input type="text" id="searchEvent" name="searchEvent" placeholder="Enter event name">
        <button type="submit">Search</button>
    </form>
    <?php
        // Check if event search form is submitted
        if(isset($_GET['searchEvent'])) {
            $searchEvent = $_GET['searchEvent'];
            // Perform a SQL query to search for events
            $sqlEvent = "SELECT * FROM event WHERE ename LIKE '%$searchEvent%'";
            $resultEvent = $conn->query($sqlEvent);

            if ($resultEvent->num_rows > 0) {
                // Display search results
                echo "<h3>Search Results:</h3>";
                echo "<ul>";
                while($rowEvent = $resultEvent->fetch_assoc()) {
                    echo "<li>{$rowEvent['ename']}</li>";
                    // You can display more information about each event if needed
                }
                echo "</ul>";
            } else {
                echo "<p>No results found.</p>";
            }
        }
    ?>
</div>

    <div>
        <br><h2>Quick Actions</h2>
        <a href="add-user.php">Add New User</a><br>
        <a href="add-event.php">Add New Event</a>
        <!-- Add more quick action links as needed -->
    </div>
        
</body>

</html>
