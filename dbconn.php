<?php
$conn = mysqli_connect("localhost", "root", "", "myschool_db");
if($conn === false){
    die("ERROR: conneting field please try again". mysqli_connect_error());
}
?>
