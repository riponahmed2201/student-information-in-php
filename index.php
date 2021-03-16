
<!DOCTYPE html>
<html>
<head>
    <title>All Student Information</title>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
.add-button{
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 12px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin-left:10%;
  margin-top:20px;
}

#delete-button{
  background-color: #FF0000; /* Green */
  border: none;
  color: white;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}

#edit-button{
  background-color: green; /* Green */
  border: none;
  color: white;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
</style>
</head>
<body>

<div>
    <a class="add-button" href="add_student.php">Add Student</a>
</div>
    <div style="width:80%; margin-left:10%; margin-top:2%">
    <?php
        if (isset($_SESSION['message'])){
            echo "<div id='error_msg' style='color:green; text-align:center'>".$_SESSION['message']."</div>";
            unset($_SESSION['message']);
        }
    ?>
    
    <table id="customers">
  <tr>
    <th>#</th>
    <th>Full Name</th>
    <th>Username</th>
    <th>Roll</th>
    <th>Email</th>
    <th>Phone Number</th>
    <th>Address</th>
    <th>Action</th>
  </tr>
        <?php

        include'dbConnection.php';

        $allDataQuery = "SELECT * FROM `students`";
        $query = mysqli_query($conn,$allDataQuery);
        $i =1;
        while($result = mysqli_fetch_array($query)){
            
        ?>      
        <tr class="text-center">
        <td> <?php echo $i++; ?> </td>
        <td> <?php echo $result['fullName']; ?> </td>
        <td> <?php echo $result['username']; ?> </td>
        <td> <?php echo $result['roll']; ?> </td>
        <td> <?php echo $result['email']; ?> </td>
        <td> <?php echo $result['phoneNumber']; ?> </td>
        <td> <?php echo $result['address']; ?> </td>
        <td> 
            <a id="delete-button" href="delete.php?id=<?php echo $result['id'];?>" class="text-white"> Delete </a>
            <a id="edit-button" href="update.php?id=<?php echo $result['id'];?>">Edit</a> 
        </td>
        </tr>

    <?php
        }
    ?>
</table>
    </div>

</body>
</html>
