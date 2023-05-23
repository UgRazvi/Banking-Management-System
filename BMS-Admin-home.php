<?php
// include("../BMS/Temp-cnct-lgn/BMS_Connect.php");
include("BMS_Connect.php");

session_start();
$name = $_SESSION["aname"];
$id = $_SESSION["aid"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMS ADMIN PANEL</title>
    <link rel="shortcut icon" href="../BMS/image/Bank1.png" type="image/x-icon">
    <!-- Secondary Favicon LOGO -->
    <!-- <link rel="shortcut icon" href="../BMS/image/Bank2.png" type="image/x-icon"> -->
    <link rel="stylesheet" href="BMS_General_Style.css">
</head>

<body class="cmn-body">
    <form action="" method="POST">
        <table align="center" class="header_table">
        <nav  >  <!-- style="float: right;" -->
                <?php
                echo "Username : $name$id";

                // echo "<script> alert('$name') </script>";
                // echo "<script> alert($id) </script>";
                ?>
            </nav>
            <!-- <hr> -->
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
                    <td align="center"><a href="BMS-Admin-Open-Account.php">OPEN ACCOUNT</a></td>
                    <td align="center"><a href="BMS-Admin-User-Details.php">USER DETAILS</a></td>
                    <td align="center"><a href="BMS-Admin-Transfer-Money.php">TRANSFER MONEY</a></td>
                    <td align="center"><a href="BMS-Admin-View-Statement.php">VIEW STATEMENT</a></td>
                    <td align="center"><a href="BMS-Admin-View-Requests.php">VIEW REQUESTS</a></td>
                    <td align="center"><a href="BMS-Admin-Logout">LOG OUT</a></td>
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