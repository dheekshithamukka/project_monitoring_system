<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
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
<!--<div class=bimage>-->
<center>
<div class="container">
    <section id="content">
        <form name="frmImage" enctype="multipart/form-data" action="" method="POST">
            <center><h1>Register Form</h1></center>
            <div>
                <input type="text" placeholder="Enter your Name" required name="name" />
            </div>
            <div>
                <input type="text" placeholder="Enter your Id" required name="roll" />
            </div>
	    <div>
                <input type="email" placeholder="Enter your email-id" required name="email" />
            </div>
	    
	    <div>
                <input type="tel" placeholder="Enter phone number" required name="phone" />
            </div>
<div>
                <input type="text" placeholder="Enter branch" required name="branch" />
            </div>

	    <div>
                <input type="password" placeholder="password" required name="password"/>
            </div>
           <div>
                <!--<button onclick="registrationForm()">Register</button>
		<a href="index.php"><input type="submit1" value="Cancel"/></a>-->
        <!--<input type="submit" name="submit" value="Register"></input>-->
            </div>
<div>
<br></br>
		<!--<a href="image_upload.php">Upload your image here</a>-->
        <input name="userImage" type="file" class="inputFile" required/>
        <input type="submit" value="Submit" name="submit"/>
            </div>

        </form>
<!-- form -->
<!--<div class="formProcessing"></div>
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
</script> -->





<?php     
if(isset($_POST['submit'])){
    //echo "Hi";
$name=$_POST['name'];
$roll=$_POST['roll'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$branch=$_POST['branch'];
$password=$_POST['password'];
//$userImage=$_POST['userImage'];
if($name==''){
    echo 'Name empty';
}
else if($roll==''){
    echo 'Roll empty';
}
else if($email==''){
    echo 'Email empty';
}
else if($phone==''){
    echo 'Phone empty';
}
else if($branch==''){
    echo 'Branch empty';
}
else if($password==''){
    echo 'Password empty';
}
/*else if($userImage==''){
    echo 'Image empty';
}*/
else if($name=='' || $roll=='' || $email=='' || $phone=='' || $branch=='' || $password=='')
{
echo "Please fill the empty field.";
}
else{
if(count($_FILES) > 0) {
if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
$imgData =addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
$imageProperties = getimageSize($_FILES['userImage']['tmp_name']);
$sql="insert into igreg (ig_name,ig_id,ig_email,ig_phone,ig_branch,ig_password,imageType, imageData) values('$name','$roll','$email','$phone','$branch','$password', '{$imageProperties['mime']}', '{$imgData}')";
$res=mysqli_query($con,$sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($con));
if($res)
{
echo "Record successfully inserted";
}
else{
    echo "There is some problem in inserting record";

}
}
}
}
}
?>



</div>
</body>
</html>