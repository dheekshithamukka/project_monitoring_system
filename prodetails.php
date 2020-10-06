<a href="stdprofile.php" style="background: linear-gradient(120deg,#a8c0ff, #eaafc8);"><img class="i" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTM1vvPLvAGM5Hvo5iH3GY_FS05NmVFITPd5sl9ZFOrXMa4xjew&usqp=CAU
"
/></a>


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
<link rel="stylesheet" href="prodetails2.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body style="background: linear-gradient(120deg, #FFAFBD, #ffc3a0)">
<?php
$pname = $_GET['pn'];
$roll = $_GET['roll'];
$i=1;

$query="SELECT * FROM employee_table WHERE pname='$pname'";
$res=mysqli_query($con,$query);
echo "<table border='3'>

";

echo "<td>TEAM MEMBERS</td>";
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
echo "<hl />";

}
echo "<hl />";
echo "</td>";
$q = "SELECT * FROM employee_table WHERE pname='$pname'";
$r = mysqli_query($con,$q);
$rs = mysqli_fetch_array($r);
echo "<tr>";
echo "<td><b>PROJECT NAME </b></td>";
echo "<td>".$pname."</td>";
echo "</tr>";
echo "<tr>";
echo "<td><b>PROJECT DOMAIN </b></td>";
echo "<td>".$rs['pdomain']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td><b>TYPE OF PROJECT </b></td>";
echo "<td>".$rs['ptype']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td><b>INTERNAL GUIDE </b></td>";
echo "<td>".$rs['int_guide']."</td>";
echo "</tr>";

$ig = $rs['int_guide'];
//echo $ig;
$_SESSION['ig'] = $ig;
//echo $_SESSION['ig'];
echo "</table>";

?>


<div class="container">
<div class="row">
<!--<form action="filesLogic.php?pn1=<?php //echo $pname ?>" method="post" enctype="multipart/form-data" >
          <h3>Upload Abstract</h3>
          <input type="file" name="myfile"> <br>
          <button type="submit" name="submit">upload</button>
        </form>-->



<?php

$s = "SELECT * FROM deadlines";
$r1 = mysqli_query($con,$s);
$rs1 = mysqli_fetch_array($r1);
$deadline = $rs1['abstract'];
// echo $deadline;
if(date("Y-m-d")<=$deadline){
  ?>
  <div class="column">
  <div class="card" style="width: 22rem; border-radius: 20px;">
  <div class="card-body">
<form action="upload1.php?pn1=<?php echo $pname ?>" method="post" enctype="multipart/form-data">
   <h4>Upload Abstract</h4>
<input type="file" name="file" />
<button type="submit" name="submit" style="font-size: 12px; margin-left: -40px;">Upload</button>
</div>
</div>
<br />

<marquee><b><i>Upload on or before <?php echo $deadline; ?></i></b></marquee>
<br />
<?php
}
?>
</form>
</div>


<?php
$s = "SELECT * FROM deadlines";
$r1 = mysqli_query($con,$s);
$rs1 = mysqli_fetch_array($r1);
$deadline = $rs1['documents'];
if(date("Y-m-d")<=$deadline){
  ?>
  <div class="column">
  <div class="card" style="width: 22rem; border-radius: 20px;">
  <div class="card-body">
<form action="upload2.php?pn2=<?php echo $pname?>" method="post" enctype="multipart/form-data">
   <h4>Upload Documents</h4>
<input type="file" name="file" />
<button type="submit" name="submit" style="font-size: 12px; margin-left: -40px;">Upload</button>
</div>
</div>
<br />
<marquee><b><i>Upload on or before <?php echo $deadline; ?></i></b></marquee>
<br />
<?php 
}
?>
</form>
</div>


<?php
$s = "SELECT * FROM deadlines";
$r1 = mysqli_query($con,$s);
$rs1 = mysqli_fetch_array($r1);
$deadline = $rs1['videos'];
if(date("Y-m-d")<=$deadline){
  ?>
  <div class="column">
  <div class="card" style="width: 22rem; border-radius: 20px;">
  <div class="card-body">
<form action="upload3.php?pn3=<?php echo $pname?>" method="post" enctype="multipart/form-data">
   <h4>Upload Videos</h4>
<input type="file" name="file" />
<button type="submit" name="submit" style="font-size: 12px; margin-left: -40px;">Upload</button>
</div>
</div>
<br />
<marquee><b><i>Upload on or before <?php echo $deadline; ?> </i></b></marquee>
<br />
<?php 
}
?>
</form>
</div>


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

<b><h5 style="margin-left: 80px;">Progress:</h5></b><br>

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
echo "<br>";
echo "<br>";

}


elseif($percentage==50)
{
  echo "<div class=\"progress\">
  <div class=\"progress-bar progress-bar-striped progress-bar-animated bg-warning\" role=\"progressbar\" aria-valuenow=\"50\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 50%\">50% complete</div>
</div>";
echo "<br>";
echo "<br>";
echo "<br>";

}


elseif($percentage==100){
 echo "<div class=\"progress\">
  <div class=\"progress-bar progress-bar-striped progress-bar-animated bg-success\" role=\"progressbar\" aria-valuenow=\"100\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 100%\">100% complete</div>
</div>";
echo "<br>";
echo "<br>";
echo "<br>";

}

?>









<?php

$app = "SELECT approve FROM prcreg";
$ans = mysqli_query($con, $app);
while($row = mysqli_fetch_array($ans)){
  $approve = $row['approve'];
  if($approve==1){
?>
<h3 style="margin-left: 80px;">Marks: </h3>
<?php

    $anotherApp = "SELECT marks_prc1, marks_prc2, marks_prc3 FROM employee_table WHERE pname='$pname' AND rollNo='$roll'";
    $ans1 = mysqli_query($con, $anotherApp);
    $rsm = mysqli_fetch_array($ans1);
    $prc1 = $rsm['marks_prc1'];
    $prc2 = $rsm['marks_prc2'];
    $prc3 = $rsm['marks_prc3'];
    ?>

<table class="table1" style="margin-left: 84px;">
   <thead>
    <tr>
      <!-- <th scope="col"></th> -->
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
      <!-- <th scope="row"></th>  -->
<?php
echo "<td>".$prc1."</td>";
echo "<td>".$prc2."</td>";
echo "<td>".$prc3."</td>";

echo "</tr>";
echo "</tbody>";
echo "</table>";
echo "<br>";

$sum = $prc1+$prc2+$prc3;
echo "<h5 style=\"margin-left: 80px;\">Total Marks: ".$sum."/30"."</h5>";


  }
}




?>


<br />
<br />
<br />





<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
