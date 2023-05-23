<?php
include "BMS_connect.php";

session_start();
$name = $_SESSION['uname'];
$id = $_SESSION['uid'];
?>

<!DOCTYPE html>
<html lang="en">

</html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMS USER PROFILE</title>
    <link rel="shortcut icon" href="./BMS/image/Bank1.png" type="image/x-icon">
    <link rel="stylesheet" href="BMS_General_Style.css">
</head>

<body>
    <!-- <h2 align="center">ALL STUDENTS DETAIL -->
    <nav>
        <?php
        echo "Username : ";
        echo $name, "-", $id;
        ?>
    </nav>

    <!-- <fieldset style="  max-width: fit-content; ">
        <legend>USER PROFILE</legend>
        <form action="BMS-User-My-Profile.php" method="post" enctype="multipart/form-data">
            <table align="center" class="header_table">
                <tr>
                    <td><input type="text" name="name" class="input-box" placeholder="Enter User Name" required>
                    </td>

                    <td><input type="submit" name="p-btn" class="btn" value="VIEW PROFILE">
                        <br><br>
                    </td>
                </tr>
            </table>
        </form>
    </fieldset> -->
    
</body>

</html>

<?php
// echo(" <br> <br> <br> <br> ");


// if (isset($_POST["p-btn"])) {

    $qry = "SELECT * FROM `openacc` WHERE uName='$name'";
    $rs = mysqli_query($con, $qry);
    $r = mysqli_num_rows($rs);

    // echo " <br> Your Query : ", $qry;
    // echo " <br> Number of Rows : ", $r;


    echo "<table style=' align:center; border:'2px solid aqua'; cellspacing:0;'> ";

    // echo(" <br> ");

    echo "<th colspan = '8' align = 'center'> <h2> YOUR PROFILE <br> ";
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


// }

// Try Code
// session_abort();
?>