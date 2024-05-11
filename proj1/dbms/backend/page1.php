<?php
  include("./connectdb.php");
  session_start();

  if(isset($_POST['email'])){
    print_r($_POST);
    $doa = $_POST['doa'];
    $ref_num = $_POST['ref_num'];
    $post = $_POST['post'];
    $dept = $_POST['dept'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $nationality = $_POST['nationality'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $mstatus = $_POST['mstatus'];
    $id_proof = $_POST['id_proof'];
    $father_name = $_POST['father_name'];
    $cadd = $_POST['cadd'];
    $cadd1 = $_POST['cadd1'];
    $cadd2 = $_POST['cadd2'];
    $cadd3 = $_POST['cadd3'];
    $cadd4 = $_POST['cadd4'];
    $padd = $_POST['padd'];
    $padd1 = $_POST['padd1'];
    $padd2 = $_POST['padd2'];
    $padd3 = $_POST['padd3'];
    $padd4 = $_POST['padd4'];
    $mobile = $_POST['mobile'];
    $mobile_2 = $_POST['mobile_2'];
    $email = $_POST['email'];
    $email_2 = $_POST['email_2'];
    $landline= $_POST['landline'];

    $email = $_SESSION['email'];

    $insertUser = $conn->prepare(" INSERT INTO `page2` (`doa`,`ref_num`,`post`,`dept`,`fname`,`mname`,`lname`,`nationality`,`dob`,`gender`,`mstatus`,`id_proof`,`father_name`,`cadd`,`cadd1`,`cadd2`,`cadd3`,`cadd4`,`padd`,`padd1`,`padd2`,`padd3`,`padd4`,`mobile`,`mobile_2`,`email`,`email_2`,`landline`) 
    VALUES ('$doa','$ref_num','$post','$dept','$fname','$mname','$lname','$nationality','$dob','$gender','$mstatus','$id_proof','$father_name','$cadd','$cadd1','$cadd2','$cadd3','$cadd4','$padd','$padd1','$padd2','$padd3','$padd4','$mobile','$mobile_2','$email','$email_2','$landline')

    ");

    $insertUser->execute();
    
    if($insertUser){
      echo "Done";
    }
    else{
      echo "Not done";
    }


  }
  if(isset($_POST['submit'])){
    header("Location: page3.php");
    
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
        background-image: url(https://cache.careers360.mobi/media/article_images/2022/9/29/iit-patna-featured-image.jpg);
        background-repeat: no-repeat;
        background-size: cover;

    }

    h1{
        text-align: center;
    }

    .first-row{
       
        padding: 3px;
        display: flex;
        justify-content: flex-end;
    }
    .button1{
        margin:5px;
        float: right;
    }
    .button2{
        margin:5px;
        float: right;
    }

    .Row1{
        width: 90%;
        margin: auto;
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
        text-align: center;
        padding:20px;
    }

    .grid-container1 {
    display: grid;
    
    grid-gap: 10px;
    }

    .grid-row1 {
        display: flex;
    }

    .grid-item1 {
        flex: 1;
        margin-right: 10px;
    }

    .grid-item-full1 {
        justify-content: left;
        flex: 2;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"] {
        width: 50%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    input[type="date"] {
    width: 50%; 
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    color: #333;
}


input[type="date"]:focus {
    border-color: #007bff; 
    outline: none; 
}


#dropdown {
    width: 52%; 
    padding: 8px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
    color: #978888;
}


#dropdown::after {
    content: '\25BC'; 
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    pointer-events: none; 
}


#dropdown option {
    background-color: #fff;
    color: #333;
}


#dropdown:focus,
#dropdown:hover {
    border-color: #007bff; 
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); 
    outline: none; 
}

.dotted-line {
    border-bottom: 1px dotted #000; 
    width: 100%;
}

.grid-container {
    display: grid;
 
    grid-gap: 15px;
}

.grid-row {
    display: flex;
}

.grid-item {
    flex: 1;
    margin-right: 10px;
}


label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"] {
    width: 50%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.upload-label {
    display: inline-block;
    margin-bottom: 5px;
    color: #333;
}

.upload-input {
    
    background-color: #f0f0f0;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    cursor: pointer;
}

.upload-input:hover {
    background-color: #e0e0e0;
}

.address-label {
    margin-bottom: 5px;
    color: #333;
}

.address-input {
  
    width: 50%;
    height: 100px;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

.address-input:focus {
    border-color: #007bff;
    outline: none;
}

.save{
    background-color: orange;
    border-width: 0px;
    height: 40px;
    margin-top: 50px;
    margin-right: 50px;
    margin-bottom: 50px;
    float: right;
}
.save:hover{
    background-color: rgb(228, 185, 103);
}
</style>


<body>

    <div>

        <img src="https://upload.wikimedia.org/wikipedia/en/thumb/5/52/Indian_Institute_of_Technology%2C_Patna.svg/330px-Indian_Institute_of_Technology%2C_Patna.svg.png" style="padding-top: 5px; height: 120px; float: left;">

        <h1 style="font-size: 50px; color: white;" >INDIAN INSTITUTE OF TECHNOLOGY PATNA</h1>
        <h1 style="font-size: 50px; color: white;">भारतीय प्रौद्योगिकी संस्थान पटना</h1>

       <!-- <form action="http://localhost:3000/" method="POST"> -->
        <div class="Row1">
            
            <div class="first-row">
                
                <a href="./login_page.html">
                    <button class="button1">Logout</button> </a>
                <button class="button2">Change Password</button>
                
            </div>
            
            <p style="text-align: left;">Welcome : </p>
            
            <div class="grid-container1">
                <div class="grid-row1">
                    <div class="grid-item1">
                        
                        <input type="text" id="input1" name="input1" placeholder="Advertisement Number *">
                    </div>
                    <div class="grid-item2">
                   
                        <select id="dropdown" name="input2">
                            <option value="option1">Department</option>
                            <option value="option2">Computer Science Dept</option>
                            <option value="option3">Electrical Dept</option>
                            <option value="option1">Mechanical Dept</option>
                            <option value="option2">Chemical Dept</option>
                            <option value="option1">Civil Dept</option>
                            <option value="option2">Metallurgy Dept</option>
                           
                        </select>

                    </div>
                </div>
                <div class="grid-row2">
                    <div class="grid-item1">
                   
                        <input type="text" id="input3" name="input3" placeholder="Application Number *">
                    </div>
                    <div class="grid-item1">
                     
                        <select id="dropdown" name="input4">
                            <option value="option1">Post Applied for</option>
                            <option value="option2">Professor</option>
                            <option value="option3">Associate Professor</option>
                            <option value="option4">Assistant Professor Grade 1</option>
                            <option value="option5">Assistant Professor Grade 2</option>
                           
                        </select>
                       
                    </div>
                </div>
                
            </div>
        </div>

        <div class="dotted-line"></div>



        <div class="Row1">

            <div>
                <p style="text-align: left; font-size: large;">Personal details: </p>
            </div>

            <div class="grid-container">
                <div class="grid-row">
                    <div class="grid-item">
                    
                        <input type="text" id="input1" name="input1" placeholder="First Name">
                    </div>
                    <div class="grid-item">
                       
                        <input type="text" id="input2" name="input5" placeholder="Middle Name">
                    </div>
                </div>
                <div class="grid-row">
                    <div class="grid-item">
                   
                        <input type="text" id="input3" name="input3" placeholder="Last Name">
                    </div>
                    <div class="grid-item">
                    
                        <select id="dropdown" name="input6">
                            <option value="option1">Nationality</option>
                            <option value="option2">Indian</option>
                            <option value="option3">American</option>
                            <option value="option4">Chinese</option>
                            <option value="option5">Russian</option>
                           
                        </select>
                    </div>
                </div>
                <div class="grid-row3">
                    <div class="grid-item">
                      
                        <select id="dropdown" name="input7">
                            <option value="option1">Gender</option>
                            <option value="option2">Male</option>
                            <option value="option3">Female</option>
                            <option value="option4">Other</option>
                        </select>

                    </div>
                    <div class="grid-item">
                  
                        <input type="date" id="date" name="date">
                    </div>
                </div>
                <div class="grid-row4">
                    <div class="grid-item">
                   
                        <select id="dropdown" name="input8">
                            <option value="option1">ID Proof</option>
                            <option value="option2">Aadhar card</option>
                            <option value="option3">PAN-CARD</option>
                            <option value="option4">Driving License</option>
                            <option value="option5">Passoport</option>
                        </select>
                    </div>
                    <div class="grid-item">
                     
                        <input type="text" id="input4" name="input4" placeholder="Father's name">
                    </div>
                </div>
                <div class="grid-row5">
                    <div class="grid-item">
                      
                        <select id="dropdown" name="input9">
                            <option value="option1">Marital Status</option>
                            <option value="option2">Married</option>
                            <option value="option3">Un-married</option>
                        </select>

                    </div>
                    <div class="grid-item">
                        
                       <select id="dropdown" name="">
                            <option value="option1">Category</option>
                            <option value="option2">UR</option>
                            <option value="option3">PR</option>
                        </select>
                    </div>
                </div>

                <div class="grid-row">
                    <div class="grid-item">
                        <label for="">Upload ID Proof</label>
                        <input type="file" id="upload" name="upload" accept="image/*" class="upload-input">

                    </div>
                    <div class="grid-item">
                       <label>Upload your Image</label>
                        <input type="file" id="upload" name="upload" accept="image/*" class="upload-input">
                    </div>
                </div>
                
            </div>
            

        </div>

        <div class="dotted-line"></div>

        <div class="Row1">

            <div class="grid-row6">
                <div class="grid-item">
                    <label for="address1" class="address-label">Correspondance Address:</label>
                <textarea class="address-input"></textarea>

                </div>
                <div class="grid-item">
                    <label for="address2" class="address-label">Permanent Address:</label>
                    <textarea id="address2" name="address2" rows="4" cols="30" class="address-input"></textarea>
                </div>
            </div>
        
        </div>

        <div class="dotted-line"></div>

        <div class="Row1">
            
            
            <div class="grid-container1">
                <div class="grid-row1">
                    <div class="grid-item1">
                        
                        <input type="text" id="input1" name="input1" placeholder="Mobile Number *">
                    </div>
                    <div class="grid-item1">
                   
                        <input type="text" id="input1" name="input1" placeholder="Email">

                    </div>
                </div>
                <div class="grid-row1">
                    <div class="grid-item1">
                   
                        <input type="text" id="input3" name="input3" placeholder="Alternate Mobile Number">
                    </div>
                    <div class="grid-item1">
                     
                        
                        <input type="text" id="input3" name="input3" placeholder="Alternate Email Number">
                    </div>
                </div>
                
            </div>
        </div>
        <a href="./page-2.html">
        <button class="save">SAVE & NEXT</button> </a>

    <!-- </form> -->
    </div>

</body>
</html>
