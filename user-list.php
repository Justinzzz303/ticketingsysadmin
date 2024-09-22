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
    <title>User List</title>
</header>
<?php

include('../ADMINPG/includes/helper.php');
include('../ADMINPG/includes/header.php');
?>
<body>
    
    <h1>User List</h1>
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Password</th>
                <th>Gender</th>
                <th>Role</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            $sql = "SELECT * FROM user";
            $result = $conn->query($sql); 
           
            if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php $uid=$row['uid'];echo $uid;?></td>
                        <td><?php $username=$row['username'];echo $username;?></td>
                        <td><?php $email=$row['email'];echo $email;?></td>
                        <td><?php $phone=$row['phone'];echo $phone;?></td>
                        <td><?php $password=$row['password'];echo $password;?></td>
                        <td><?php $gender=$row['gender'];echo $gender;?></td>
                        <td><?php $role=$row['role'];echo $role;?></td>
                       
                    
                        <td>
                            <div class="button-container">
                        <button class="btn1"><a href="edit-user.php?editid=<?php echo $uid?>">edit</a></button>
                        <button class="btn1"><a href="delete-user.php?deleteid=<?php echo $uid?>">delete</a></button>
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
    <div><a href="add-user.php">add user</a></div>

   

</body>

</html>
