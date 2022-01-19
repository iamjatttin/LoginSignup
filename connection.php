<?php
session_start();
$conn = mysqli_connect("localhost","root","","admins");
if(!$conn){
    die ("Error Can`t Connect".mysqli_connect_error());
}

?>