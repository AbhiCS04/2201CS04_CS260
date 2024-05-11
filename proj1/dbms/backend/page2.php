<?php
  include("./connectdb.php");

  if(isset($_POST['email'])){
    print_r($_POST);
    $var0 = $_POST['email'];
    $var1 = $_POST['phd_uni'];
    $var2 = $_POST['dept'];
    $var3 = $_POST['phd_superv'];
    $var4 = $_POST['phd_yoj'];
    $var5 = $_POST['DSTS'];
    $var6 = $_POST['doa'];
    $var7 = $_POST['TofPHDth'];
    $var8 = $_POST['mtech_deg/cert'];
    $var9 = $_POST['mtech_ad_uni'];
    $var10 = $_POST['mtech_branch'];
    $var11= $_POST['mtech_ad_yoj'];
    $var12= $_POST['mtech_yoc'];
    $var13= $_POST['mtech_duration'];
    $var14= $_POST['mtech_cgpa'];
    $var15= $_POST['mtech_div/class'];
    $var16= $_POST['btech_deg/cert'];
    $var17= $_POST['btech_ad_uni'];
    $var18= $_POST['btech_branch'];
    $var19= $_POST['btech_ad_yoj'];
    $var20= $_POST['btech_yoc'];
    $var21= $_POST['btech_duration'];
    $var22= $_POST['btech_cgpa'];
    $var23= $_POST['btech_div/class'];
    $var24= $_POST['s_study'];
    $var25= $_POST['s_name'];
    $var26= $_POST['s_yop'];
    $var27= $_POST['s_grade'];
    $var28= $_POST['s_div'];
    

    $insertUser = $conn->prepare(" INSERT INTO `page3` (`email`, `phd_uni`,`dept`,`phd_superv`,`phd_yoj`,`DSTS`,`doa`,`TofPHDth`,`mtech_deg/cert`,`mtech_ad_uni`,`mtech_branch`,`mtech_ad_yoj`,`mtech_yoc`,`mtech_duration`,`mtech_cgpa`,`mtech_div/class`,`btech_deg/cert`,`btech_ad_uni`,`btech_branch`,`btech_ad_yoj`,`btech_yoc`,`btech_duration`,`btech_cgpa`,`btech_div/class`,`s_study`,`s_name`,`s_yop`,`s_grade`,`s_div`) 
    VALUES ('$var0', '$var1','$var2','$var3','$var4','$var5','$var6','$var7','$var8','$var9','$var10','$var11','$var12','$var13','$var14','$var15','$var16','$var17','$var18','$var19','$var20','$var21','$var22','$var23','$var24','$var25','$var26','$var27','$var28')

    ");


    $insertUser->execute();
    if($insertUser){
      echo "Done";
    }
    else{
      echo "Not done";
    }
    $insert2 = $conn->prepare("
    insert into 'add_qual' (`email`, `deg/certf`, `uni/inst`, `br/strm', `yoj`, 'yoc`, `duration`, `cgpa`, `div/class`) values ('$var11', '$var12', '$var13', '$var14', '$var15', '$var16', '$var17', '$var18', '$var19')");
    $insert2 = $conn->prepare("
    insert into 'add_qual' (`email`, `deg/certf`, `uni/inst`, `br/strm', `yoj`, 'yoc`, `duration`, `cgpa`, `div/class`) values ('$var21', '$var22', '$var23', '$var24', '$var25', '$var26', '$var27', '$var28', '$var29')");
    $insert2 = $conn->prepare("
    insert into 'add_qual' (`email`, `deg/certf`, `uni/inst`, `br/strm', `yoj`, 'yoc`, `duration`, `cgpa`, `div/class`) values ('$var31', '$var32', '$var33', '$var34', '$var35', '$var36', '$var37', '$var38', '$var39')");
    $insert2 = $conn->prepare("
    insert into 'add_qual' (`email`, `deg/certf`, `uni/inst`, `br/strm', `yoj`, 'yoc`, `duration`, `cgpa`, `div/class`) values ('$var41', '$var42', '$var43', '$var44', '$var45', '$var46', '$var47', '$var48', '$var49')");
    $insert2 = $conn->prepare("
    insert into 'add_qual' (`email`, `deg/certf`, `uni/inst`, `br/strm', `yoj`, 'yoc`, `duration`, `cgpa`, `div/class`) values ('$var51', '$var52', '$var53', '$var54', '$var55', '$var56', '$var57', '$var58', '$var59')");
    $insert2->execute();

  }





  if(isset($_POST['submit'])){
    header("Location: page4.php");
    
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
       
        padding:0px;
        display: flex;
        justify-content: flex-end;
    }
    .button1{
        margin:5px;
        float: right;
    }

    .Row{
        width: 90%;
        margin: auto;
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
        text-align: center;
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

    input[type="date"] {
    width: 50%; 
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    color: #333;
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





</style>


<body>

    <div>

        <img src="../self/images/IITPatna.png" style="padding-top: 5px; height: 120px; float: left;">

        <h1 style="font-size: 50px; color: white;" >INDIAN INSTITUTE OF TECHNOLOGY PATNA</h1>
        <h1 style="font-size: 50px; color: white;">भारतीय प्रौद्योगिकी संस्थान पटना</h1>


        <div class="Row1">
            
            <div class="first-row">
                
                <a href="./login_page.html">
                    <button class="button1">Logout</button> </a>
                
            </div>
            
            <p style="text-align: left;">Welcome : </p>

        </div>

        <div class="dotted-line"></div>
        
       
        
        <div class="Row1">
            
            <p style="text-align: center; font-size: large;">EDUCATIONAL QUALIFICATIONS : </p>
            <P style="text-align: left;">Details of PhD:</P>

            <div class="grid-container1">
                <div class="grid-row1">
                    <div class="grid-item1">
                        
                        <input type="text"  placeholder="University/Institute">
                    </div>
                    <div class="grid-item1">
                   
                        <input type="text"  placeholder="Department">

                    </div>
                </div>
                <div class="grid-row1">
                    <div class="grid-item1">
                   
                        <input type="text" placeholder="Name of PhD Supervisor">
                    </div>
                    <div class="grid-item1">
                     
                        <input type="text"  placeholder="Year of Joining">   
                       
                    </div>
                </div>
                <div class="grid-row1">
                    <div class="grid-item1">
                        <label>Date of Thesis Defence</label>
                        <input type="date">
                    </div>
                    <div class="grid-item1">
                        <label for="">Date of Award</label>
                        <input type="date">

                    </div>
                </div>

                <div class="grid-row1">
                    <div class="grid-item1">
                        <input  style='float: left; margin-left: 150px; width: 25%;' type="text" id="input3" name="input3" placeholder="Name of PhD Thesis">
                    </div> 
                   
                </div>

                
            </div> 
        </div>
        
        <div class="dotted-line"></div>

        <div class="Row1">
            
            <P style="text-align: left;">Academic Details - M. Tech./ M.E./ PG Details</P>

            <div class="grid-container1">
                <div class="grid-row1">
                    <div class="grid-item1">
                        
                        <input type="text"  placeholder="Degree/Certificate">
                    </div>
                    <div class="grid-item1">
                   
                        <input type="text" placeholder="University/Institute">

                    </div>
                </div>
                <div class="grid-row1">
                    <div class="grid-item1">
                   
                        <input type="text" placeholder="Branch/Stream">
                    </div>
                    <div class="grid-item1">
                     
                        <input type="text" placeholder="Year of Joining">   
                       
                    </div>
                </div>
                
                <div class="grid-row1">
                    <div class="grid-item1">
                   
                        <input type="text" placeholder="Year of Completion">
                    </div>
                    <div class="grid-item1">
                     
                        <input type="text" placeholder="Duration (in years)">   
                       
                    </div>
                </div>

                <div class="grid-row1">
                    <div class="grid-item1">
                   
                        <input type="text"  placeholder="Percentage/ CGPA">
                    </div>
                    <div class="grid-item1">
                     
                        <input type="text" placeholder="Division/Class">   
                       
                    </div>
                </div>

                

                
            </div> 
        </div>

        <div class="dotted-line"></div>

        <div class="Row1">

            <P style="text-align: left;">Academic Details - School *</P>
            
            <div class="grid-container">
                <div class="grid-row">
                    <div class="grid-item">10th/12th/HSC/Diploma</div>
                    <div class="grid-item">	School</div>
                    <div class="grid-item">Year of Passing</div>
                    <div class="grid-item">Percentage/ Grade</div>
                    <div class="grid-item">Division/Class</div>
                </div>
                <div class="grid-row">
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
                </div>
            </div>
            
            
        </div>

        <div class="dotted-line"></div>

        <div class="Row1">

            <P style="text-align: left;">Additional Educational Qualification (If any)</P>
            
            <div class="grid-container">
                <div class="grid-row">
                    <div class="grid-item"> Degree/Certificate</div>
                    <div class="grid-item">	University/Institute</div>
                    <div class="grid-item">Branch/Stream</div>
                    <div class="grid-item">Year of Joining</div>
                    <div class="grid-item">Year of Completion</div>
                    <div class="grid-item">Duration (in years)</div>
                    <div class="grid-item">Percentage/ CGPA</div>
                    <div class="grid-item">Division/Class</div>
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

                </div>
                
            </div>
                        
        </div>

        <div class="dotted-line"></div>
          <a href="./page-1.html">
        <button class="back">BACK</button></a>
        <a href="./page-3.html">
        <button class="save">SAVE & NEXT</button> </a>

    </div>
</body>
</html>
