<?php session_start();
if (!isset($_SESSION['uid']) || !isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header("Location: alogin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../ADMINPG/css/table.css">
    <title>Booking List</title>
</header>
<?php

include('../ADMINPG/includes/helper.php');
include('../ADMINPG/includes/header.php');
?>
<body>
    <table>
    <h1>Booking List</h1>
    <thead>
        <tr>
            <th>Booking ID</th>
            <th>Event Name</th>
            <th>Event Price</th>
            <th>Event Date</th>
            <th>User Name</th>
            <th>Purchase Quantity</th>
            <th>Total Price</th>
            <th>Booking Status</th>
            <th>Operation</th>
           
        </tr>
    </thead>
    <tbody>
    <tbody>
            <?php
            
            $sql = "SELECT bid , ename , eprice , edate , username ,bqty,bstatus,btotalprice
            FROM user
            JOIN booking  
            on user.uid=booking.userID
            JOIN event
            ON event.eid=eventID
            WHERE booking.bid;";
            $result = $conn->query($sql); 
           
            if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php $bid=$row['bid'];echo $bid;?></td>
                        <td><?php $ename=$row['ename'];echo $ename;?></td>
                        <td><?php $eprice=$row['eprice'];echo $eprice;?></td>
                        <td><?php $edate=$row['edate'];echo $edate;?></td>
                        <td><?php $username=$row['username'];echo $username;?></td>
                        <td><?php $bqty=$row['bqty'];echo $bqty;?></td>
                        <td><?php $btprice=$row['btotalprice'];echo $btprice;?></td>
                        <td><?php $bstatus=$row['bstatus'];echo $bstatus;?></td>
                        
                        <td>
                            <div class="button-container">
                        <button class="btn1"><a href="delete-booking.php?deleteid=<?php echo $bid?>">delete</a></button>
                             </div>
                        </td>
                       
                    </tr>
                <?php endwhile; ?>
            <?php else:echo'no record found' ?>
                <tr>
                    <td colspan="4">No users found</td>
                </tr>
            <?php endif;
            $conn->close();
             ?>

        </tbody>
    </table>
  
    

   

</body>

</html>
