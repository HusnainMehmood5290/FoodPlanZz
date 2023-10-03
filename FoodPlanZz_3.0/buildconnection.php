<?php
function connection()
{
    $host="localhost";
    $user="root";
    $pass="";
    $db="assignment2WEB";
    $conn=mysqli_connect($host,$user,$pass,$db);
    return $conn;
}
// header('location:index.html');
?>