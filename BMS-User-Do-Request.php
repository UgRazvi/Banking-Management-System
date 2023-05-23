<?php

// include "std_common.php";
include "BMS_connect.php";

// Request ID LOGIC (Important)

// $qry = "SELECT reqId from lib_request order by reqId desc";
$qry = "SELECT reqId FROM `bms_request` order by reqId desc";

$rs = mysqli_query($con, $qry);
$t = mysqli_num_rows($rs);
$r = mysqli_fetch_array($rs);

if ($t == 0) {
    $reqId = 'R1001';
} else {
    $reqId = "$r[0]" . "1"; //Original Logic
    // $reqId = "$r[0]"; //Temporary Check..
}

if (isset($_POST["r-btn"])) {


    $a = $_POST["uName"];
    $b = $_POST["uId"];
    $c = $_POST["reqId"];
    $d = $_POST["req"];
    $e = $_POST["rDate"];
    $f = $_POST["rTime"];


    $qry = "select * from openacc where uName='$a'"; //For checking If User exists in DB or not...
    // $qry = "select * from openacc where uName='" . $a . "'";  //Additionl Logic ----Need to be understood
    $rs = mysqli_query($con, $qry);
    $t = mysqli_num_rows($rs);
    if ($t != 0) {

        $qry1 = "INSERT INTO `bms_request` VALUES ('$a','$b','$c','$d','$e','$f')";
        echo " <br> Your Query01 : ",$qry1;

        mysqli_query($con, $qry1);
        mysqli_close($con);
        // echo "<script>alert('')</script>";
        echo "<script>alert('Request Submitted and Your Request Id is : $c')</script>";
    } else {
        echo "<script>alert('ERROR IN REQUESTING : $d')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMS USER REQUEST</title>
    <link rel="stylesheet" href="BMS_General_Style.css">
</head>

<body>
    <fieldset>
        <legend>
        <h2>REQUEST</h2>
        </legend>


        <form method="POST" action="BMS-User-Do-Request.php">

            <table align="center">
                
                <tr>
                    <td>User Name</td>
                    <td><input type="text" name="uName" class="inp"></td>
                </tr>
                <tr>
                    <td>User ID</td>
                    <td><input type="text" name="uId" class="inp"></td>
                </tr>
                <tr>
                    <td>Request ID</td>
                    <td><input type="text" name="reqId" class="inp" value='<?php echo $reqId; ?>'
                            readonly></td>
                </tr>

                <tr>
                    <td>Select Request</td>
                    <td>
                        <select name="req" class="inp">
                            <option value="">---SELECT---</option>
                            <option value="Atm">ATM</option>
                            <option value="PassBook">PASS-BOOK</option>
                            <option value="CheckBook">CHECK-BOOK</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Date Of Request</td>
                    <td><input type="text" name="rDate" class="inp" value='<?php echo (date("d-m-y")); ?>'
                            readonly></td>
                </tr>

                 <tr>
                    <td>Time Of Request</td>
                    <td><input type="text" name="rTime" class="inp" value='<?php echo (date("h:i:sa")); ?>'
                            readonly></td>
                </tr>

                <tr>
                    <td colspan="2" align="center"><input type="submit" name="r-btn" class="btn" value="REQUEST">
                        <br><br>
                    </td>
                </tr>

            </table>
        </form>
    </fieldset>
</body>

</html>