<?php
// include("../BMS/Temp-cnct-lgn/BMS_Connect.php");
include("BMS_Connect.php");

date_default_timezone_set("Indian/Reunion");

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
    <title>BMS USER VIEW TRANSACTIONS</title>
    <link rel="shortcut icon" href="../BMS/image/Bank1.png" type="image/x-icon">
    <link rel="stylesheet" href="BMS_General_Style.css">
</head>

<body>
    <nav> <!-- style="float: right;" -->
        <?php
        echo "Username : $name-$id";
        // echo $name;
        // echo $id;

        // echo "<script> alert('$name') </script>";
        // echo "<script> alert($id) </script>";
        ?>
    </nav>
    <!-- <fieldset>
        <legend>
            <h1> VIEW YOUR TRANSACTIONS </h1>
        </legend>
        <br>
        <form method="post" action="BMS-Admin-View-Statement.php" enctype="multipart/form-data">
            <table align="center" bgcolor="aquamarine" border="1">

                <tr>
                    <td> <br> USER A/C </td>
                    <td> <br> <input type="text" name="uAcc" class="inp" placeholder="Enter User's Account Number">
                    </td>
                </tr>

                <tr>
                    <td colspan="2" align="center"><input type="submit" name="btn" class="btn" value="STATEMENT">
                        <br><br>
                    </td>
                </tr>
            </table>
        </form>
        </fieldset> -->
</body>

</html>

<?php

// After Click Event (Main Working) Logic
// if (isset($_POST["btn"])) {

// Query Sending Logic
$qry1 = "SELECT * FROM `utrans` WHERE sAcc=$id OR rAcc=$id";

$rs1 = mysqli_query($con, $qry1);
$r1 = mysqli_num_rows($rs1);

// echo ("<br> Sender's Query : $qry1");
// echo (" <br> Rows Fetched : $r1"); 

// LOGIC FOR SENT MONEY
if ($r1 != 0) {
    echo "<table style=' vertical-align:middle; border:'2px solid aqua'; cellspacing:0;'> ";

    // echo(" <br> ");

    echo "<th colspan = '5' align = 'center'> <h2> YOUR TRANSACTIONS <br> ";
    echo (" <br> <br> ");
    echo "<tr>";
    echo "<td align = 'center'> SENDER'S A/C ";
    echo "<td align = 'center'> RECEIVER'S A/C ";
    echo "<td align = 'center'> TOTAL AMOUNT ";
    echo "<td align = 'center'> TRANS. DATE ";
    echo "<td align = 'center'> TRANS. TIME ";

    while (($r1 = mysqli_fetch_array($rs1))) {

        echo (" <br> <br> ");
        echo "<tr>";
        echo "<td align = 'center'> $r1[0]";
        echo "<td align = 'center'> $r1[1]";
        echo "<td align = 'center'> $r1[2]";
        echo "<td align = 'center'> $r1[3]";
        echo "<td align = 'center'> $r1[4]";
    }
}

echo ("<br> <br>");

// }

// session_abort();
?>