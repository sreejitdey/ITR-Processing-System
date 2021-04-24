<?php
include '../dbconnect/dbconn.php';
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $user_id = $_POST['userid'];
    $password = $_POST['pswd'];
    $matched = False;
    $query = "SELECT * FROM `login_details` WHERE user_id='$user_id'";
    $result = mysqli_query($conn, $query);
    $num = mysqli_num_rows($result);
    if($num == 1)
    {
        $row = $result->fetch_assoc();
        $hashed_pass = $row['password'];
        $verify = password_verify($password, $hashed_pass);
        if($verify)
            $matched = True;
    }
    if($matched)
    {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['userid'] = $user_id;
        header("location: ../welcome/welcome.php");
    }
    else
    {
        echo "<h1>Invalid Credentials!</h1>";
        echo "<h2>Click <a href='loginform.html'>here</a> again to login</h2>";
    }   
}
?>
