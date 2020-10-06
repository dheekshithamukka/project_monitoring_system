<!--https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTM1vvPLvAGM5Hvo5iH3GY_FS05NmVFITPd5sl9ZFOrXMa4xjew&usqp=CAU
-->
<a href="igprofile.php"><img class="i" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTM1vvPLvAGM5Hvo5iH3GY_FS05NmVFITPd5sl9ZFOrXMa4xjew&usqp=CAU
"/></a>



<?php
$con = mysqli_connect('localhost','student','gnits','project_monitoring');
if(mysqli_connect_errno()){
  echo "Failed to connect ".mysqli_connect_error();
}
session_start();
?>
<html>
<head><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- <link rel="stylesheet" href="table99.css"> -->
<link rel="stylesheet" href="prodetails4.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body style="background: linear-gradient(120deg, #FFAFBD, #ffc3a0)">

<?php
$pname = $_GET['pn'];
$guide = $_GET['guide'];
//echo $guide;
$i=1;
//$pname=$_SESSION['pname'];
//echo $_SESSION['pname'];
//echo $pname;
$query="SELECT * FROM employee_table WHERE pname='$pname'";
$res=mysqli_query($con,$query);
echo "<table border='3'>
";
echo "<tr>";
echo "<td>Team members</td>";

echo "<td>";
while($row = mysqli_fetch_array($res)){
      $tname = $row["name"];
	    $troll = $row["rollNo"];
      echo $i.". ". $tname." - ". $troll."<br />";
      $i++;
}
echo "</td>";



$q = "SELECT * FROM employee_table WHERE pname='$pname'";
$r = mysqli_query($con,$q);
$rs = mysqli_fetch_array($r);
echo "<tr>";
echo "<td><b>Project Name: </b></td>";
echo "<td>".$pname."</td>";
echo "</tr>";
echo "<tr>";
echo "<td><b>Project Domain: </b></td>";
echo "<td>".$rs['pdomain']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td><b>Type of project: </b></td>";
echo "<td>".$rs['ptype']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td><b>Internal Guide: </b></td>";
echo "<td>".$rs['int_guide']."</td>";
echo "</tr>";

$ig = $rs['int_guide'];
$_SESSION['ig'] = $ig;

echo "</table>";
?>




<div class="container">
<div class="row">
<div class="column">
<div class="card" style="width: 22rem; border-radius: 20px;">
  <div class="card-body">
<b>Abstract:</b>
<br>
<br>
<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
?>
<?php
$conn = mysqli_connect('localhost','student','gnits','project_monitoring');
if(mysqli_connect_errno()){
  echo "Failed to connect ".mysqli_connect_error();
}
?>

 <?php
 $sql= "SELECT * FROM file_upload_1 WHERE pname='$pname'";
 $result_set=mysqli_query($conn,$sql);
 while($row=mysqli_fetch_array($result_set))
 {
  ?>
        
        <?php echo "<b>File Name:</b> ";
        echo $row['file1_abstract'];
        if($row['file1_abstract']==""){
          echo "<i>No file found.</i>";
        }
        else{

        ?>
        <br>
        <a href="uploads/<?php echo $row['file1_abstract'] ?>" target="_blank">Download</a>
        <br><br>
		<form action="approval.php?p=<?php echo $pname ?>&i=<?php echo $ig?>" method="POST">
		<input type="submit" name="approve1" value="Approve"></input>
		<br>
		</form>
        <?php
      }
 }
 ?>

</div>
</div>

<br>

</div>
<div class="column">
<div class="card" style="width: 22rem; border-radius: 20px;">
  <div class="card-body">
<b>Documents:</b>
<br>
<br>
<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
?>
<?php
$conn = mysqli_connect('localhost','student','gnits','project_monitoring');
if(mysqli_connect_errno()){
  echo "Failed to connect ".mysqli_connect_error();
}
?>

 <?php
 $sql= "SELECT * FROM file_upload_1 WHERE pname='$pname'";
 $result_set=mysqli_query($conn,$sql);
 while($row=mysqli_fetch_array($result_set))
 {
  ?>
        
        <?php echo "<b>File Name:</b> ";
        echo $row['file2_documents'];
        if($row['file2_documents']==''){
          echo "<i>No file found.</i>";
        echo "<br>";
        }
        else{
        
         ?>
        <br>
        <a href="uploads/<?php echo $row['file2_documents'] ?>" target="_blank">Download</a>
        <br><br>
		<form action="approval.php?p=<?php echo $pname ?>&i=<?php echo $ig?>" method="POST">
		<input type="submit" name="approve2" value="Approve"></input>
		<br>
		</form>
        <?php
 }
}
 ?>


</div>
</div>
<br>

</div>
<div class="column">
<div class="card" style="width: 22rem; border-radius: 20px;">
  <div class="card-body">
<b>Videos:</b>
<br>
<br>
<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
?>
<?php
$conn = mysqli_connect('localhost','student','gnits','project_monitoring');
if(mysqli_connect_errno()){
  echo "Failed to connect ".mysqli_connect_error();
}
?>

 <?php
 $sql= "SELECT * FROM file_upload_1 WHERE pname='$pname'";
 $result_set=mysqli_query($conn,$sql);
 while($row=mysqli_fetch_array($result_set))
 {
  ?>
        
        <?php echo "<b>File Name:</b> ";
        echo $row['file3_videos'];
        if($row['file3_videos']==''){
          echo "<i>No file found.</i>";
          
        }
        else{


         ?>
        <br>
        <a href="uploads/<?php echo $row['file3_videos'] ?>" target="_blank">Download</a>
        <br><br>
		<form action="approval.php?p=<?php echo $pname ?>&i=<?php echo $ig?>"" method="POST">
		<input type="submit" name="approve3" value="Approve"></input>
		<br>
		</form>

        <?php
 }
}
 ?>


</div>
</div>
</div>
</div>

<br><br>
<div class="s" style="margin-top: 80px;">
<b>Suggestions by Internal Guide:</b><br><br>
<?php
$k=1;
$sq = "SELECT * FROM ig WHERE pname='$pname' AND ig_name='$ig'";
$ans=mysqli_query($con,$sq);
while($r1 = mysqli_fetch_array($ans)){
  if($r1["comments"]==""){
    continue;
  }
  else{
echo $k.". ". $r1["comments"]."<br>";
$k++;
}
}
?>
<br>
</div>



<br>
<div class="s">
<b>Suggestions by PRC:</b><br><br>
<?php
$k=1;
$sq2 = "SELECT * FROM prc_comments WHERE pname='$pname' AND ig_guide='$ig'";
$ans2=mysqli_query($con,$sq2);
while($r2 = mysqli_fetch_array($ans2)){
  if($r2["comments"]==""){
    continue;
  }
  else{
echo $k.". ". $r2["comments"]."<br>";
$k++;
}
}
?>
<br>
</div>


</div>

<b style="margin-left: 80px;">Progress: </b>
<br />
<br />

<?php
$percentage = 0;
$sq = "SELECT * FROM ig WHERE pname='$pname'";
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


/*echo "
    <div style='width:100px; background-color:white; height:30px; border:1px solid #000;'>
    <div style='width:".$percentage."px; background-color:red; height:30px;'></div>
</div>"; */

?>
<br>


<u><b style="margin-left: 80px;">Marks: </b></u>


          

 
<?php 

$i=1;
$sq = "SELECT * FROM employee_table WHERE pname='$pname' AND int_guide='$ig'";
$res=mysqli_query($con,$query);

?>



<?php 

while($row = mysqli_fetch_array($res)){
echo "<br />";
  $tname = $row["name"];
  ?>
  <div class="c" style="margin-left:80px;">
  <?php
  echo $i.". ". $tname." - ". $troll."<br />";
  ?>
</div>
  <?php
  $i++;
  $troll = $row["rollNo"];
  $sqm = "SELECT * FROM employee_table WHERE pname='$pname' AND int_guide='$ig' AND rollNo='$troll'";

$ansm=mysqli_query($con,$sqm);
$rsm = mysqli_fetch_array($ansm);
?>

<table class="table1" style="margin-left: 84px;">
   <thead>
    <tr>
    <th scope="col" style="color: black;
  text-align: center;">PRC1</th>
      <th scope="col"  style="color: black;
  text-align: center;">PRC2</th>
      <th scope="col"  style="color: black;
  text-align: center;">PRC3</th>
      
    </tr>
  </thead>  
  <tbody>
    <tr>
      <?php
if(mysqli_num_rows($ansm)==0){
  $e=0;
  echo "<td>".$e."</td>";
  echo "<td>".$e."</td>";
  echo "<td>".$e."</td>";
  echo "</tr>";
  echo "</tbody>";
  echo "</table>";
  echo "<br>";
  $sum = 0;
  echo "<h5 style='margin-left: 40px;'>Total Marks: ".$e."/30"."</h5>";
}
else{
echo "<td>".$rsm['marks_prc1']."</td>";
echo "<td>".$rsm['marks_prc2']."</td>";
echo "<td>".$rsm['marks_prc3']."</td>";


echo "</tr>";
echo "</tbody>";
echo "</table>";
echo "<br>";
?>


<div class="c" style="margin-left:80px;">
<?php

$sum = $rsm['marks_prc1']+$rsm['marks_prc2']+$rsm['marks_prc3'];
echo "<h5>Total Marks: ".$sum."/30"."</h5>";
?>
</div>
<?php
}
}

?>


<br>



<div class="comments" style="margin-left: 80px;">

<b>Comments:</b>
<br><br>
<form action="igcomments.php?p=<?php echo $pname?>&i=<?php echo $ig?>" method="POST">
<textarea name="comments" rows="4" cols="50" placeholder="Enter your comments" required></textarea><br><br>
<input type="submit" name="submit_comments" value="Submit" class="submit1"/>




</form>
<br></div>


<br />
<a href="igprofile.php?intid=<?php echo $guide?>"><input type="button" class="back" value="Back"></button></a>



<br /> 
<br /> 
<br /> 
<br /> 

</body>
</html>

