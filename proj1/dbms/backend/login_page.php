
<?php

include("./connectdb.php");
session_start();
if(isset($_POST['email'])){
  print_r($_POST);
  $email = $_POST['email'];
  $password = $_POST['password'];

  $getData=$conn->prepare("SELECT * FROM `users`");
  $getData->execute();
  $users=$getData->fetchAll();
   $valid = 0;
  foreach($users as $user){
      if($user['email'] == $email && $user['password'] == $password){
        $valid = 1;
        header("Location: page2.php"); 
      }
  }
  if($valid==0){
    echo '<script>alert("Wrong Login Credentials!!")</script>'; 
  }
  

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>

    body{
        background-image: url(https://images.static-collegedunia.com/public/college_data/images/campusimage/1491995331c2.jpg);
        background-repeat: no-repeat;
        background-size: cover;

    }

    .login-box {
    width: 300px;
    margin: auto;
    padding: 20px;
    background-color: rgba(255, 255, 255, 0.8);
    border-radius: 10px;
    text-align: center;
}

.input-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
input[type="password"] {
    width: 90%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

h1{
    text-align: center;
}

.button-container {
    display: flex;
    
}

.button {
    margin-right: 10px; 
}

.login-button{
    margin: 10px;
}
.button1{
    background-color: green;
    margin : 10px;
}
.button2{
    background-color: red;
    margin : 10px;
}


</style>



<body>

    <div class="first-div">
        
        
            <img src="https://upload.wikimedia.org/wikipedia/en/thumb/5/52/Indian_Institute_of_Technology%2C_Patna.svg/330px-Indian_Institute_of_Technology%2C_Patna.svg.png" style="padding-top: 5px; height: 120px; float: left;">

            <h1>INDIAN INSTITUTE OF TECHNOLOGY PATNA</h1>
            <h1>भारतीय प्रौद्योगिकी संस्थान पटना</h1>

            <div class="login-box">
                <h2>LOGIN HERE</h2>
                <!-- <form class="modal-content1" action="http://localhost:3000/page-1"> -->
                    <div class="input-group">
                        <label for="login-id"></label>
                        <input type="text" id="login-id" name="login-id" placeholder="Enter your login ID">
                    </div>
                    <div class="input-group">
                        <label for="password"></label>
                        <input type="password" id="password" name="password" placeholder="Enter your password">
                    </div>
                    <a href="./page-1.html" > 
                      <button class="login-button" type="submit">Login</button>  </a>
                    
                    <div class="button-container">
                        <a href="./create_account.html">
                        <button class="button1">Sign up</button> </a>
                        <button class="button2">Forget Password</button>
                    </div>
                    
                <!-- </form> -->
            </div>
            



        


    </div>
    
</body>
</html>
