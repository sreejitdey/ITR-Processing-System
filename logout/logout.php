<?php
if(isset($_POST['logoutbtn']))
{
    session_start();
    session_unset();
    session_destroy();
    header("location: ../index.php");
    exit;
}
?>
