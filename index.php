<?php
$insert = false;
if(isset($_POST['name'])) {
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    //echo "Success connecting to the db";
    // Collect post variables

    $name = $_POST['name'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    //$area_name_str = "";
    $sql_test = "SELECT * FROM `area_codes` WHERE code = '424001'";
    $result = $con->query($sql_test);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> id: ". $row["city"];
    }
} else {
    echo "0 results";
}
    echo "Area name = ".$area_name_str;
    if($area_name_str == "")
    {
        echo '<script>alert("Pin Code not Found in DATABASE")</script>';
    }
    else{
    $sql = "INSERT INTO `pi`.`pi` (`name`, `city`, `address`, `pincode`, `age`, `gender`, `email`, `phone`, `dt`) VALUES ('$name', '$city', '$address', '$pincode', '$age', '$gender', '$email', '$phone', current_timestamp());";
    
    if($con->query($sql) == true){
        echo "Successfully inserted";}
    else{
        echo "ERROr: $sql <br> $con->error";

            $con->close();
        }
    }
    echo '<script>alert("You are add in : '.$area_name_str.'")</script>';
  }
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Information</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="personal information">
    <div class="container">
        <p>Enter your details and submit this form to confirm your participation. </p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
    ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="city" id="city" placeholder="Enter your city">
            <input type="text" name="address" id="address" placeholder="Enter your address">
            <input type="text" name="pincode" id="pincode" placeholder="Enter your pincode">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            
            <button class="btn">Submit</button> 
        </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>
