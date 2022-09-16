<?php
$insert = false;
if (isset($_POST['rollNo'])) {
    $server = "localhost";
    $username = "root";
    $password = "";


    $con = mysqli_connect($server, $username, $password);
//checking for successful connection
    if (!$con) {
        die("connection to the database fail due to " . mysqli_connect_error());
    }
    // echo "Successfully Connected to the DataBase.";


    $rollNo = $_POST['rollNo'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sem = $_POST['sem'];
    $pno = $_POST['pno'];

    $sql = "INSERT INTO `student_info`.`info` (`rollNo`, `name`, `email`, `sem`, `pno`, `date`) VALUES ('$rollNo', '$name', '$email', '$sem', '$pno', current_timestamp());";
    // echo $sql;

    if ($con->query($sql) == true) {
        $insert = true;
    } else {
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome To NSUT</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet" />
</head>

<body>
    <img src="bg.jfif" alt="nsut" class="bg" />
    <div class="container">
        <h1>Welcome To Netaji Shubhas University Of Technology</h1>
        <br />

        <?php

        if ($insert == true) {
            echo "<p class='submitmsg'> Thanking for entering the data! </p> ";
        } else {
            echo "<p>Enter your information</p>";
        }
        ?>
        <br /><br />
        <form action="index.php" method="post" name="myform" onsubmit="return validateForm()">
            <input type="text" name="rollNo" id="rollNo" placeholder="Enter your RollNo" required/><b><span id="r" class="text-danger font-weight-bold"></span></b>

            <input type="text" name="name" id="name" placeholder="Enter your Name" required/><b><span id="n" class="text-danger font-weight-bold"></span></b>

            <input type="email" name="email" id="email" placeholder="Enter your Emai" required/><b><span id="e" class="text-danger font-weight-bold"></span></b>

            <input type="number" name="sem" id="sem" placeholder="Enter your Semester" required  /><b><span id="s" class="text-danger font-weight-bold"></span></b>

            <input type="phone" name="pno" id="pno" placeholder="+91" required/><br /><b><span id="p" class="text-danger font-weight-bold"></span></b>
            <div class="b">
                <input type="submit" class="btn" name="submit" value="Submit">
                <input type="reset" class="btn"  value="Reset">
            </div>
        </form>
    </div>

    <script src="index.js"></script>

</body>

</html>