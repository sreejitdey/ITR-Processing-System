<?php
//https://remotemysql.com/
$servername = "remotemysql.com";
$username = "4DrVQOg112";
$password = "C1YQ3wkYiD";
$database = "4DrVQOg112";
$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn)
    die("Error! ==> ".mysqli_connect_error());
?>
