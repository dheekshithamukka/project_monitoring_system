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
<html>
  <head>
<link rel="stylesheet" href="adminProfile.css">
</head>
<!-- <body style="background: linear-gradient(120deg, #FFAFBD, #ffc3a0)"> -->
<!-- <body style="background: linear-gradient(120deg, #1c92d2, #f2fcfe);"> -->
<body style="background: linear-gradient(120deg, #E8CBC0, #636FA4);">


<!-- <body style="background: linear-gradient(120deg, #D3CCE3, #E9E4F0)"> -->
<center><h1 style="margin-top: 100px;">Deadlines</h1></center>


<div class="row">
  <div class="column">

<form action="" method="post">
  <label for="abstract">Abstract: </label>
  <input type="date" id="abstract" name="abstract">
  <input type="submit" name="abstract_submit">
  <br />
  <br />
  <label for="documents">Documents:</label>
  <input type="date" id="documents" name="documents">
  <input type="submit" name="documents_submit">
  <br />
  <br />
  <label for="videos">Videos: </label>
  <input type="date" id="videos" name="videos">
  <input type="submit" name="videos_submit">
</form>

<br />
<br />
<br />

</div>


<div class="column" >


<form action="" method="post">
  <label for="PRC1">PRC1:</label>
  <input type="date" id="prc1" name="prc1">
  <input type="submit" name="prc1_submit" class="button">
  <br />
  <br />
  <label for="PRC2">PRC2:</label>
  <input type="date" id="prc2" name="prc2">
  <input type="submit" name="prc2_submit" class="button">
  <br />
  <br />
  <label for="PRC3">PRC3:</label>
  <input type="date" id="prc3" name="prc3">
  <input type="submit" name="prc3_submit" class="button">
</form>


</div>
</div>


<?php
if(isset($_POST['abstract_submit'])){
  echo "Hi";
    $abstract = $_POST['abstract']; 
    // echo $abstract;
    $d = date("Y-m-d");
	$q = "SELECT * FROM deadlines";
	$result = mysqli_query($con,$q);
	$num = mysqli_num_rows($result);
	if($num==0){
        $s = "INSERT INTO deadlines(abstract, documents, videos) VALUES('$abstract','$d','$d')";
        if(mysqli_query($con,$s)){
        echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Updated abstract deadline. ');
		window.location.href = 'adminProfile.php';
		</script>");
    }
  }
    else{
      $s = "UPDATE deadlines SET abstract='$abstract'";
      if(mysqli_query($con,$s)){
      echo ("<script LANGUAGE='JavaScript'>
   window.alert('Updated abstract deadline. ');
  window.location.href = 'adminProfile.php';
  </script>");
    }
}
}
?>



<?php
if(isset($_POST['documents_submit'])){
  echo "Hi";
    $documents = $_POST['documents']; 
    // echo $abstract;
    $d = date("Y-m-d");
	$q = "SELECT * FROM deadlines";
	$result = mysqli_query($con,$q);
	$num = mysqli_num_rows($result);
    $s = "UPDATE deadlines SET documents='$documents'";
    if(mysqli_query($con,$s)){
    echo ("<script LANGUAGE='JavaScript'>
 window.alert('Updated documents deadline. ');
window.location.href = 'adminProfile.php';
</script>");
  }
   
}
?>



<?php
if(isset($_POST['videos_submit'])){
  // echo "Hi";
    $videos = $_POST['videos']; 
    // echo $abstract;
    $d = date("Y-m-d");
	$q = "SELECT * FROM deadlines";
	$result = mysqli_query($con,$q);
	$num = mysqli_num_rows($result);
    $s = "UPDATE deadlines SET videos='$videos'";
    if(mysqli_query($con,$s)){
    echo ("<script LANGUAGE='JavaScript'>
 window.alert('Updated videos deadline. ');
window.location.href = 'adminProfile.php';
</script>");
  }
   
}
?>







<?php
if(isset($_POST['prc1_submit'])){
    $prc1 = $_POST['prc1']; 
    // echo $abstract;
    $d = date("Y-m-d");
	$q = "SELECT * FROM prc_meetings_deadlines";
	$result = mysqli_query($con,$q);
	$num = mysqli_num_rows($result);
	if($num==0){
        $s = "INSERT INTO prc_meetings_deadlines(prc1,prc2,prc3) VALUES('$prc1','$d','$d')";
        if(mysqli_query($con,$s)){
        echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Updated PRC1 deadline. ');
		window.location.href = 'adminProfile.php';
		</script>");
    }
  }
    else{
      $s = "UPDATE prc_meetings_deadlines SET prc1='$prc1'";
      if(mysqli_query($con,$s)){
      echo ("<script LANGUAGE='JavaScript'>
   window.alert('Updated aPRC1 deadline. ');
  window.location.href = 'adminProfile.php';
  </script>");
    }
}
}
?>



<?php
if(isset($_POST['documents_submit'])){
  echo "Hi";
    $documents = $_POST['documents']; 
    // echo $abstract;
    $d = date("Y-m-d");
	$q = "SELECT * FROM deadlines";
	$result = mysqli_query($con,$q);
	$num = mysqli_num_rows($result);
    $s = "UPDATE deadlines SET documents='$documents'";
    if(mysqli_query($con,$s)){
    echo ("<script LANGUAGE='JavaScript'>
 window.alert('Updated documents deadline. ');
window.location.href = 'adminProfile.php';
</script>");
  }
   
}
?>



<?php
if(isset($_POST['videos_submit'])){
  // echo "Hi";
    $videos = $_POST['videos']; 
    // echo $abstract;
    $d = date("Y-m-d");
	$q = "SELECT * FROM deadlines";
	$result = mysqli_query($con,$q);
	$num = mysqli_num_rows($result);
    $s = "UPDATE deadlines SET videos='$videos'";
    if(mysqli_query($con,$s)){
    echo ("<script LANGUAGE='JavaScript'>
 window.alert('Updated videos deadline. ');
window.location.href = 'adminProfile.php';
</script>");
  }
   
}
?>



<center>
<a href="adminlogin.php">
  <input type="submit" name="approve" value="Logout" class="btn btn-success"  id="button2"
  style="background-color: #4CAF50;
  background-color:#636FCC;
  border: none;
  color: white;
  margin-top: 100px;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  cursor: pointer;"/>   

</a>

</center>


<br />
<br />
<br />
<br />


</body>
</html>
