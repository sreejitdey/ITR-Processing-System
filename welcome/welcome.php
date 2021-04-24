<!DOCTYPE html>
<html>

<head>
    <title>Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="welcomestyle.css">
</head>

<body>
    <?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true)
    {
        header("location: ../login/login.php");
        exit;
    }
    include '../dbconnect/dbconn.php';
    $user_id = $_SESSION['userid'];
    $query = "SELECT `first_name`, `middle_name`, `last_name` FROM `user_details` WHERE user_id='$user_id'";
    $result = mysqli_query($conn, $query);
    $row = $result->fetch_assoc();
    $first_name = $row['first_name'];
    $middle_name = $row['middle_name'];
    $last_name = $row['last_name'];
    ?>
    <div class="heading">
        <br>e-Filing Anywhere Anytime<br>
        Income Tax department, Government of India<br><br>
    </div>
    <div class="container">
        <div class="message">
            Welcome
            <?php echo $first_name.' '.$middle_name.' '.$last_name;?>
        </div>
        <br><br>
        <table>
            <tr>
                <th>PAN Number</th>
                <th>
                    <?php echo $user_id;?>
                </th>
            </tr>
            <tr>
                <td>Assessment Year</td>
                <td>2020-21</td>
            </tr>
            <tr>
                <td>ITR Form Number</td>
                <td>ITR-1</td>
            </tr>
            <tr>
                <td>Filling Type</td>
                <td>Original/Revised Return</td>
            </tr>
            <tr>
                <td>Submission Mode</td>
                <td>Prepare and Submit Online</td>
            </tr>
        </table>
        <ul>
            <li>PAN, Name, Date of Birth shall be prefilled from PAN database</li>
            <li>Address, Aadhaar Number, mobile number and e-mail ID shall be prefilled from e-Filing Profile (Please
                update e-Filling Profile before proceeding)</li>
            <li>Tax Payment, TDS and TCS details shall be prefilled from Form 26AS</li>
            <li>Details of Salary Income, allowances and deductions shall be prefilled from Annexure II of Form 24Q</li>
            <li>Type of House Property shall be prefilled from last filed ITR</li>
            <li>Details of Income from House property shall be prefilled from Form 26AS</li>
            <li>Details of Interest income from Term Deposit shall be prefilled from Form 26AS</li>
            <li>Details of Interest income details (u/s 244A) from Income Tax Refund</li>
            <li>Tax relief u/s 89 shall be prefilled from Annexure II of Form 24Q</li>
            <li>Bank account details shall be prefilled from last filed ITR and e-Filing Profile</li>
            <li>Verification Details - Self/Representative PAN details as applicable based on Logged in PAN</li>
        </ul>
        <br><br>
        <form action="../logout/logout.php" method="post">
            <button class="logoutbtn" id="logoutbtn" name="logoutbtn">Logout</button>
        </form>
        <form action="../e-filing/efiling.php" method="post">
            <button class="continuebtn" id="continuebtn" name="continuebtn">Continue</button>
        </form>
    </div>
</body>

</html>
