<!-- <div class="navbar">
<div class="image" style="margin-left: 190px"><img src="http://103.44.2.84/ecap/CollegeImages/title_head.jpg" style="margin-left: -200px; width: 1500px; height: 180px"/></div>
</div> -->

<?php
$con = mysqli_connect('localhost','student','gnits','project_monitoring');
if(mysqli_connect_errno()){
	echo "Failed to connect ".mysqli_connect_error();
}
session_start();
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" type="text/css" href="stdlogin2.css"> -->
<link rel="stylesheet" type="text/css" href="stdlogin3.css">
</head>
<body>
<!-- <div class="row">
<div class="std">
<form method="post">
<div class="headcol">
<center><p style="color: white"><b>STUDENT LOGIN</b></p></center>
<hr></hr>
</div>
<center><input type="text" placeholder="Enter Student Id" class="log" name="roll" required ></input></center><br/>
<center><input type ="password" placeholder="Enter password" name="pw" required></input></center>
<center><input type="submit" name="login" value="Login" style="
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 14px 2px;
    cursor: grab;
    border-radius: 5px;
    width: 95px;
    height: 44px;
    font-size: 14px;

"></center>
<center><p style="color: white; font-size: 20px">Not a user? <a href="stdRegister1.php" style="color: black">Register here</a></p></center>
<br/>
<br/>
</form>
</div> -->


<div class="center">
	<h1>Student Login</h1>
	<form method="post">
		<div class="txt_field">
			<input type="text" name="roll" required />
			<span></span>
			<label>Student Id</label>
		</div>
		<div class="txt_field">
			<input type="password" name="pw" required />
			<span></span>
			<label>Password</label>
		</div>
		<input type="submit" name="login" value="Login">
		<div class="signup_link">
			Not a member? <a href="stdRegister1.php">Register</a>
		</div>
	</form>
</div>






<?php
if(isset($_POST['login'])){
	$stdId = $_POST['roll'];
	$stdPw = $_POST['pw'];
	$_SESSION['id'] = $stdId;
	$_SESSION['p'] = $stdPw; 
	$q = "SELECT * FROM stdreg WHERE stdRollNo = '$stdId' && stdPassword='$stdPw'";
	$result = mysqli_query($con,$q);
	$num = mysqli_num_rows($result);
	if($num==0){
				echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Wrong pwd');
		window.location.href = 'stdlogin.php';
		</script>");
	}
	else{
	header('location:stdProfile.php');

	}
}
?>


<br>


</div>
<center>
<a href="index.php">
<input type="submit" value="Back" name="submit" style="
    background-color: #2691d9;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin-top: 550px;
    margin-left: 48px;
    cursor: grab;
    border-radius: 25px;
    width: 115px;
    height: 44px;
    font-size: 14px;

">
</a>
</center>

</body>
</html>