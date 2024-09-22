<?php
session_start();
include('../ADMINPG/includes/helper.php');
if(isset($_POST['username']) && isset($_POST['password']))
{
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    
    if (empty($username))
    {
        header("Location: alogin.php?error=Username Is Required");
        exit();
    }
    else if (empty($password))
    {
        header("Location: alogin.php?error=Password Is Required");
        exit();
    }
    else
    {
        $sql = "SELECT * FROM user WHERE username ='$username'AND password ='$password'AND role='admin'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1)
        {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $username && $row['password'] === $password && $row['role'] === 'admin')
            {
                $_SESSION['username'] = $row['username'];
                $_SESSION['uid'] = $row['uid'];
                $_SESSION['phone'] = $row['phone'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['gender'] = $row['gender'];
                $_SESSION['role'] = $row['role'];
                
                header("Location: admin-panel.php");
                exit();
            
            }
            else
            {
                header("Location: alogin.php?error=Incorrect username or password");
                exit();
            }
        }
        else
        {
            header("Location: alogin.php?error=Incorrect username or password");
            exit();
        }
    }
}
else
{
    header("Location: alogin.php");
    exit();
}
?>