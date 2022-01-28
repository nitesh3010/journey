<?php
$insert = false;
if(isset($_POST['name'])){
 $server = "localhost";
 $username = "root";
 $password = "";
// function....mysqli_connect();
 $con = mysqli_connect($server , $username , $password);
 if(!$con){
     // function ....mysqli_connect_error();
     die("connection to this database failed due to" .mysqli_connect_error());
 } 
    //  echo "success connecting to the database";
 

    $name=$_POST['name'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $desc=$_POST['desc'];


    $sql = "INSERT INTO `journey`.`journey` (`name`, `age`, `gender`, `email`, `phone`, `desc`, `dt`) 
    VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', 
    current_timestamp());";

    if($con->query($sql) == true){
        $insert = true;
    }
    else {
        echo "ERROR: $sql <br> $con->error";
    }
     $con->close();
}
?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome to travel form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.png" alt="Welcome to Antarctica" srcset="">
    <div class="container">
        <h1><em>Journey to Antarctica Trip form.</em> </h1>
        <p>Enter your details to confirm your participation in the trip.</p>
       <?php
       if($insert == true){
        echo "<p class='submitmsg'>Thankyou for submitting your form, We are happy to see you joining us for the Antarctica trip. </p>";
       }
        ?>
        <form action="index.php" method="post">
            <br>
            <label for="fname">Full Name: </label>
            <input type="text" name="name" id="name" placeholder="Enter your full name" ><br>
            <label for="age">Age: </label>
            <input type="text" name="age" id="age" placeholder="Enter your age"><br>
            <label for="gender">Gender: </label>
            <input type="gender" name="gender" id="gender" placeholder="Enter your gender"><br>
            <label for="email">Email: </label>
            <input type="email" name="email" id="email" placeholder="Enter your email"><br>
            <label for="phone">Phone: </label>
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number"><br>
            <label for="textarea">Textarea: </label>
            <textarea name="desc" id="desc" rows="10" cols="30" placeholder="Enter any othet information"></textarea><br>
           <div id="center">
            <button class="btn">Submit</button>
          </div>
        </form>
    </div>
    <script src="index.js"></script>
   
</body>
</html>