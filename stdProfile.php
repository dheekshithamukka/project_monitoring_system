<html>
<head>
<link rel="stylesheet" href="stdProfile2.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body style="background: linear-gradient(120deg,#a8c0ff, #eaafc8);">
<div class="dropdown" style="background: linear-gradient(120deg,#a8c0ff, #eaafc8);">
  <button class="dropbtn" style="background: linear-gradient(120deg,#a8c0ff, #eaafc8);"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRVIcj4yYNjZ5iI4dAjusUE0OwK6jzd8EBON2aNJ4AejGNGYZch&usqp=CAU" style="width: 30px; height: 30px"/></button>
  <div class="dropdown-content">
    <a href="stdProfile.php">My profile</a>
    <a href="stdlogin.php">Logout</a>
    <!--<a href="proreg.php">New project registration</a>-->
  </div>
</div>

<?php
$con = mysqli_connect('localhost','student','gnits','project_monitoring');
if(mysqli_connect_errno()){
	echo "Failed to connect ".mysqli_connect_error();
}
session_start();
?>
<?php
$r = $_SESSION['id'];
$pwd = $_SESSION['p'];
$query = "SELECT * FROM stdreg WHERE stdRollNo='$r'";
$res = mysqli_query($con,$query);
echo "<table border='3'>
";
$row = mysqli_fetch_array($res);
$name = $row['stdName'];
$roll = $row['stdRollNo'];
$branch = $row['stdBranch'];
$_SESSION['n'] = $name;
$_SESSION['r'] = $roll;
$_SESSION['b'] = $branch;
//echo $_SESSION['branch'];
echo "<tr>";
echo "<td>Student Name</td>";
echo "<td>".$row['stdName']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Student Roll No</td>";
echo "<td>".$row['stdRollNo']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Student Email</td>";
echo "<td>".$row['stdEmail']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Student Phone number</td>";
echo "<td>".$row['stdPhone']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Student Branch</td>";
echo "<td>".$row['stdBranch']."</td>";
echo "</tr>";
echo "</table>";
?>
<br>
       <center><a href="proreg.php">New project registration?</a></center><br>


<?php
    require_once "db.php";
    $sql = "SELECT stId FROM stdreg WHERE stdRollNo='$r'";
    $result = mysqli_query($conn, $sql);
?>


<HTML>
<HEAD>
<link href="imageStyles.css" rel="stylesheet" type="text/css" />
</HEAD>
<BODY>
<?php
	while($row = mysqli_fetch_array($result)) {
	?>
		<div class="image"><img src="imageView.php?image_id=<?php echo $row["stId"]; ?>"  width="175" height="200"  /></div>
	
<?php		
	}
    mysqli_close($conn);
?>



<?php
$con = mysqli_connect('localhost','student','gnits','project_monitoring');
if(mysqli_connect_errno()){
	echo "Failed to connect ".mysqli_connect_error();
}
session_start();
?>

<?php
$r = $_SESSION['id'];
$pwd = $_SESSION['p'];
$query = "SELECT * FROM employee_table WHERE rollNo='$r'";
$res = mysqli_query($con,$query);
$num = mysqli_num_rows($res);
// echo $num;
?>
<br>
<center>
    <br><br>
<h1>List of projects registered:</h1><br>
</center>
<center><address><i>Note: Click on project names to know more details about it.</i></address></center><br><br>

<?php
$i=1;
$_SESSION['u'] = '$i';
$j=1;
$k=1;
$array=[];
while($row = mysqli_fetch_array($res)) {
        $array[$j]=$row['pname'];
        $j++;
        $entry = $row["pname"];
        $pdomain = $row['pdomain'];
        ?>
        <div class="container">
        <div class="pro">
            <center>
            <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="column">
            <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><a href="prodetails.php?pn=<?php echo $entry ?>&roll=<?php echo $r?>" style="text-decoration: none; color: black;">
                <?php echo $i.". ". $entry ; 
        ?></a></h5>
        Project domain: 
        <?php 
            echo $pdomain;
        ?>
  </div>
</div>
                
</div>
</div>
<div style="margin-top: 85px;">
        


        <?php
$percentage = 0;
$sq = "SELECT * FROM ig WHERE pname='$entry'";
$ans1 = mysqli_query($con, $sq);
$r3 = mysqli_fetch_array($ans1);
$r4 = mysqli_num_rows($ans1); 
/*$abs = $r3["appdisapp_abs"];
$doc = $r3["appdisapp_doc"];
$vid = $r3["appdisapp_vid"];*/
if($r4!=0){
$abs = $r3["appdisapp_abs"];
$doc = $r3["appdisapp_doc"];
$vid = $r3["appdisapp_vid"];
if($abs==1 & $doc==1 & $vid==1){
  $percentage = 100;
}
else if($abs==1 & $doc==1){
  $percentage = 50;
}
else if($abs==1){
  $percentage = 25;
}
else{
  $percentage = 0;
}
}



if($percentage==25){
  echo "<div class=\"progress\">
  <div class=\"progress-bar progress-bar-striped progress-bar-animated bg-error\" role=\"progressbar\" aria-valuenow=\"25\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 25%\">25% complete</div>
</div>";}
elseif($percentage==50)
{
  echo "<div class=\"progress\">
  <div class=\"progress-bar progress-bar-striped progress-bar-animated bg-warning\" role=\"progressbar\" aria-valuenow=\"50\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 50%\">50% complete</div>
</div>";

}

elseif($percentage==100){
 echo "<div class=\"progress\">
  <div class=\"progress-bar progress-bar-striped progress-bar-animated bg-success\" role=\"progressbar\" aria-valuenow=\"100\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 100%\">100% complete</div>
</div>";
}


?>



</div>
<br>




    
</div>

</div>
</div>
    </center>
        <?php
        echo "<br>";
        echo "<br>";
        $i++;
    }


                    ?>

                        </table>













                        </BODY>
</HTML>