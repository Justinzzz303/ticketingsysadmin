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
    <title>Edit user</title>
</header>
<?php

include('../ADMINPG/includes/helper.php');
include('../ADMINPG/includes/header.php');
?>
</head>

<?php
 
if(isset($_GET['editid'])){
    $uid =$_GET['editid']; 


            
    $sql = "SELECT * FROM user where uid='$uid'";
    $result = $conn->query($sql); 
   
    if (!$result){
    die("query Failed".mysqli_error());
    }
    else{
        $row=mysqli_fetch_assoc($result);
    }
      
}

?>

<body>




    <form action="edit-user.php?editid=<?php echo $uid?>" method="post">
    

    <h2>Edit User</h2>

    <input type="text" id="username" name="username" value="<?php echo $row['username']?>"required><br><br>
        <input type="email" id="email" name="email"value="<?php echo $row['email']?>"required><br><br>
        <input type="text" id="phone" name="phone" value="<?php echo $row['phone']?>"pattern="[0-9]{10,11}" title="Please enter a valid 10 or 11-digit phone number" required><br><br>
        <input type="password" id="password" name="password"value="<?php echo $row['password']?>" required><br><br>
        <input type="password" id="confirm_password"minlenght="8" name="confirm_password" value="<?php echo $row['password']?>"required><br><br>
        <input type="radio" name="gender" value="Male"required>Male
        <input type="radio" name="gender" value="Female"required>Female<br>
        <input type="radio" name="role" value="admin"required>Admin
        <input type="radio" name="role" value="member"required>Member

        <br><input type="submit" name="update"value="update"><br><br><button class="btn1"><a href="user-list.php">back</a></button>

  
    </form>

</body>
<?php
if(isset($_POST['update'])){
    if(isset($_GET['editid'])); 
    $username=$_POST['username'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $gender=$_POST['gender'];
    $role=$_POST['role'];

    $sql="update user set username='$username',email='$email',phone='$phone',password='$password',gender='$gender',role='$role' where uid=$uid";
    $result = $conn->query($sql); 
   
    if (!$result){
    die("query Failed".mysqli_error());
    }
    else{
        header("location:user-list.php?update_msg=you have successfully update the data.");
    }
}

?>


</html>


