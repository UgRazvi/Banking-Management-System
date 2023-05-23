<?php
include "BMS_connect.php";

session_start();
$name = $_SESSION['uname'];
$id = $_SESSION['uid'];

// echo "Username : ";
// echo $name, "-", $id;
?>

<!DOCTYPE html>
<html lang="en">

</html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMS USER TRANSFER MONEY</title>
    <link rel="shortcut icon" href="../BMS/image/Bank1.png" type="image/x-icon">
    <link rel="stylesheet" href="BMS_General_Style.css">
</head>

<body>
    <!-- <h2 align="center">ALL STUDENTS DETAIL -->
    <nav>
        <?php
        echo "Username : $name - $id";
        // echo $name, "-", $id;
        ?>
    </nav>

    <fieldset style="  max-width: fit-content; ">
        <legend> <h1>MONEY TRANSFER</h1></legend>
        <form action="BMS-User-Transfer-Money.php" method="post" enctype="multipart/form-data">
            <table align="center" class="header_table">
                <tr>
                    <td> <br> RECEIVER's A/c </td>
                    <td> <br> <input type="text" name="rAcc" class="input-box" placeholder="Enter Receiver's Account Name" required>
                    </td>
                </tr>

                <tr>
                    <td> <br> AMOUNT </td>
                    <td> <br> <input type="text" name="tAmt" class="inp" placeholder="Enter Amount To Be Transferred">
                    </td>
                </tr>
                <tr>
                    <td> <br> DATE </td>
                    <td> <br> <input type="text" name="tDate" class="inp" value='<?php echo (date("y-m-d")); ?>'
                            readonly></td>
                </tr>
                <tr>
                    <td> <br> TIME </td>
                    <td> <br> <input type="text" name="tTime" class="inp" value='<?php echo (date("h:i:sa")); ?>'
                            readonly></td>
                </tr>

                <tr>
                    <td colspan="2" align="center"><input type="submit" name="t-btn" class="btn" value="TRANSFER">
                        <br><br>
                    </td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>

</html>

<?php
// echo(" <br> <br> <br> <br> ");


// After Click Event (Main Working) Logic
if (isset($_POST["t-btn"])) {

    $sAcc = $id;
    $rAcc = $_POST["rAcc"];
    $tAmt = $_POST["tAmt"];
    $tDate = $_POST["tDate"];
    $tTime = $_POST["tTime"];

    // Query Sending Logic
    $qry = "INSERT INTO utrans(sAcc, rAcc, tAmt, tDate, tTime) VALUES ('$sAcc', '$rAcc', $tAmt, '$tDate', '$tTime')";
    
    $qry2 = "UPDATE `openacc` SET uIntAmt=uIntAmt - $tAmt WHERE uId='$sAcc'";
    $qry3 = "UPDATE `openacc` SET uIntAmt=uIntAmt + $tAmt WHERE uId='$rAcc'";
    
    // echo " <br> Query 1 : ",$qry," <br> ";
    // echo " <br> Query 2 : ",$qry2," <br> ";
    // echo " <br> Query 3 : ",$qry3," <br> ";

    mysqli_query($con, $qry);
    mysqli_query($con, $qry2);
    mysqli_query($con, $qry3);

    mysqli_close($con);

    echo "<script>alert('MONEY TRANSFERRED SUCCESSFULLY')</script>";
}


// if (isset($_POST["p-btn"])) {
//     $name = $_POST["name"];

//     // $qry = "SELECT * FROM `balance_sheet` WHERE uName='$name'";

//     $qry = "SELECT * FROM `balance_sheet` WHERE uName='$name'";
//     $rs = mysqli_query($con, $qry);
//     $r = mysqli_num_rows($rs);

//     // echo " <br> Your Query : ", $qry;
//     // echo " <br> Number of Rows : ", $r;


//     echo "<table style=' align:center; border:'2px solid aqua'; cellspacing:0;'> ";

//     // echo(" <br> ");

//     echo "<th colspan = '3' align = 'center'> <h2> YOUR BALANCE DETAILS <br> ";
//     echo (" <br> <br> ");
//     echo "<tr>";
//     // echo "<td align = 'center'> User NAME";
//     echo "<td align = 'center'> Amount Send";
//     echo "<td align = 'center'> Amount Received";
//     echo "<td align = 'center'> Total Amount</tr>";
//     while (($r = mysqli_fetch_array($rs))) {

//         echo (" <br> <br> ");

//         echo "<tr>";
//         // echo "<td align = 'center'> $r[0]";
//         echo "<td align = 'center'> $r[1]";
//         echo "<td align = 'center'> $r[2]";
//         echo "<td align = 'center'> $r[3]";
//     }
// }

// Try Code
// session_abort();
?>