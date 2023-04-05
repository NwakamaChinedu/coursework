<?php
include_once 'assets/sql/connect.php';

$id = $_GET['id'];
/* $id = $_GET['sid']; 
$id = urldecode($sid); 
$id = str_replace("<", "", $sid); */


/* $delquery = "DELETE FROM users where id = $id";
    $delstatement = $conn->prepare($delquery);
    $delstatement->execute();
    header("location: admin.php"); */

$delsql = "SELECT COUNT(*) AS count FROM allstories WHERE id = $id";
$stmt = $conn->prepare($delsql);
//$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();

// Fetch the count of rows in the child_table tied to the user account
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$count = $result['count'];

// Check if there are any rows in the child_table tied to the user account
if ($count > 0) {
    
    echo '<script>alert("There is atleast one story tied to this user, user can not be  deleted"); window.location.href = "admin.php";</script>';
    
} else {
    // Prepare a DELETE query to delete the user account
    $sql = "DELETE FROM users WHERE id = $id";
    $stmt = $conn->prepare($sql);
   // $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    header("location: admin.php");

}
?>
