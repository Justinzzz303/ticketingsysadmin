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
    <title>Event List</title>
</header>
<?php

include('../ADMINPG/includes/helper.php');
include('../ADMINPG/includes/header.php');
?>
<body>
    <table>
    <h1>Event List</h1>
    <thead>
        <tr>
            <th>Event ID</th>
            <th>Event</th>
            <th>Price</th>
            <th>Description</th>
            <th>Date</th>
            <th>Quantity</th>
          
            <th>Operation</th>
        </tr>
    </thead>
    <tbody>
    <tbody>
            <?php
            
            $sql = "SELECT * FROM event";
            $result = $conn->query($sql); 
           
            if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php $eid=$row['eid'];echo $eid;?></td>
                        <td><?php $ename=$row['ename'];echo $ename;?></td>
                        <td><?php $eprice=$row['eprice'];echo $eprice;?></td>
                        <td><?php $edescription=$row['edescription'];echo $edescription;?></td>
                        <td><?php $edate=$row['edate'];echo $edate;?></td>
                        <td><?php $eqty=$row['eqty'];echo $eqty;?></td>
                       
                        <td>
                            <div class="button-container">
                        <button class="btn1"><a href="edit-event.php?editid=<?php echo$eid ?>">edit</a></button>
                        <button class="btn1"><a href="delete-event.php?deleteid=<?php echo $eid?>">delete</a></button>
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
    <div><a href="add-event.php">add event</a></div>
    

   

</body>

</html>
