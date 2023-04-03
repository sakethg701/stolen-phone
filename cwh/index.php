<?php 
    $insert=false;
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server,$username,$password);

    if(!$con){
        die("connection to this database is failed due to ".mysqli_connect_error());

    }

    
    //echo "Success connecting to the db";
    $name = (isset($_POST['name']) ? $_POST['name'] : '');
    $phone = (isset($_POST['phone']) ? $_POST['phone'] : '');
    $email = (isset($_POST['email']) ? $_POST['email'] : '');
    $IMEI = (isset($_POST['IMEI']) ? $_POST['IMEI'] : '');
    $Address = (isset($_POST['Address']) ? $_POST['Address'] : '');
    if($IMEI!=''){
    $sql = "INSERT INTO `trip`.`trip` (`name`, `phone` , `email`, `IMEI`, `Address`, `dt`) VALUES ('$name', '$phone', '$email', '$IMEI', '$Address', current_timestamp());";
    //echo $sql;
    
    if($con->query($sql)==true){
        //  echo "Successfully inserted";
        $insert = true;
        
      }
      else{
          echo "ERROR : $sql <br> $con->error";
      }
    }
    


    mysqli_query($con,"DELETE FROM trip.trip WHERE IMEI=''");
    $con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHONE TRACKING SYSTEM</title>
    <script defer src="script.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img src= "bg.png" class="bg" alt="IMAGE NOT FOUND">
    <div class="container">
        <h1>ENTER THE FOLLOWING DETAILS IN CASE OF MISSING PHONE</h1>
        <?php
        if($insert==true){
            echo "<h2 class ='submitMsg'>Thanks For Submitting The Form</h2>";
        }

        ?>
        <br></br>
        <br></br>
        
        <form id="form" action = "index.php" method ="post">
            <input type = "text" name = "name" id = "name" placeholder="Enter Your Name" required>
            <input type = "text" name = "phone" id = "phone" placeholder="Enter Your Phone Number" required>
            <input type = "text" name = "email" id = "email" placeholder="Enter Your email" required>
            <input type = "text" name = "IMEI" id="IMEI" placeholder="Enter the IMEI of Missing Phone" required>
            <input type = "address" name="Address" id ="Address" placeholder="Enter your address" required>
            <button class ="btn">Submit</button>
        

        </form>

    </div>
    <!--INSERT INTO `trip` (`sno`, `name`, `email`, `IMEI`, `Address`, `dt`) VALUES ('1', 'TEST', 'test@gmail.com', '324567865432345', 'vizag', current_timestamp());-->


</body>
</html>