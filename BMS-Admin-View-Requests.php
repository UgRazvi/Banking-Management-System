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
    <title>BMS VIEW USER REQUEST</title>
    <link rel="stylesheet" href="BMS_General_Style.css">
    <link rel="shortcut icon" href="../BMS/image/Bank1.png" type="image/x-icon">
    <!-- <style>
        .tab{
            border-spacing: 0;
            width: 70%;
            
        }
        table tr td{
            padding: 12px;
        }
       </style>  -->
</head>

<body>

<nav  >  <!-- style="float: right;" -->
                <?php
                echo "Username : $name$id";

                // echo "<script> alert('$name') </script>";
                // echo "<script> alert($id) </script>";
                ?>
            </nav>

</body>

</html>

<?php

$s = "select * from bms_request";

$rs = mysqli_query($con, $s);

echo "<fieldset >
<legend >
<h2>VIEW REQUESTS</h2>
</legend>";
echo "<table align='center' bgcolor='aquamarine' class='tab'>";

// echo "<th colspan=9 align=center><h2> ALL REQUESTS ";
echo " <br> <br> <br> <tr>";
echo "<td align=center> USER NAME";
echo "<td align=center> USER ID";
echo "<td align=center> Request ID";
echo "<td align=center> REQUEST";
echo "<td align=center> REQUEST DATE";
echo "<td align=center> REQUEST TIME";
echo "<td align=center colspan=3>Request Status";

// print("<br> <hr> <br>");

while ($r = mysqli_fetch_array($rs)) {
    echo " <tr>";
    echo "<td align=center>$r[0]";
    echo "<td align=center>$r[1]";
    echo "<td align=center>$r[2]";
    echo "<td align=center>$r[3]";
    echo "<td align=center>$r[4]";
    echo "<td align=center>$r[5]";
    if($r[6] != ''){

        echo "<td align=center>$r[6]";
        
    }
    else{
        echo "<td align=center><a href='BMS-Admin-ViewReq.php?t1=$r[0]&t2=$r[1]&t3=$r[2]&t4=$r[3]&t5=$r[4]&t6=$r[5]&t7=$r[6]'><button name='pending' >Pending </button></a>";
        // echo "<td align=center><a href=''><button name='deny' >Deny </button></a>";
        // echo "<td align=center><a href=''><button name='pending' >Pending </button></a>";

    }
}
?>