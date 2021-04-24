<!DOCTYPE html>
<html>

<head>
    <title>e-Filling Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="efilingstyle.css">
</head>

<body>
    <?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true)
    {
        header("location: ../login/login.php");
        exit;
    }
    ?>
    <div class="heading">
        <br>COMPUTATION OF INCOME AND TAX<br><br>
    </div>
    <br>
    <form action="../logout/logout.php" method="post">
        <button class="logoutbtn" id="logoutbtn" name="logoutbtn">Logout</button>
    </form>
    <div class="container">
        <form action="submitform.php" method="post">
            <table>
                <tr class="mainrow">
                    <th class="indexcol">B1.</th>
                    <th class="labelcol">Gross Total Income</th>
                    <th class="inputcol">Amount (Rs.)</th>
                </tr>
                <tr class="subrow1">
                    <td class="indexcol">(i)</td>
                    <td class="labelcol">Gross Salary (ia + ib + ic)</td>
                    <td class="inputcol"><input type="text" id="textbox1" name="textbox1" value="0" readonly></td>
                </tr>
                <tr class="subrow2">
                    <td class="indexcol">(a)</td>
                    <td class="labelcol">Salary as per section 17(1)</td>
                    <td class="inputcol"><input type="text" id="textbox1_1" name="textbox1_1" value="0"
                            onblur="calculate()"></td>
                </tr>
                <tr class="subrow2">
                    <td class="indexcol">(b)</td>
                    <td class="labelcol">Value of perquisites as per section 17(2)</td>
                    <td class="inputcol"><input type="text" id="textbox1_2" name="textbox1_2" value="0"
                            onblur="calculate()"></td>
                </tr>
                <tr class="subrow2">
                    <td class="indexcol">(c)</td>
                    <td class="labelcol">Profits in ileu as per section 17(3)</td>
                    <td class="inputcol"><input type="text" id="textbox1_3" name="textbox1_3" value="0"
                            onblur="calculate()"></td>
                </tr>
                <tr class="subrow1">
                    <td class="indexcol">(ii)</td>
                    <td class="labelcol">Less: Allowances to the extent exempt u/s 10</td>
                    <td class="inputcol"><input type="text" id="textbox2" name="textbox2" value="0"
                            onblur="calculate()">
                    </td>
                </tr>
                <tr class="subrow1">
                    <td class="indexcol">(iii)</td>
                    <td class="labelcol">Net Salary (i - ii)</td>
                    <td class="inputcol"><input type="text" id="textbox3" name="textbox3" value="0" readonly></td>
                </tr>
                <tr class="subrow1">
                    <td class="indexcol">(iv)</td>
                    <td class="labelcol">Deduction u/s 16 (iva + ivb + ivc)</td>
                    <td class="inputcol"><input type="text" id="textbox4" name="textbox4" value="0" readonly></td>
                </tr>
                <tr class="subrow2">
                    <td class="indexcol">(a)</td>
                    <td class="labelcol">Standard deduction u/s 16 (ia)</td>
                    <td class="inputcol"><input type="text" id="textbox4_1" name="textbox4_1" value="0" readonly></td>
                </tr>
                <tr class="subrow2">
                    <td class="indexcol">(b)</td>
                    <td class="labelcol">Entertainment allowances u/s 16(ii)</td>
                    <td class="inputcol"><input type="text" id="textbox4_2" name="textbox4_2" value="0"
                            onblur="calculate()"></td>
                </tr>
                <tr class="subrow2">
                    <td class="indexcol">(c)</td>
                    <td class="labelcol">Professional tax u/s 16(iii)</td>
                    <td class="inputcol"><input type="text" id="textbox4_3" name="textbox4_3" value="0"
                            onblur="calculate()"></td>
                </tr>
                <tr class="subrow1">
                    <td class="indexcol">(v)</td>
                    <td class="labelcol">Income chargeable under the Head "Salaries" (iii - iv)</td>
                    <td class="inputcol"><input type="text" id="textbox5" name="textbox5" value="0"></td>
                </tr>
                <tr class="mainrow">
                    <th class="indexcol">B2.</th>
                    <th class="labelcol">Income Chargeable Under The Head House Property</th>
                    <th class="inputcol"><input type="text" id="textbox6" name="textbox6" value="0"
                            onblur="calculate()">
                    </th>
                </tr>
                <tr class="mainrow">
                    <th class="indexcol">B3.</th>
                    <th class="labelcol">Income From Other Sources</th>
                    <th class="inputcol"><input type="text" id="textbox7" name="textbox7" value="0"
                            onblur="calculate()">
                    </th>
                </tr>
                <tr class="mainrow">
                    <th class="indexcol">B4.</th>
                    <th class="labelcol">Gross Total Income (B1 + B2 + B3)</th>
                    <th class="inputcol"><input type="text" id="textbox8" name="textbox8" value="0" readonly></th>
                </tr>
                <tr class="mainrow">
                    <th class="indexcol">C1.</th>
                    <th class="labelcol">Total Deduction</th>
                    <th class="inputcol"><input type="text" id="textbox9" name="textbox9" value="0" readonly></th>
                </tr>
                <tr class="subrow1">
                    <td class="indexcol">(i)</td>
                    <td class="labelcol">80C-Life insurance premia, deferred annuity, contributions to provident fund,
                        subscription to certain equity shares or debentures, etc.</td>
                    <td class="inputcol"><input type="text" id="textbox10" name="textbox10" value="0"
                            onblur="calculate()">
                    </td>
                </tr>
                <tr class="subrow1">
                    <td class="indexcol">(ii)</td>
                    <td class="labelcol">80D-Deduction in respect of Health insurance premium</td>
                    <td class="inputcol"><input type="text" id="textbox11" name="textbox11" value="0"
                            onblur="calculate()">
                    </td>
                </tr>
                <tr class="subrow1">
                    <td class="indexcol">(iii)</td>
                    <td class="labelcol">80E-Interest on loan taken for higher education</td>
                    <td class="inputcol"><input type="text" id="textbox12" name="textbox12" value="0"
                            onblur="calculate()">
                    </td>
                </tr>
                <tr class="mainrow">
                    <th class="indexcol">C2.</th>
                    <th class="labelcol">Total Income (B4 - C1)</th>
                    <th class="inputcol"><input type="text" id="textbox13" name="textbox13" value="0" readonly></th>
                </tr>
                <tr class="mainrow">
                    <th class="indexcol">D1.</th>
                    <th class="labelcol">Tax Payable on Total Income</th>
                    <th class="inputcol"><input type="text" id="textbox14" name="textbox14" value="0" readonly></th>
                </tr>
                <tr class="mainrow">
                    <th class="indexcol">D2.</th>
                    <th class="labelcol">Total Tax Paid (i + ii)</th>
                    <th class="inputcol"><input type="text" id="textbox15" name="textbox15" value="0" readonly></th>
                </tr>
                <tr class="subrow1">
                    <td class="indexcol">(i)</td>
                    <td class="labelcol">Total Advance Tax Paid</td>
                    <td class="inputcol"><input type="text" id="textbox16" name="textbox16" value="0"
                            onblur="calculate()">
                    </td>
                </tr>
                <tr class="subrow1">
                    <td class="indexcol">(ii)</td>
                    <td class="labelcol">Total TDS Claimed</td>
                    <td class="inputcol"><input type="text" id="textbox17" name="textbox17" value="0"
                            onblur="calculate()">
                    </td>
                </tr>
                <tr class="resultrow">
                    <th class="indexcol">D3.</th>
                    <th class="labelcol">Amount Payable (D1 - D2) (if D1 >= D2)</th>
                    <th class="inputcol"><input type="text" id="textbox18" name="textbox18" value="0" readonly></th>
                </tr>
                <tr class="resultrow">
                    <th class="indexcol">D4.</th>
                    <th class="labelcol">Refund (D2 - D1) (if D1 < D2)</th>
                    <th class="inputcol"><input type="text" id="textbox19" name="textbox19" value="0" readonly></th>
                </tr>
            </table>
            <br>
            <button class="submitbtn" id="submitbtn" name="submitbtn">Submit</button>
        </form>
    </div>
    <script type="text/javascript" src="efilingscript.js"></script>
</body>

</html>
