<?php
session_start();
include('../ADMINPG/includes/header.php');
// Check if user is logged in
if (!isset($_SESSION['uid']) || !isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header("Location: alogin.php");
    exit();
}
?>
<?php
include('../ADMINPG/includes/helper.php');
?>
<?php
if(isset($_GET['deleteid'])){

$eid=$_GET['deleteid'];
$sql = "DELETE FROM event WHERE eid = $eid";

if ($conn->query($sql) === TRUE) {
    header('location:event-list.php');
} else {
    echo "Error deleting record: " . $conn->error;
}
}

$conn->close();
?>
