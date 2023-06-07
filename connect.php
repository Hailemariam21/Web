<?php
$user="root";
$server="localhost";
$pass="";
$db="DMUdorm";
$conn=mysqli_connect($server,$user,$pass,$db);
if(!$conn){
    echo "couldn't connect";
}
else{
    echo "connected succesfully";
}
?>