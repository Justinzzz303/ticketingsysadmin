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
    <title>Edit Event</title>
</header>
<?php

include('../ADMINPG/includes/helper.php');
include('../ADMINPG/includes/header.php');
?>
</head>

<?php
 
if(isset($_GET['editid'])){
    $eid =$_GET['editid']; 


            
    $sql = "SELECT * FROM event where eid='$eid'";
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




    <form action="edit-event.php?editid=<?php echo $eid?>" method="post">
    

    <h2>Edit Event</h2>

   
    <input type="text" id="ename" name="ename" value="<?php echo $row['ename']?>"required><br><br>
        <input type="text" id="eprice" name="eprice"value="<?php echo $row['eprice']?>"required><br><br>
        <textarea id="edescription" name="edescription"rows="4" cols="50"><?php echo $row['edescription']?></textarea><br><br>
        <input type="text" id="edate" name="edate"value="<?php echo $row['edate']?>" required><br><br>
        <input type="text" id="edate" name="eqty"value="<?php echo $row['eqty']?>" required><br><br>

     
        <input type="submit" name="update" value="update"><br><br><button class="btn1"><a href="event-list.php">back</a></button>

  
    </form>

</body>
<?php
if(isset($_POST['update'])){
    if(isset($_GET['editid'])); 
    $ename=$_POST['ename'];
    $eprice=$_POST['eprice'];
    $edescription=$_POST['edescription'];
    $edate=$_POST['edate'];
    $eqty=$_POST['eqty'];


    $sql="update event set ename='$ename',eprice='$eprice',edescription='$edescription',edate='$edate',eqty='$eqty'where eid='$eid'";
    $result = $conn->query($sql); 
   
    if (!$result){
    die("query Failed".mysqli_error());
    }
    else{
        header("location:event-list.php?update_msg=you have successfully update the data.");
    }
}

?>


</html>


