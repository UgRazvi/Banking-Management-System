<?php
// include("../BMS/Temp-cnct-lgn/BMS_Connect.php");
include("BMS_Connect.php");

session_start();
$name = $_SESSION['aname'];
$id = $_SESSION['aid'];
?>

<!DOCTYPE html>
<html lang="en">

</html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMS USER DETAILS</title>
    <link rel="shortcut icon" href="./BMS/image/Bank1.png" type="image/x-icon">
    <link rel="stylesheet" href="BMS_General_Style.css">
</head>

<body>
    <!-- <h2 align="center">Accounts Detail -->
    <nav>
        <!-- <hr> -->
        <?php
        echo "Username : $name$id";
        // echo $name, "-", $id;

        // echo $id;
        // echo "<script> alert('$name') </script>";
        // echo "<script> alert($id) </script>";
        ?>
        <!-- <hr> -->
    </nav>
    <!-- <fieldset>
        <legend></legend> -->
    <!-- <form method="post" action="BMS-Admin-View-Balance.php" enctype="multipart/form-data">
            <table class="Search Bar" >
                <tr>
                    <td> <input type="search" name="sdetails" class="search-inp" placeholder="Search User Details"> </td>
                    <td align="center"><input type="submit" name="btn" class="search-btn" value="Search">
                    </td>
                </tr>
            </table>
        </form> -->
    <!-- </fieldset> -->
    <br>
    <br>

</body>

</html>

<?php

$qry = "SELECT `uName`, `uId`, `uPwd`, `uAadhar`, `uAddr`, `uMboNum`, `uIntAmt`, `uPic` FROM `openacc`";

$rs = mysqli_query($con, $qry);
echo "<table style=' align:center; border:'2px solid aqua'; cellspacing:0;'> ";

// echo(" <br> ");

echo "<th colspan = '8' align = 'center'> <h2>USER'S DETAIL <br> ";
echo (" <br> <br> ");
echo "<tr>";
echo "<td align = 'center'> NAME";
echo "<td align = 'center'> ID";
echo "<td align = 'center'> PASSWORD";
echo "<td align = 'center'> AADHAR";
echo "<td align = 'center'> ADDRESS";
echo "<td align = 'center'> MOBILE NUMBER";
echo "<td align = 'center'> BALANCE";
echo "<td align = 'center'> Photo</tr>";
while (($r = mysqli_fetch_array($rs))) {

    echo (" <br> <br> ");

    echo "<tr>";
    echo "<td align = 'center'> $r[0]";
    echo "<td align = 'center'> $r[1]";
    echo "<td align = 'center'> $r[2]";
    echo "<td align = 'center'> $r[3]";
    echo "<td align = 'center'> $r[4]";
    echo "<td align = 'center'> $r[5]";
    echo "<td align = 'center'> $r[6]";
    echo "<td align = 'center'> <img src='$r[7]' style='height:60px; width:60px; border-radius:50%;'>";
}
// echo(" <br> <br> <br> <br> ");

// Try Code


// session_abort();
?>