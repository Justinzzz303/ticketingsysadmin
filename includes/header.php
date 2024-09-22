<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../ADMINPG/css/home.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">

    

    <title>HOME</title>
</head>
<body>
<?php


// Check if the user is logged in
if(isset($_SESSION['username'])) {
    // User is logged in
    $logged_in = true;
    $username = $_SESSION['username'];
    // You can fetch additional user information from the database if needed
} else {
    // User is not logged in
    $logged_in = false;
}

?>
<div class="nav">
        <div class="nav-pic"></div>
    
        <div class="nav-option">
        <?php if($logged_in): ?>
            <a href="admin-panel.php">Home</a>
    <a href="user-list.php">User Management</a>
    <a href="event-list.php">Event Management</a>
    <a href="booking-list.php">Booking Management</a>
  
      </div>
      <div class="dropdown">
      <button class="dropbtn" style="text-transform: uppercase;"><?php echo $_SESSION['username']?></button>
            <div class="dropdown-content">
            <a href="alogout.php">LOG OUT</a>
            </div>
      </div>
</div>

        </div>
      
       

            <?php else: ?>
                <a href="admin-panel.php">Home</a>
    <a href="user-list.php">User Management</a>
    <a href="event-list.php">Event Management</a>
    <a href="booking-list.php">Booking Management</a>
            <?php endif; ?>
          

            </div>
        </div>
   </div>
</body>