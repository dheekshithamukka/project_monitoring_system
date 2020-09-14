<?php
$con = mysqli_connect('localhost','student','gnits','project_monitoring');
if(mysqli_connect_errno()){
    echo "Failed to connect ".mysqli_connect_error();
}
session_start();
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> 
<html lang="en"> <!--<![endif]-->
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<meta charset="utf-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="stdregister.css" />
</head>
<body>
<div class=bimage>
<center>
<div class="container">
    <section id="content">
        <form onsubmit="return false;" name="frmImage" enctype="multipart/form-data" action="" method="post" class="frmImageUpload">
            <center><h1>Register Form</h1></center>
            <div>
                <input type="text" placeholder="Enter your Name" required id="name" />
            </div>
            <div>
                <input type="text" placeholder="Enter your roll no" required name="roll" />
            </div>
	    <div>
                <input type="email" placeholder="Enter your email-id" required id="email" />
            </div>
	    
	    <div>
                <input type="tel" placeholder="Enter phone" required id="phone" />
            </div>
<div>
                <input type="text" placeholder="Enter branch" required id="branch" />
            </div>

	    <div>
                <input type="password" placeholder="password" required id="password"/>
            </div>
           <div>
                <button onclick="registrationForm()">Register</button>
		<a href="index.php"><input type="submit1" value="Cancel"/></a>
            </div>
<div>
<br></br>
		<a href="image_upload.php">Upload your image here</a>
            </div>

        </form><!-- form -->
<div class="formProcessing"></div>
<div class="formResult"></div>
<script>
function registrationForm(){
var name = $('#name').val();
var roll = $('roll').val();
var phone = $('#phone').val();
var email = $('#email').val();
var password = $('#password').val();
var branch = $('#branch').val();
if(name != "" &&  roll != "" && phone != "" && email != "" && password != "" && branch != ""){
$.ajax({
type: "POST",
url: "stdregprocess.php",
data: "name="+name+"&roll="+roll+"&phone="+phone+"&email="+email+"&password="+password+"&branch="+branch ,
cache: false,
beforeSend: function(){
$('.formProcessing').fadeIn('fast').html("Processing your request");
},
success: function(html){
$('.formProcessing').fadeOut('fast');
$('.formResult').fadeIn('fast').html(html);
},
});
}
else{
$('.formResult').fadeIn('fast').html("Please fill all the details correctly");
}
}
</script>
</div>
</body>
</html>