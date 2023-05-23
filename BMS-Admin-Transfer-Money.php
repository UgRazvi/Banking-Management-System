<?php
// include("../BMS/Temp-cnct-lgn/BMS_Connect.php");
include("BMS_Connect.php");

date_default_timezone_set("Indian/Reunion");

session_start();
$name = $_SESSION['aname'];
$id = $_SESSION['aid'];

// Maintain Connection Logic
// include("../BMS/Temp-cnct-lgn/BMS_Connect.php");
include("BMS_Connect.php");


// After Click Event (Main Working) Logic
if (isset($_POST["btn"])) {

    $sAcc = $_POST["sAcc"];
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMS ADMIN TRANSFER MONEY</title>
    <link rel="shortcut icon" href="../BMS/image/Bank1.png" type="image/x-icon">
    <link rel="stylesheet" href="BMS_General_Style.css">
</head>

<body>
    <nav> <!-- style="float: right;" -->
        <?php
        echo "Username : ";
        echo $name;
        echo $id;
        // echo "<script> alert('$name') </script>";
        // echo "<script> alert($id) </script>";
        ?>
    </nav>
    <fieldset>
        <legend>
            <h1> MONEY - TRANSFER </h1>
        </legend>
        <br>
        <form method="post" action="BMS-Admin-Transfer-Money.php" enctype="multipart/form-data">
            <table align="center" bgcolor="aquamarine" border="1">

                <tr>
                    <td> <br> SENDER's A/C </td>
                    <td> <br> <input type="text" name="sAcc" class="inp" placeholder="Enter Sender's Account Number">
                    </td>
                </tr>
                <tr>
                    <td> <br> RECEIVER's A/C </td>
                    <td> <br> <input type="text" name="rAcc" class="inp" placeholder="Enter Receivers's Account Number">
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
                    <td colspan="2" align="center"><input type="submit" name="btn" class="btn" value="TRANSFER">
                        <br><br>
                    </td>
                </tr>
            </table>
        </form>
        <!-- </fieldset> -->
</body>

</html>

<?php
// session_abort();
?>