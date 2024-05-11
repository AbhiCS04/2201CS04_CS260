<?php
  include("./connectdb.php");

  if(isset($_POST['email'])){
    print_r($_POST);
    $email = $_POST['email'];
    $var1 = $_POST['pos'];
    $var2 = $_POST['org/inst'];
    $var3 = $_POST['status'];
    $var4 = $_POST['doj'];
    $var5 = $_POST['dol'];
    $var6 = $_POST['duration'];
    $var7 = $_POST['area_of_splztn'];
    $var8 = $_POST['cur_area_of_resrch'];

    $position = $_POST['position'];
    $employer = $_POST['employer'];
    $doj = $_POST['doj'];
    $dol = $_POST['dol'];
    $exp_duration = $_POST['exp_duration'];

    $te_position = $_POST['te_position'];
    $te_employer = $_POST['te_employer'];
    $te_course = $_POST['te_course'];
    $te_ug_pg = $_POST['te_ug_pg'];
    $te_no_stu = $_POST['te_no_stu'];
    $te_doj = $_POST['te_doj'];
    $te_dol = $_POST['te_dol'];
    $te_duration = $_POST['te_duration'];

    $r_exp_position = $_POST['r_exp_position'];
    $r_exp_institute = $_POST['r_exp_institute'];
    $r_exp_supervisor = $_POST['r_exp_supervisor'];
    $r_exp_doj = $_POST['r_exp_doj'];
    $r_exp_dol = $_POST['r_exp_dol'];
    $r_exp_duration = $_POST['r_exp_duration'];

    $org = $_POST['org'];
    $work = $_POST['work'];
    $ind_doj = $_POST['ind_doj'];
    $ind_dol = $_POST['ind_dol'];
    $period = $_POST['period'];
    

    $insertUser = $conn->prepare(" INSERT INTO `page4` (`email`, `pos`,`org/inst`,`status`,`doj`,`dol`,`duration`,`area_of_splztn`,`cur_area_of_resrch`) 
    VALUES ('$email', '$var1','$var2','$var3','$var4','$var5','$var6','$var7','$var8')

    ");


    $insertUser->execute();
    if($insertUser){
      echo "Done";
    }
    else{
      echo "Not done";
    }
    $insert4 = $conn->prepare(" INSERT INTO `pg4_emp_hist` (`email`, `position`, `employer`, `doj`, `dol`, `exp_duration`)
    VALUES ('$email', '$position', '$employer', '$doj', '$dol', '$exp_duration')
    ");

    $insert4->execute();

    $insert41 = $conn->prepare("INSERT INTO `pg4_teach_exp`  (`email`, `position`, `employer`, `course`, `ug_pg`, `no_of_students`, `doj`, `dol`, `duration`)
    VALUES ('$email', '$te_position', '$te_employer', '$te_course', '$te_ug_pg', '$te_no_stu', '$te_doj', '$te_dol', '$te_duration')");

    $insert41->execute();

    $insert42 = $conn->prepare("INSERT INTO `pg4_rsrch_exp` (`email`, `position`, `institute`, `supervisor`, `doj`, `dol`, `duration`)
    VALUES ('$email', '$r_exp_position', '$r_exp_institute', '$r_exp_supervisor', '$r_exp_doj', '$r_exp_dol', '$r_exp_duration')");

    $insert42->execute();

    $insert43 = $conn->prepare("INSERT INTO `pg4_ind_exp` (`email`, `org`, `work_prof`, `doj`, `dol`, `duration`)
    VALUES ('$email', '$org', '$work', '$ind_doj', '$ind_dol', '$period')");

  }



  if(isset($_POST['submit'])){
    header("Location: page5.php");
    
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

    .Row1{
        width: 90%;
        margin: auto;
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
        text-align: center;
        padding:20px;
    }

    .dotted-line {
    border-bottom: 1px dotted #000; 
    width: 100%;
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

    .grid-container {
    display: grid;
    grid-gap: 0px;
    padding: 10px; 
    border-radius: 10px;
}

.grid-row {
    display: flex;
    align-items: center;
    justify-content: center;
}

.grid-item {
    width: 100%;
    padding: 5px;
    border-radius: 5px;
    text-align: center; 
    
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
.back{
    background-color: orange;
    border-width: 0px;
    height: 40px;
    margin-top: 50px;
    margin-right: 50px;
    margin-bottom: 50px;
    float: left;
}
.back:hover{
    background-color: rgb(228, 185, 103);   
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

</style>

<body>

    <div>

        <img src="https://upload.wikimedia.org/wikipedia/en/thumb/5/52/Indian_Institute_of_Technology%2C_Patna.svg/330px-Indian_Institute_of_Technology%2C_Patna.svg.png" style="padding-top: 5px; height: 120px; float: left;">

        <h1 style="font-size: 50px; color: white;" >INDIAN INSTITUTE OF TECHNOLOGY PATNA</h1>
        <h1 style="font-size: 50px; color: white;">भारतीय प्रौद्योगिकी संस्थान पटना</h1>

        <div class="Row1">
            
            <div class="first-row">
                
                <a href="./login_page.html">
                    <button class="button1">Logout</button> </a>
                
            </div>
            
            <p style="text-align: left;">Welcome : </p>

            <div class="dotted-line"></div>

            <p style="text-align: center; font-size: large;">EMPLOYMENT DETAILS : </p>
            <P style="text-align: left;">Present Employment : </P>
            
            <div class="grid-container1">
                <div class="grid-row1">
                    <div class="grid-item1"><input type="text"  placeholder="Position"></div>
                    <div class="grid-item1"><input type="text"  placeholder="Organization/Institution"></div>
                </div>
                <div class="grid-row1">
                    <div class="grid-item1"><input type="text" placeholder="Status"></div>
                    <div class="grid-item1"><input type="text"  placeholder="Date of Joining"></div>
                </div>

                <div class="grid-row1">
                    <div class="grid-item1"><input type="text" placeholder="Date of Leaving(Mention Continue if working)"></div>
                    <div class="grid-item1"><input type="text"  placeholder="Duration (in years & months)">   </div>
                </div>
            </div> 
        </div>

        <div class="Row1">

            <P style="text-align: left;"> Employment History (After PhD, Starting with Latest) </P>
                
            <div class="grid-container">
                <div class="grid-row">
                    <div class="grid-item">S. No.</div>
                    <div class="grid-item">	Position</div>
                    <div class="grid-item">	Organization/Institution</div>
                    <div class="grid-item">Date of Joining</div>
                    <div class="grid-item">Date of Leaving</div>
                    <div class="grid-item">Duration (in years & months)</div>
                </div>
                <div class="grid-row">
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                </div>
                <div class="grid-row">
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                </div>
                <p style="float: left;">Experience : Minimum 6 years’ experience of which at least 3 years should be at the level of Assistant Professor Grade I/Senior Scientific Officer/Senior Design Engineer.</p>
                
                <div class="grid-row1">
                    <div class="grid-item1"><input type="radio"><label>Yes</label></div>
                    <div class="grid-item1"><input type="radio"><label>No</label></div>
                </div>

            </div>
        </div>

        <div class="Row1">

            <P style="text-align: left;">Teaching Experience(After PhD) </P>

            <div class="grid-container">
                <div class="grid-row">
                    <div class="grid-item">S. No.</div>
                    <div class="grid-item">	Position</div>
                    <div class="grid-item">	Employer</div>
                    <div class="grid-item">Course Taught</div>
                    <div class="grid-item">UG/PG</div>
                    <div class="grid-item">Number of Students</div>
                    <div class="grid-item">Date of joining</div>
                    <div class="grid-item">	Date of leaving</div>
                    <div class="grid-item">	Duration(in years&months)</div>
                </div>
                <div class="grid-row">
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                </div>
                <div class="grid-row">
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                </div>
                <div class="grid-row">
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                </div>                
            </div>    
        </div>

        <div class="Row1">

            <P style="text-align: left;"> Research Experience(Post PhD, including Post Doctoral) </P>
                
            <div class="grid-container">
                <div class="grid-row">
                    <div class="grid-item">S. No.</div>
                    <div class="grid-item">	Position</div>
                    <div class="grid-item">	Institute</div>
                    <div class="grid-item">Supervisor</div>
                    <div class="grid-item">Date of Joining</div>
                    <div class="grid-item">Date of Leaving</div>
                    <div class="grid-item">Duration (in years & months)</div>
                </div>
                <div class="grid-row">
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                </div>
                <div class="grid-row">
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                </div>
                <div class="grid-row">
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                </div>
               

            </div>
        </div>

        <div class="Row1">

            <P style="text-align: left;"> Industrial Experience </P>
                
            <div class="grid-container">
                <div class="grid-row">
                    <div class="grid-item">S. No.</div>
                    <div class="grid-item">	Organization</div>
                    <div class="grid-item">	Work Profile</div>
                    <div class="grid-item">Date of Joining</div>
                    <div class="grid-item">Date of Leaving</div>
                    <div class="grid-item">Duration (in years & months)</div>
                </div>
                <div class="grid-row">
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                </div>
                <div class="grid-row">
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                </div>
                <div class="grid-row">
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                </div>
               

            </div>
        </div>

        <div class="Row1">

            <P style="text-align: left;"> Industrial Experience </P>
                
            <div class="grid-container">
                <div class="grid-row">
                    <div class="grid-item">S. No.</div>
                    <div class="grid-item">	Organization</div>
                    <div class="grid-item">	Work Profile</div>
                    <div class="grid-item">Date of Joining</div>
                    <div class="grid-item">Date of Leaving</div>
                    <div class="grid-item">Duration (in years & months)</div>
                </div>
                <div class="grid-row">
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                </div>
                <div class="grid-row">
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                </div>
                <div class="grid-row">
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                    <div class="grid-item"><input type="text"></div>
                </div>
               

            </div>
        </div>

        <div class="Row1">
            
            <div class="first-row">
                
                <button class="button1">Logout</button>
                
            </div>
            
            <p style="text-align: left;">Welcome : </p>

            <div class="dotted-line"></div>

            <p style="text-align: center; font-size: large;"> Area(s) of Specialization and Current Area(s) of Research : </p>
            
            <div class="Row1">

                <div class="grid-row">
                    <div class="grid-item">
                        <label for="address1" class="address-label">Areas of specialization:</label>
                    <textarea class="address-input"></textarea>
    
                    </div>
                    <div class="grid-item">
                        <label for="address2" class="address-label">Current Area of research:</label>
                        <textarea id="address2" name="address2" rows="4" cols="30" class="address-input"></textarea>
                    </div>
                </div>
            
            </div>



        </div>

        <div class="dotted-line"></div>

        <div class="dotted-line"></div>
        <a href="./page-2.html">
        <button class="back">BACK</button></a>
        <a href="./page-4.html">
        <button class="save">SAVE & NEXT</button> </a>






    </div>
</body>
</html>
