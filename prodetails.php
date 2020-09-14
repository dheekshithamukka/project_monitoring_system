<a href="stdprofile.php"><img class="i" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTM1vvPLvAGM5Hvo5iH3GY_FS05NmVFITPd5sl9ZFOrXMa4xjew&usqp=CAU
"/></a>

<?php
$con = mysqli_connect('localhost','student','gnits','project_monitoring');
if(mysqli_connect_errno()){
	echo "Failed to connect ".mysqli_connect_error();
}
session_start();
?>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="prodetails1.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
<?php
$pname = $_GET['pn'];
$i=1;

$query="SELECT * FROM employee_table WHERE pname='$pname'";
$res=mysqli_query($con,$query);
echo "<table border='1'>
<tr>
<th></th>
<th></th>
</tr>";

echo "<td>Team members</td>";
// while($row = mysqli_fetch_array($res)){
//   echo "<tr>";
//       echo "<td></td>";
// 	    $tname = $row["name"];
// 	    $troll = $row["rollNo"];
// 	    echo "<td>".$i.". ". $tname." - ". $troll."</td>";
//       $i++; 
//       echo "</tr>";
// 	}


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
//echo $ig;
$_SESSION['ig'] = $ig;
//echo $_SESSION['ig'];
echo "</table>";

?>



<div class="main">
<!--<form action="filesLogic.php?pn1=<?php //echo $pname ?>" method="post" enctype="multipart/form-data" >
          <h3>Upload Abstract</h3>
          <input type="file" name="myfile"> <br>
          <button type="submit" name="submit">upload</button>
        </form>-->



<?php
$deadline = "15-09-2020";
if(date("d-m-Y")<=$deadline){
  ?>
<form action="upload1.php?pn1=<?php echo $pname ?>" method="post" enctype="multipart/form-data">
   <h4>Upload Abstract</h4>
<input type="file" name="file" />
<button type="submit" name="submit" style="font-size: 12px;">Upload</button>
<br />
<i>Upload on or before 12-09-2020</i>
<br />
<?php
}
?>
</form>


<?php
$deadline = "15-09-2020";
if(date("d-m-Y")<=$deadline){
  ?>
<form action="upload2.php?pn2=<?php echo $pname?>" method="post" enctype="multipart/form-data">
   <h4>Upload Documents</h4>
<input type="file" name="file" />
<button type="submit" name="submit" style="font-size: 12px;">Upload</button>
<br />
<i>Upload on or before 12-09-2020</i>
<br />
<?php 
}
?>
</form>


<?php
$deadline = "15-09-2020";
if(date("d-m-Y")<=$deadline){
  ?>
<form action="upload3.php?pn3=<?php echo $pname?>" method="post" enctype="multipart/form-data">
   <h4>Upload Videos</h4>
<input type="file" name="file" />
<button type="submit" name="submit" style="font-size: 12px;">Upload</button>
<br />
<i>Upload on or before 12-09-2020</i>
<br />
<?php 
}
?>
</form>


<!--<form action="filesLogic1.php?pn2=<?php //echo $pname ?>" method="post" enctype="multipart/form-data" >
          <h3>Upload Documents</h3>
          <input type="file" name="myfile"> <br>
          <button type="submit" name="save1">upload</button>
        </form>-->



<!--<form method="post" action="filesLogic2.php?pn3=<?php //echo $pname ?>" enctype='multipart/form-data'>
  <h3>Upload Videos</h3>
      <input type='file' name='file' /><br>
      <input type='submit' value='Upload' name='but_upload'>
    </form> -->

</div>

<br><div class="ig">
<b>Suggestions by Internal Guide:</b><br><br>
<?php
$k=1;
$s = "SELECT * FROM ig WHERE pname='$pname' AND ig_name='$ig'";
$ans=mysqli_query($con,$s);
while($r1 = mysqli_fetch_array($ans)){
  if($r1["comments"]==""){
    continue;
  }
  else{
echo $k.". ". $r1["comments"]."<br>";
$k++;
}
}
?><br>
</div>




<br>
<div class="prc">
<b>Suggestions by PRC:</b><br><br>
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



<!--<b style="margin-left: 20px;">Progress: </b>-->

<b><h5 style="margin-left: 20px;">Progress:</h5></b><br>

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

</div>";
echo "<br>";

}


elseif($percentage==50)
{
  echo "<div class=\"progress\">
  <div class=\"progress-bar progress-bar-striped progress-bar-animated bg-warning\" role=\"progressbar\" aria-valuenow=\"50\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 50%\">50% complete</div>
</div>";
echo "<br>";

}


elseif($percentage==100){
 echo "<div class=\"progress\">
  <div class=\"progress-bar progress-bar-striped progress-bar-animated bg-success\" role=\"progressbar\" aria-valuenow=\"100\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 100%\">100% complete</div>
</div>";
echo "<br>";

}


/*echo "
    <div style='width:100px; background-color:white; height:30px; border:1px solid #000;'>
    <div style='width:".$percentage."px; background-color:red; height:30px;'></div>
</div>"
*/
?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
