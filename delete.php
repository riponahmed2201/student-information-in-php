<?php
session_start();

 include'dbConnection.php';

    $roll = $_GET['roll'];

    $deleteQuery = "DELETE FROM `students` WHERE roll = $roll"; 

     mysqli_query($conn,$deleteQuery);
    // var_dump($test);
    // exit;

    if($deleteQuery==true)
    {
        // $_SESSION['message'] = "Student information successfully deleted.";
        header('location:index.php');
    }
    else
    {
        // $_SESSION['message'] = "Something Error Found, Please try again.";
        header('location:index.php');
    }
    

?>