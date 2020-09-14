<a href="prcProfile.php"><img class="i" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTM1vvPLvAGM5Hvo5iH3GY_FS05NmVFITPd5sl9ZFOrXMa4xjew&usqp=CAU
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
<link rel="stylesheet" href="prcprodetails.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>

<?php
$pname = $_GET['pn'];
$i=1;
//$pname=$_SESSION['pname'];
//echo $_SESSION['pname'];
//echo $pname;
$query="SELECT * FROM employee_table WHERE pname='$pname'";
$res=mysqli_query($con,$query);
echo "<table border='1' class='table1'>
<tr>
<th></th>
<th></th>
</tr>";
echo "<tr>";
echo "<td>Team members</td>";

// while($row = mysqli_fetch_array($res)){
//       $tname = $row["name"];
//       $troll = $row["rollNo"];
//       echo "<td>".$i.". ". $tname." - ". $troll."</td>";
//       echo "<td></td>";
//       $i++; 
//   }
//   echo "</tr>";

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
echo"</table>";
?>





<div class="container">

<b><u>Abstract:</u></b>
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
        <br>
        <?php
 }
}
 ?>



<br>



<b><u>Documents:</u></b>
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
        <br>
        <?php
 }
}
 ?>



<br>


<b><u>Videos:</u></b>
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
        <br>
        <?php
 }
}
 ?>


<br><br>
<div class="s">
<b><u>Suggestions by Internal Guide:</u></b><br><br>
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
<b><u>Suggestions by PRC:</u></b><br><br>
<?php
$k=1;
$sq1 = "SELECT * FROM prc_comments WHERE pname='$pname' AND ig_guide='$ig'";
$ans1=mysqli_query($con,$sq1);
while($r2 = mysqli_fetch_array($ans1)){
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






<b style="margin-left: 2px;">Progress: </b>



<?php
$percentage = 0;
$sq = "SELECT * FROM ig WHERE pname='$pname'";
$ans1 = mysqli_query($con, $sq);
$r3 = mysqli_fetch_array($ans1);
$r4 = mysqli_num_rows($ans1); 
$abs = $r3["appdisapp_abs"];
$doc = $r3["appdisapp_doc"];
$vid = $r3["appdisapp_vid"];
if($r4!=0){
if($abs==1 & $doc==1 & $vid==1){
  $percentage = 100;
}
elseif($abs==1 & $doc==1){
  $percentage = 50;
}
elseif($abs==1){
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
<br>

<b>Comments:</b>
<br><br>
<form action="prc_comments.php?p=<?php echo $pname?>&i=<?php echo $ig?>" method="POST">
<textarea name="comments" rows="4" cols="50" placeholder="Enter your comments" required></textarea><br><br>
<input type="submit" name="submit_comments" class="submit1"/>
</form>





<u><b>Marks: </b></u>

<!-- <table class="table">
   <thead class="thead-light">
    <tr>
      <th scope="col">Team members</th>
      <th scope="col">PRC1</th>
      <th scope="col">PRC2</th>
      <th scope="col">PRC3</th>
      
    </tr>
  </thead>  
  <tbody>
    <tr>
      <th scope="row"></th>  -->



<?php 

$i=1;
$sq = "SELECT * FROM employee_table WHERE pname='$pname' AND int_guide='$ig'";
$res=mysqli_query($con,$query);

?>



<?php 

while($row = mysqli_fetch_array($res)){
echo "<br />";
  $tname = $row["name"];
  echo $i.". ". $tname." - ". $troll."<br />";
  $i++;
  $troll = $row["rollNo"];
  $sqm = "SELECT * FROM employee_table WHERE pname='$pname' AND int_guide='$ig' AND rollNo='$troll'";

$ansm=mysqli_query($con,$sqm);
$rsm = mysqli_fetch_array($ansm);
?>
<table class="table">
   <thead class="thead-light">
    <tr>
      <th scope="col"></th>
      <th scope="col">PRC1</th>
      <th scope="col">PRC2</th>
      <th scope="col">PRC3</th>
      
    </tr>
  </thead>  
  <tbody>
    <tr>
      <th scope="row"></th> 
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

$sum = $rsm['marks_prc1']+$rsm['marks_prc2']+$rsm['marks_prc3'];
echo "<h5>Total Marks: ".$sum."/30"."</h5>";

}
}

?> 












<br>
  <b>Marks for PRC1(out of 10):</b> 
    <!-- <input type="number" name="marks1" min="1" max="10" required> -->
  <br />
  <?php 
    $pname = $_GET['pn'];
    $i=1;
    $query1="SELECT * FROM employee_table WHERE pname='$pname'";
    $res1=mysqli_query($con,$query);
    while($row = mysqli_fetch_array($res1)){
      $tname = $row["name"];
	    $troll = $row["rollNo"];
      echo $i.". ". $tname." - ". $troll;
      $i++;
      $_SESSION['troll'] = $troll;
      ?>
      <form 
      action="prc_marks.php?p=<?php echo $pname?>&i=<?php echo $ig?>&roll=<?php echo $troll ?>" method="POST"
      >
      <input type="number" name="marks1" min="1" max="10">
      <input type="submit" name="submit_marks_1">
      </form>
      <?php
  
}
  ?>
  
<br />
<b>Marks for PRC2(out of 10):</b> 
  <br />
  <?php 
    $pname = $_GET['pn'];
    $i=1;
    $query1="SELECT * FROM employee_table WHERE pname='$pname'";
    $res1=mysqli_query($con,$query);
    while($row = mysqli_fetch_array($res1)){
      $tname = $row["name"];
	    $troll = $row["rollNo"];
      echo $i.". ". $tname." - ". $troll;
      $i++;
      $_SESSION['troll'] = $troll;
      ?>
  <form action="prc_marks.php?p=<?php echo $pname?>&i=<?php echo $ig?>&roll=<?php echo $troll ?>" method="POST">
    <input type="number" name="marks2" min="1" max="10" required>
    <input type="submit" name="submit_marks_2">
  </form>
  <?php
      
}
  ?>

<br />
<b>Marks for PRC3(out of 10):</b> 
  <br />
  <?php 
    $pname = $_GET['pn'];
    $i=1;
    $query1="SELECT * FROM employee_table WHERE pname='$pname'";
    $res1=mysqli_query($con,$query);
    while($row = mysqli_fetch_array($res1)){
      $tname = $row["name"];
	    $troll = $row["rollNo"];
      echo $i.". ". $tname." - ". $troll;
      $i++;
      $_SESSION['troll'] = $troll;
      // echo "<br />";
      ?>

  <form action="prc_marks.php?p=<?php echo $pname?>&i=<?php echo $ig?>&roll=<?php echo $troll ?>" method="POST">
    <input type="number" name="marks3" min="1" max="10" required>
    <input type="submit" name="submit_marks_3">
</form>
<?php
      // echo "<br />";
      // echo "<br />";
}
  ?>
<!-- <br><br> -->




</body>
</html>

