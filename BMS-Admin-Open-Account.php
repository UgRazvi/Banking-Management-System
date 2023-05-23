<?php

// Maintain Connection Logic
// include("../BMS/Temp-cnct-lgn/BMS_Connect.php");
include("BMS_Connect.php");


session_start();
$name = $_SESSION['aname'];
$id = $_SESSION['aid'];

// Query String
$qry = "SELECT uId from openacc order by uId desc";

// Automatic Id generation Logic
$rs = mysqli_query($con, $qry);
$t = mysqli_num_rows($rs);
$r = mysqli_fetch_array($rs);
if ($t == 0) {
    $uId = '1001';
} else {
    $uId = $r[0] + 1;
}

// Source And Destination For Image Logic
$src = "";
$dst = "";

// After Click Event (Main Working) Logic
if (isset($_POST["btn"])) {

    $uname = $_POST["uname"];
    $uid = $_POST["uid"];
    $upwd = $_POST["upwd"];
    $uaadhar = $_POST["uaadhar"];
    $uaddr = $_POST["uaddr"];
    $umonum = $_POST["umonum"];
    $uamt = $_POST["uamt"];

    // Image Uploading logic
    $src = $_FILES["photo"]["tmp_name"];
    $dst = './image/' . $_FILES["photo"]["name"];
    if (move_uploaded_file($src, $dst)) {
        echo "<script>alert('Upload Successfully')</script>";
    } else {
        echo "Uploading Error";
    }

    // Query Sending Logic
    $qry = "INSERT INTO `openacc`(`uName`, `uId`, `uPwd`, `uAadhar`, `uAddr`, `uMboNum`, `uIntAmt`, `uPic`) VALUES ('$uname','$uid','$upwd','$uaadhar','$uaddr','$umonum',' $uamt','$dst')";
    // echo $qry;
    
    $qry2 = "INSERT INTO `balance_sheet`(`uName`, `aReceive`, `aTotal`) VALUES ('$uname',' $uamt',' $uamt')";
    // echo $qry2;

    mysqli_query($con, $qry);
    mysqli_query($con, $qry2);
    mysqli_close($con);
    echo "<script>alert('ACCOUNT OPENED SUCCESSFULLY')</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMS ADMIN OPEN ACCOUNT</title>
    <link rel="shortcut icon" href="../BMS/image/Bank1.png" type="image/x-icon">
    <link rel="stylesheet" href="BMS_General_Style.css">
</head>

<body>
<nav  >  <!-- style="float: right;" -->
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
            <h1>OPEN NEW ACCOUNT</h1>
        </legend>
        <br>
        <form method="post" action="BMS-Admin-Open-Account.php" enctype="multipart/form-data">
            <table align="center" bgcolor="aquamarine" border="1">
            
                <tr>
                    <td> <br> NAME </td>
                    <td> <br> <input type="text" name="uname" class="inp" placeholder="Enter User Name"></td>
                </tr>
                <tr>
                    <td> <br> ID </td>
                    <td> <br> <input type="text" name="uid" class="inp" value='<?php echo $uId; ?>' readonly></td>
                </tr>
                <tr>
                    <td> <br> PASSWORD </td>
                    <td> <br> <input type="text" name="upwd" class="inp" placeholder="Enter User Password"></td>
                </tr>
                <tr>
                    <td> <br> AADHAR </td>
                    <td> <br> <input type="text" name="uaadhar" class="inp" placeholder="Enter Aadhrar Details"></td>
                </tr>
                <tr>
                    <td> <br> ADDRESS </td>
                    <td> <br> <input type="text" name="uaddr" class="inp" placeholder="Enter Address Details"></td>
                </tr>
                <tr>
                    <td> <br> MOBILE NUMBER </td>
                    <td> <br> <input type="text" name="umonum" class="inp" placeholder="Enter User Mobile Number"></td>
                </tr>
                <tr>
                    <td> <br> INITIAL AMOUNT </td>
                    <td> <br> <input type="number" name="uamt" class="inp" placeholder="Enter Initial Amount"></td>
                </tr>

                <tr>
                    <td> <br> UPLOAD PHOTO </td>
                    <td> <br> <input type="file" name="photo" class="inp" class="pic-inp"><br><br></td>

                </tr>


                <tr>

                    <td colspan="2" align="center"><input type="submit" name="btn" class="btn" value="REGISTER STUDENT">
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