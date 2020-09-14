<?php
$con = mysqli_connect('localhost','student','gnits','project_monitoring');
if(mysqli_connect_errno()){
  echo "Failed to connect ".mysqli_connect_error();
}
session_start();
?>
<html>
<head>
<link rel="stylesheet" href="table4.css">
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
echo "<table border='1' >
<tr>
<th></th>
<th></th>
</tr>";
echo "<tr>";
echo "<td>Team members</td>";
while($row = mysqli_fetch_array($res)){
      $tname = $row["name"];
      $troll = $row["rollNo"];
      echo "<td>".$i.". ". $tname." - ". $troll."</td>";
      echo "<td></td>";
      $i++; 
  }
  echo "</tr>";
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
?>


<b>Abstract</b>
<?php include 'filesDownload.php';?>
<?php foreach ($files as $file): ?>
    <?php echo $file['id']; ?>
    <a href="filesDownload.php?file_id=<?php echo $file['id'] ?>">Download</a>
<?php endforeach;?>







<br><br>
<div class="s">
<b>Suggestions by Internal Guide:</b><br><br>
<?php
$k=1;
$sq = "SELECT * FROM ig WHERE pname='$pname' AND ig_name='$ig'";
$ans=mysqli_query($con,$sq);
while($r1 = mysqli_fetch_array($ans)){
echo $k.". ". $r1["comments"]."<br>";
$k++;
}
?>
<br>
</div>


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
echo "
    <div style='width:100px; background-color:white; height:30px; border:1px solid #000;'>
    <div style='width:".$percentage."px; background-color:red; height:30px;'></div>
</div>"

?>


</body>
</html>

