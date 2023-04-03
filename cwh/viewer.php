<?php 
    $insert='';
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server,$username,$password);

    if(!$con){
        die("connection to this database is failed due to ".mysqli_connect_error());

    }
    mysqli_query($con,"DELETE FROM trip.trip WHERE IMEI=''");
    
    $IMEI = (isset($_POST['IMEI']) ? $_POST['IMEI'] : '');
    $phone = (isset($_POST['phone']) ? $_POST['phone'] : '');
    $Address = (isset($_POST['Address']) ? $_POST['Address'] : '');
    if($IMEI!=''){

    $query = mysqli_query($con, "SELECT * FROM trip.trip WHERE IMEI='".$IMEI."'");

    if (!$query)
    {
        die('Error: ' . mysqli_error($con));
    }


if(mysqli_num_rows($query) > 0){


      $insert = "true";
    }    

else{

    $insert="flase";

}
    }

$con->close();




    ?>










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHONE TRACKING SYSTEM</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img src= "bg.png" class="bg" alt="IMAGE NOT FOUND">
    <div class="container">
        <h1>ENTER THE IMEI TO VERIFY WHETHER IT IS STOLEN PHONE</h1>

<?php
if($insert=="true"){
    echo "<h3 class ='submitMsg'>DON'T BUY THE PHONE, IT IS STOLEN ONE!!! </h3>";
}
if($insert=="flase"){
    echo "<h2 class='submitMsg'>YOU CAN SAFELY BUY THE PHONE!!! </h2>";

}

?>

        

        <br></br>
        <br></br>
        
        <form action = "viewer.php" method ="post">
        
            
            <input type = "text" name = "IMEI" id="IMEI" placeholder="Enter the IMEI of Buying Phone" required>
            <input type = "text" name = "phone" id = "phone" placeholder="Enter Your Phone Number" required>
            <input type = "address" name="Address" id ="Address" placeholder="Enter your address" required>
           
            <button class ="btn">Submit</button>
        

        </form>

    </div>
    <!--INSERT INTO `trip` (`sno`, `name`, `email`, `IMEI`, `Address`, `dt`) VALUES ('1', 'TEST', 'test@gmail.com', '324567865432345', 'vizag', current_timestamp());-->


</body>
</html>