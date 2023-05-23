<?php
include "BMS_connect.php";


if (isset($_POST["btn"])) {

    $name = $_POST["name"];
    $id = $_POST["id"];
    $pswd = $_POST["pwd"];

    $qry = "SELECT * FROM bms_admin WHERE aId='$id' AND aPwd='$pswd'"; // aName='$name' and
    // echo "<br>Your Query (Admin) : ", $qry;

    $rs = mysqli_query($con, $qry);
    $t = mysqli_num_rows($rs);

    // echo "<br>Number Of Rows Matched (Admin) : ". $t;

    if ($t != 0) {

        session_start(); //Session Starts
        $_SESSION["aname"] = $name; //Storing value of "$name" (Admin Name) in Session Variable "$_SESSION['unname']"
        $_SESSION["aid"] = $id; //Storing value of "$id" (Admin Id) in Session Variable "$_SESSION['uid']"

        // echo "<br>name".$_SESSION["aname"];
        // echo "<br>uid".$_SESSION["aid"];

      header("location:BMS-Admin-home.php");
    } else {

        
        $qry = "SELECT * FROM openacc WHERE uId='$id' AND uPwd='$pswd'";
        // echo "<br>Your Query (User) : ", $qry;

        $rs = mysqli_query($con, $qry);
        $t = mysqli_num_rows($rs);

        // echo "<br> Number Of Rows Matched (User) : ", $t;

        if ($t != 0) {
            session_start(); //Session Starts
        $_SESSION['uname'] = $name; //Storing value of "$name" (User Name) in Session Variable "$_SESSION['unname']"
        $_SESSION['uid'] = $id; //Storing value of "$id" (User Id) in Session Variable "$_SESSION['uid']"

        
        // echo "<br> User Name  : ", $_SESSION["uname"];
        // echo "<br> User Id : ", $_SESSION["uid"];
        
            header("location:BMS-User-home.php");
        } else {
            echo "<script>alert('No Record Found')</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMS Login Form</title>
    <link rel="stylesheet" href="BMS_style.css">
    <!-- <link rel="stylesheet" href="../BMS/CSS/BMS_style.css"> -->
    <!-- <link rel="icon" type="image/x-icon" href="/BMS/IMAGES/LAPTOP.png"> -->
    <link rel="shortcut icon" href="../BMS/image/LAPTOP.png" type="image/x-icon">
</head>

<body>
    <br>
    <br>
    <div align="center" class="outer-box">
        <fieldset style="max-width:30%;">
            <legend>
                <h2 class="leg">BMS</h2>
            </legend>
            <div class="box">
                <div class="container">
                    <h1>LOGIN</h1>
                    <div class="card">
                        <div class="inner-box">
                            <form method="POST">
                                <input type="text" name="name" class="input-box" placeholder="Enter User Name" required>
                                <input type="text" name="id" class="input-box" placeholder="Enter User ID" required>
                                <input type="password" name="pwd" class="input-box" placeholder="Enter Passwod"
                                    required>
                                <!-- <br> -->
                                <input type="submit" name="btn" class="submit-btn" style="border-color: aqua;">

                                <input type="checkbox" class="ch-box" value="Remember Me">

                                <a href="" style="padding-left:25px;">Forgot Password</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
        </fieldset>
    </div>

</body>

</html>

<?php
// session_abort();
?>