<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

    include 'connection.php';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    if($password != $cpassword)
    {
        echo'<script type="text/JavaScript">';
        echo'alert("Password Mismatch")';
        echo'</script>';
    }
    else{
        $nsql = "SELECT * FROM `user_details` WHERE `email`='$email'";
        $result = mysqli_query($con,$nsql);
        if($result){
            $num = mysqli_num_rows($result);
            if($num>0){
                echo '<script type="text/JavaScript">';
                echo 'alert("Email Already Exists!!")';
                echo '</script>';
            }
            else{    
                $password = md5($password);
                $sql ="INSERT INTO `user_details`(`username`, `email`, `password`,`contact`,`address`,`pincode`) VALUES ('$name','$email','$password','$contact','$address','$pincode')";
                $result = mysqli_query($con,$sql);
                if($result){
                    echo '<script type="text/JavaScript">';
                    echo"window.location.href='login.php'";
                    echo '</script>';
                }
                else{
                    die(mysqli_error($con));
                }
                
            }
        }
        
    }
}
    ?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up Form</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap");
        *{    
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            overflow-x : hidden;
        }
        .login-container{
            display:flex;
            width:100%;
            margin-left:20px;
           
        }
        .login-box1{
            margin-top:10px;
            width:50%;
        }
        .sub2{
                width:55vw;
                background-color: seagreen;
                filter: brightness(90%);
                /* height: 100vh; */
                position: relative;
                z-index:-2;
                display: flex;
                justify-content: center;
                align-items: center;
                position : sticky;
             
                
            }
            .sub2-main img{
                height:80vh;
                position: absolute;
                /* position : fixed; */
                /* top: 100px; */

            }
        .input-style{
    
            padding: 1.1em;
            width: 90%;
            background-color:whitesmoke;
            border: 0px;
            border-bottom: 2px solid grey;
            border-radius: 5px;
            outline:transparent;
            margin-top: 0.8vh;
            resize: none;
        }
        
        .submit{
            width:95%;
            /* background-color: #cd977c; */
            margin: 2vh 0px;
        }
        .submit input{
            padding: 0.8em;
            background-color:seagreen;
            border:0;
            filter: brightness(90%);
            text-align:center;
        }
        .submit input{
            color: white;
            font-size: 1.1em;
            text-decoration: none;
            width:100%;
        }
        .submit input:hover{
            background-color: #0C3720;
            transition: 0.5s;
            cursor: pointer;
        }
        
        .sub2-font{
                letter-spacing: 1px;
                margin-top: 25vh;
                font-size: 2.2em;
                color: white;
                font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            }
            .small-font{
                font-size: 1.2em;
                color: white;
                width:50%;
                letter-spacing: 1px;
            }
            .sub2-main{
                /* padding-top: 3vh; */
                /* padding-left: 5vw; */
                
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .userpass{
                display: flex;
            }
            .userpass *{
                width: 50%;
            }
            .passblock{
                width: 80%;
            }

    </style>
</head>
<body>

    <form action="register.php" method="POST">
        <div class="login-container container">
            <div class="login-box1">
                    <center><h2 style="color:#0C3720;">Sign Up</h2></center>
                    <div class="usermail">
                    <font>Name</font><br>
                        <input type="text" name="name" class="input-style" placeholder="Enter Your Name">
                    </div><br>
                    <div class="usermail userpass">
                        <div class="useremail ">
                            <font>Email Address</font><br>
                            <input type="email" name="email" class="input-style passblock" placeholder="Enter Your Email">
                        </div>
                        <div class="usercontact ">
                        <font>Contact</font><br>
                        <input type="tel" name="contact" class="input-style passblock" placeholder="Mobile No." maxlength="10" minlength="10">
                        </div>
                    </div><br>
                    <div class="userpass usermail">
                        <div class="pass">
                            <font>Password</font><br>
                            <input type="password" name="password" class="input-style passblock" placeholder="Enter Your Password">
                        </div>
                        <div class="conpass">
                            <font>Confirm Your Password</font><br>
                            <input type="password" name="cpassword" class="input-style passblock"  placeholder="Confirm-Password">
                        </div>
                    </div><br>

                    <div class="usermail">
                    <font>Address</font><br>
                        <!-- <input type="text" name="address" class="input-style" placeholder="Enter Your Address"> -->
                        <textarea name="address" id="" cols="30" rows="3" placeholder="Enter Your Address" class="input-style"></textarea>
                    </div><br>
                    <div class="usermail userpass">
                        <div class="pincodeuser">

                            <font>Pin Code</font><br>
                            <input type="tel" name="pincode" id="pincode" class="input-style passblock" placeholder="Enter Your Pin Code" maxlength="6" minlength="6">
                            <br><span style="position:absolute; font-size: small ; color: red; display:none;" id="pincodeservice">Our Service are not available in your area</span>
                        </div>
                    </div><br>
                        
                            <div class="submit">
                                <center>    
                                    <input type="submit" name="submit" value="Sign Up">
                                </center>
                            </div>
                    
                    
                    <div class="sign-up" style="float: right; margin-right:35px">
                        <font>Already a Member?</font>
                        <font "> <a href="login.php" style="text-decoration: none; color : blue"> Sign in now </a></font>
                    </div>
            </div>
            <div class="sub2">
                <div class="sub2-main">
                <img src="images/9929.jpg" alt="" class="login-logo">
                </div>
            </div>
        </div>
    </form>
</body>
</html>

<script>
    $(document).ready(function(){
        $('#pincode').keyup(function(){
            var detail = this.value;
            if(detail.length == 6){
                alert(detail)
                $.ajax({
                    url:'pages/checkpincode.php',
                    type:"POST",
                    data:{pincode:detail},
                    success: function(data){
                        alert(data);
                        if(data=="failed"){
                            $('#pincodeservice').css('display','block');
                        }
                    }
                });
            }
        })
    })
</script>

