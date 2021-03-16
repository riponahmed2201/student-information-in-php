
<?php

session_start();

include'dbConnection.php';

    if(isset($_POST['done'])){
        $fullName = $_POST['fullName'];
        $username = $_POST['username'];
        $roll = $_POST['roll'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phoneNumber'];
        $address = $_POST['address'];
        
        $insertQuery = "INSERT INTO `students`( `fullName`, `username`,`roll`, `email`,`phoneNumber`, `address`)
            VALUES ('$fullName',' $username','$roll',' $email', '$phoneNumber',' $address')";

        $query = mysqli_query($conn,$insertQuery);

        if($insertQuery==true)
        {
            $_SESSION['message'] = "Student information successfully saved.";
        }
        else
        {
            $_SESSION['message'] = "Something Error Found, Please try again.";
        }
       
    }
?>



<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Student Information </title>
    <link rel="stylesheet" href="style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">
        Add Student Information
        <a href="index.php" class="all-table-data" style="float-right; margin-left:180px; text-decoration:none; color:black">All Student</a>
    </div>
    <div class="content">
    <?php
        if (isset($_SESSION['message'])){
            echo "<div id='error_msg' style='color:green; text-align:center'>".$_SESSION['message']."</div>";
            unset($_SESSION['message']);
        }
    ?>

      <form method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" name="fullName" required placeholder="Enter full name" required>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="username" required placeholder="Enter username" required>
          </div>


          <div class="input-box">
            <span class="details">Roll</span>
            <input type="number" name="roll" required placeholder="Enter roll" required>
          </div>

          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name="email" placeholder="Enter email" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="number" name="phoneNumber" required placeholder="Enter number" required>
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" name="address" required placeholder="Enter address" required>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="done" value="Submit">
        </div>
      </form>
    </div>
  </div>

</body>
</html>