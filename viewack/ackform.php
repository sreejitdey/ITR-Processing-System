<!DOCTYPE html>
<html>

<head>
    <title>Acknowledgement Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="ackstyle.css">
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
    $query1 = "SELECT * FROM `user_details` WHERE user_id='$user_id'";
    $result1 = mysqli_query($conn, $query1);
    $row1 = $result1->fetch_assoc();
    $first_name = $row1['first_name'];
    $middle_name = $row1['middle_name'];
    $last_name = $row1['last_name'];
    $name = $first_name.' '.$middle_name.' '.$last_name;
    $email = $row1['email'];
    $mobile_no = $row1['mobile_no'];
    $country = $row1['country'];
    $state = $row1['state'];
    $temp = $row1['address'];
    $address = $temp.', '.$state.', '.$country;
    $query2 = "SELECT * FROM `income_details` WHERE user_id='$user_id'";
    $result2 = mysqli_query($conn, $query2);
    $row2 = $result2->fetch_assoc();
    $gross_total = $row2['gross_total'];
    $total_deduction = $row2['total_deduction'];
    $total_income = $row2['total_income'];
    $net_tax = $row2['net_tax'];
    $tax_paid = $row2['tax_paid'];
    $tax_payable = $row2['tax_payable'];
    $refund_amount = $row2['refund_amount'];
    ?>
    <div id="formview" class="container">
        <div class="bgi"></div>
        <hr>
        <br>
        <h1>ITR-1 : ASSESSMENT YEAR 2020-21</h1>
        <br>
        <table>
            <tr>
                <th class="col1">Name</th>
                <th class="col2">
                    <?php echo $name?>
                </th>
            </tr>
            <tr>
                <th class="col1">PAN Number</th>
                <th class="col2">
                    <?php echo $user_id?>
                </th>
            </tr>
            <tr>
                <th class="col1">Address</th>
                <th class="col2">
                    <?php echo $address?>
                </th>
            </tr>
            <tr>
                <th class="col1">Mobile Number</th>
                <th class="col2">
                    <?php echo $mobile_no?>
                </th>
            </tr>
            <tr>
                <th class="col1">Email ID</th>
                <th class="col2">
                    <?php echo $email?>
                </th>
            </tr>
            <tr>
                <th class="col1">Gross Total Income</th>
                <th class="col2">Rs.
                    <?php echo $gross_total?>
                </th>
            </tr>
            <tr>
                <th class="col1">Total Deduction</th>
                <th class="col2">Rs.
                    <?php echo $total_deduction?>
                </th>
            </tr>
            <tr>
                <th class="col1">Total Income</th>
                <th class="col2">Rs.
                    <?php echo $total_income?>
                </th>
            </tr>
            <tr>
                <th class="col1">Net Tax Payable</th>
                <th class="col2">Rs.
                    <?php echo $net_tax?>
                </th>
            </tr>
            <tr>
                <th class="col1">Tax Paid</th>
                <th class="col2">Rs.
                    <?php echo $tax_paid?>
                </th>
            </tr>
            <tr>
                <th class="col1">Tax Payable</th>
                <th class="col2">Rs.
                    <?php echo $tax_payable?>
                </th>
            </tr>
            <tr>
                <th class="col1">Refund</th>
                <th class="col2">Rs.
                    <?php echo $refund_amount?>
                </th>
            </tr>
        </table>
    </div>
    <form action="../logout/logout.php" method="post">
        <button class="logoutbtn" id="logoutbtn" name="logoutbtn">Logout</button>
    </form>
    <button class="downloadbtn" id="downloadbtn" name="downloadbtn" onclick="SaveAsPDF()">Download</button>
    <br><br>
    <script type="text/javascript" src="downloadack.js"></script>
</body>

</html>
