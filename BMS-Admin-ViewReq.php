<?php

// SELECT `reqId`, `req`, `rStatus` FROM `bms_req_status` WHERE uName='$a' AND uId='$b'


include "BMS_connect.php";

$a = $_GET["t1"];
$b = $_GET["t2"];
$c = $_GET["t3"];
$d = $_GET["t4"];
$e = $_GET["t5"];
$f = $_GET["t6"];
$g = $_GET["t7"];

if (isset($_POST["Accept"])) {

    // UPDATE `bms_request` SET `rStatus`='[value-7]' WHERE uName='$a' AND uId='$b'
    $qry = "UPDATE `bms_request` SET `rstatus`='Accepted' WHERE uName='$a' AND uId='$b'";
    echo "<br> Query-1 : ",$qry;
    
    mysqli_query($con, $qry);
    mysqli_close($con);
}
if (isset($_POST["Reject"])) {
    
    // UPDATE `bms_request` SET `rStatus`='[value-7]' WHERE uName='$a' AND uId='$b'
    $qry = "UPDATE `bms_request` SET `rstatus`='Rejected' WHERE uName='$a' AND uId='$b'";
    echo "<br> Query-2 : ",$qry;
    
    mysqli_query($con, $qry);
    mysqli_close($con);
}
if (isset($_POST["On_The_Way"])) {
    
    // UPDATE `bms_request` SET `rStatus`='[value-7]' WHERE uName='$a' AND uId='$b'
    $qry = "UPDATE `bms_request` SET `rstatus`='On The Way' WHERE uName='$a' AND uId='$b'";
    echo "<br> Query-3 : ",$qry;

    mysqli_query($con, $qry);
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REQUEST VIEW PAGE</title>
    <link rel="stylesheet" href="BMS_General_Style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>

<body>
    <fieldset>

        <legend>
            <h2>View And Verify Details</h2>
        </legend>

        <!-- Action ....? -->
        <form action="" method="post">
            <table border=2 cellpadding=10 align=center>



                <tr>
                    <td align=center>User Name
                    <td> <input type="text" name="uName" value='<?php echo $a ?>' readonly>
                </tr>
                <tr>
                    <td align=center>User ID
                    <td> <input type="text" name="uId" value='<?php echo $b ?>' readonly>

                </tr>
                <tr>
                    <td align=center>Request ID
                    <td> <input type="text" name="reqId" value='<?php echo $c ?>' readonly>

                </tr>
                <tr>
                    <td align=center>Request
                    <td> <input type="text" name="req" value='<?php echo $d ?>' readonly>

                </tr>
                <tr>
                    <td align=center>Reject Date
                    <td> <input type="text" name="rDate" value='<?php echo $e ?>' readonly>

                </tr>
                <tr>
                    <td align=center>Reject Time
                    <td> <input type="text" name="rTime" value='<?php echo $f ?>' readonly>

                </tr>
                <tr>
                    <td align=center>Request Status
                    <td> <input type="text" name="doissue" value='<?php echo $g ?>' readonly>

                </tr>

                <tr>
                    <td colspan="2" align="center">
                        <button type="submit" name="Accept" class="btn">Accept</button>
                        <button type="submit" name="Reject" class="btn">Reject</button>
                        <button type="submit" name="On_The_Way" class="btn">On The Way</button>
                    </td>
                </tr>
            </table>
        </form>
    </fieldset>
</body>

</html>

