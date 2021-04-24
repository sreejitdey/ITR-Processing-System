<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true)
{
    header("location: ../login/login.php");
    exit;
}
include '../dbconnect/dbconn.php';
$user_id = $_SESSION['userid'];
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $gross_total = $_POST['textbox8'];
    $total_deduction = $_POST['textbox9'];
    $total_income = $_POST['textbox13'];
    $net_tax = $_POST['textbox14'];
    $tax_paid = $_POST['textbox15'];
    $tax_payable = $_POST['textbox18'];
    $refund_amount = $_POST['textbox19'];
}
if($total_income == "NaN" || $tax_paid == "NaN")
{
    echo "<h1>Sorry! We are facing some problem while submitting this form!</h1>";
    echo "<form action='http://localhost/SREEJIT_PHP/Income-Tax-Return%20Processing%20System/user/e-filing/efiling.php' method='post'>
        <button class='backbtn' id='backbtn' name='backbtn'>Go back</button></form>";
    echo "<form action='http://localhost/SREEJIT_PHP/Income-Tax-Return%20Processing%20System/user/logout/logout.php' method='post'>
        <button class='logoutbtn' id='logoutbtn' name='logoutbtn'>Logout</button></form>";
    exit;
}
$search= "SELECT * FROM `income_details` WHERE user_id='$user_id'";
$temp = mysqli_query($conn, $search);
$num = mysqli_num_rows($temp);
if($num == 1)
{
    $revised = 1;
    $query = "UPDATE `income_details` SET `gross_total` = '$gross_total', `total_deduction` = '$total_deduction',
             `total_income` = '$total_income', `net_tax` = '$net_tax', `tax_paid` = '$tax_paid', 
             `tax_payable` = '$tax_payable', `refund_amount` = '$refund_amount' WHERE `income_details`.`user_id` = '$user_id'";
}
else
{
    $revised = 0;
    $query = "INSERT INTO `income_details` (`user_id`, `gross_total`, `total_deduction`, `total_income`, `net_tax`, 
            `tax_paid`, `tax_payable`, `refund_amount`) VALUES ('$user_id', '$gross_total', '$total_deduction', '$total_income', 
            '$net_tax', '$tax_paid', '$tax_payable', '$refund_amount')";
}
$result = mysqli_query($conn, $query);
if($revised == 0)
    echo "<h1>ITR-1 Return of assessment year 2020-21 has been submitted succefully!</h1>";
else
    echo "<h1>ITR-1 Revised Return of assessment year 2020-21 has been submitted succefully!</h1>";
echo "<h2>You can view the form by clicking <a href='../viewack/ackform.php'>here</a></h2>";
echo "<form action='../logout/logout.php' method='post'><button class='logoutbtn' id='logoutbtn' name='logoutbtn'>Logout</button></form>";
?>
