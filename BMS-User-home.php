<?php
include("BMS_Connect.php");
// include("BMS_Common.html");

session_start();
$name = $_SESSION['uname'];
$id = $_SESSION['uid'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMS USER PANEL</title>
    <link rel="shortcut icon" href="../BMS/image/Bank1.png" type="image/x-icon">
    <!-- Secondary Favicon LOGO -->
    <!-- <link rel="shortcut icon" href="../BMS/image/Bank2.png" type="image/x-icon"> -->
    <link rel="stylesheet" href="BMS_General_Style.css">
</head>

<body class="cmn-body">
    <form action="" method="get">
        <table align="center" class="header_table">
        <nav > 
                <?php
                echo "Username : $name - $id";
                ?>
            </nav>
            <tbody class="header-title">
                <th align="center" colspan="6">
                    <h1> <strong>BANKING MANAGEMENT SYSTEM</strong> </h1>
                </th>
                <tr>
                    <td colspan="6">
                        <hr>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td align="center"><a href="BMS-User-My-Profile.php">MY PROFILE</a></td>
                    <td align="center"><a href="BMS-User-View-Balance.php">VIEW BALANCE</a></td>
                    <td align="center"><a href="BMS-User-Transfer-Money.php">TRANSFER MONEY</a></td>
                    <td align="center"><a href="BMS-User-View-Transactions.php">VIEW TRANSACTIONS</a></td>
                    <td align="center"><a href="BMS-User-Do-Request.php">DO REQUEST</a></td>
                    <td align="center"><a href="BMS-User-Logout">LOG OUT</a></td>
                </tr>
                <tr>
                    <td colspan="6">
                    <br>
                        <hr>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td colspan="6"><img src="../BMS/image/Bank-03.png" alt="BG - IMAGE"></td>
                </tr>
            </tbody>
        </table>
    </form>
</body>

</html>

<?php
// session_abort();
?>