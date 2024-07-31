<?php
include_once('dbconn.php');
$id = $_GET['id'];
$sqlistm = mysqli_query($conn, "DELETE FROM students WHERE StudentID = '$id'");
if(!$sqlistm){
    echo "failed to delete";
}
else {
    echo "student deleted";
    header("location: index.php");
}
?>