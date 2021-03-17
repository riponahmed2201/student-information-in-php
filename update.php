
<?php

session_start();

include'dbConnection.php';

    $id = $_GET['id'];
    $singleQuery = "SELECT * FROM `students` WHERE id=$id";
    $query = mysqli_query($conn,$singleQuery);

    $resultData = mysqli_fetch_array($query);

    // echo '<pre>';
    // var_dump($resultData);
    // exit;


    if(isset($_POST['done'])){

        $id = $_GET['id'];

        $fullName = $_POST['fullName'];
        $username = $_POST['username'];
        $roll = $_POST['roll'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phoneNumber'];
        $address = $_POST['address'];

        $updateQuery = "UPDATE `students` SET id=$id, fullName='$fullName', username= '$username', roll='$roll',email='$email', phoneNumber='$phoneNumber', address='$address' WHERE id=$id";
        $query = mysqli_query($conn,$updateQuery);

        if($updateQuery==true)
        {
            $_SESSION['message'] = "Student information successfully updated.";
            header('location:update.php');
        }
        else
        {
            $_SESSION['message'] = "Something Error Found, Please try again.";
            header('location:update.php');
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

     <style>
     #edit-student-button{
        background-color: green; /* Green */
        border: none;
        color: white;
        padding: 12px 25px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin-left:180px;
        text-decoration:none; 
        float:right;
      }

     </style>
   </head>
<body>
  <div class="container">
    <div class="title">
        Edit Student Information
        <a href="index.php" class="all-table-data" id="edit-student-button">All Student</a>
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
            <input type="text" name="fullName" value=" <?php echo $resultData['fullName']; ?> " required placeholder="Enter full name" required>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="username" value=" <?php echo $resultData['fullName']; ?> " required placeholder="Enter username" required>
          </div>


          <div class="input-box">
            <span class="details">Roll</span>
            <input type="text" name="roll"  value=" <?php echo $resultData['roll']; ?> " required placeholder="Enter roll" required>
          </div>

          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name="email" value=" <?php echo $resultData['email']; ?> " placeholder="Enter email" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="phoneNumber" value=" <?php echo $resultData['phoneNumber']; ?> " required placeholder="Enter number" required>
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" name="address" value=" <?php echo $resultData['address']; ?> " required placeholder="Enter address" required>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="done" value="Update">
        </div>
      </form>
    </div>
  </div>

</body>
</html>