<div class="navbar">
<div class="image" style="margin-left: 190px"><img src="http://gnits.ac.in/sites/default/files/pics/narh2.png"/></div>
</div>

<?php
$con = mysqli_connect('localhost','student','gnits','project_monitoring');
if(mysqli_connect_errno()){
	echo "Failed to connect ".mysqli_connect_error();
}
session_start();
?>
<html>
<head>
<link rel="stylesheet" href="prclogin.css">
</head>
<body>
<div class="std">
<form method="post">
<div class="headcol">
<center><p><b>STUDENT LOGIN</b></p></center>
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
<center><p>Not a user?<a href="stdRegister1.php">Register here</a></p></center>
<br/>
<br/>
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


<a href="index.php"><img class="image" src="https://i2.wp.com/www.matuloo.com/wp-content/uploads/2017/02/backbutton.png?fit=800%2C400" style="width: 70px; height: 40px;"/>
</a>



</body>
</html>