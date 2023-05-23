<?php
// include("../BMS/Temp-cnct-lgn/BMS_Connect.php");
include("BMS_Connect.php");

date_default_timezone_set("Indian/Reunion");

session_start();
$name = $_SESSION['aname'];
$id = $_SESSION['aid'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMS ADMIN VIEW STATEMENT</title>
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
            <h1> VIEW - STATEMENT </h1>
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
        <!-- </fieldset> -->
</body>

</html>

<?php


// After Click Event (Main Working) Logic
if (isset($_POST["btn"])) {

    $uAcc = $_POST["uAcc"];

    // Query Sending Logic
    // $qry = "SELECT * FROM `utrans` WHERE sAcc='$uname' OR rAcc='$uname'";

    $qry = "SELECT * FROM `openacc` WHERE uId='$uAcc'";
    
    $rs = mysqli_query($con, $qry);
    $r = mysqli_num_rows($rs);
    
    // echo ("<br> Query : $qry");
    // echo (" <br> Rows Fetched : $r");

    if($r != 0){
        echo "<table style=' vertical-align:middle; border:'2px solid aqua'; cellspacing:0;'> ";

        // echo(" <br> ");
    
        echo "<th colspan = '6' align = 'center'> <h2>USER'S DETAIL <br> ";
        echo (" <br> <br> ");
        echo "<tr>";
        echo "<td align = 'center'> USER NAME";
        echo "<td align = 'center'> USER ID";
        echo "<td align = 'center'> USER AADHAR";
        echo "<td align = 'center'> MOBILE NO.";
        echo "<td align = 'center'> AMOUNT";
        echo "<td align = 'center'> PROFILE PIC</tr>";
        while (($r = mysqli_fetch_array($rs))) {
    
            echo (" <br> <br> ");
    
            echo "<tr>";
            echo "<td align = 'center'> $r[0]";
            echo "<td align = 'center'> $r[1]";
            echo "<td align = 'center'> $r[3]";
            echo "<td align = 'center'> $r[5]";
            echo "<td align = 'center'> $r[6]";
            echo "<td align = 'center'> <img src='$r[7]' style='height:60px; width:60px; border-radius:50%;'>";
        }
    }else{
        echo "<script>alert('PLEASE ENTER A VALID ACCOUNT NUMBER')</script>";
    }

}

// session_abort();
?>