<?php
$con=mysqli_connect('localhost','student','gnits','project_monitoring');
$pname=$_GET['p'];
//echo $pname;
$int_guide=$_GET['i'];
//echo $int_guide;
if(isset($_POST['approve1']))
{
	//echo"abstract";
	$s = "SELECT * FROM ig WHERE pname='$pname' AND ig_name='$int_guide'";
	$rs = mysqli_query($con,$s);
	$rsm = mysqli_fetch_array($rsm);
	if(mysqli_num_rows($rs)==0){
		$sql10="INSERT INTO ig(ig_name,pname,comments,appdisapp_abs,appdisapp_doc,appdisapp_vid) VALUES('$int_guide','$pname','',1,0,0)";
		if(mysqli_query($con,$sql10))
		{
			echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Abstract approved');
		window.location.href = 'igdetails.php?pn=$pname';
		</script>");
		//echo"Abstract approved.";
		}

	}
	else{
	$sql10="UPDATE ig SET appdisapp_abs=1 WHERE pname='$pname' AND ig_name='$int_guide'";
	if(mysqli_query($con,$sql10))
	{
		echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Abstract approved');
		window.location.href = 'igdetails.php?pn=$pname';
		</script>");
		//echo"Abstract approved.";
	}
}
}
if(isset($_POST['approve2']))
{
	//echo"document";
	$s = "SELECT * FROM ig WHERE pname='$pname' AND ig_name='$int_guide'";
	$rs = mysqli_query($con,$s);
	$rsm = mysqli_fetch_array($rsm);
	if(mysqli_num_rows($rs)==0){
		$sql10="INSERT INTO ig(ig_name,pname,comments,appdisapp_abs,appdisapp_doc,appdisapp_vid) VALUES('$int_guide','$pname','',1,0,0)";
		if(mysqli_query($con,$sql10))
		{
			echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Abstract approved');
		window.location.href = 'igdetails.php?pn=$pname';
		</script>");
		//echo"Abstract approved.";
		}

	}else{
		$sql1="UPDATE ig SET appdisapp_doc=1 WHERE pname='$pname' AND ig_name='$int_guide'";

	mysqli_query($con,$sql1);
	echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Documents approved');
		window.location.href = 'igdetails.php?pn=$pname';
		</script>");
	//echo "Documents approved.";
}
}
if(isset($_POST['approve3']))
{
		//echo"videos";
	$s = "SELECT * FROM ig WHERE pname='$pname' AND ig_name='$int_guide'";
	$rs = mysqli_query($con,$s);
	$rsm = mysqli_fetch_array($rsm);
	if(mysqli_num_rows($rs)==0){
		$sql10="INSERT INTO ig(ig_name,pname,comments,appdisapp_abs,appdisapp_doc,appdisapp_vid) VALUES('$int_guide','$pname','',1,0,0)";
		if(mysqli_query($con,$sql10))
		{
			echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Abstract approved');
		window.location.href = 'igdetails.php?pn=$pname';
		</script>");
		//echo"Abstract approved.";
		}

	}
	else{
		$sql2="UPDATE ig SET appdisapp_vid=1 WHERE pname='$pname' AND ig_name='$int_guide'";
mysqli_query($con,$sql2);
echo ("<script LANGUAGE='JavaScript'>
		 window.alert('Videos approved');
		window.location.href = 'igdetails.php?pn=$pname';
		</script>");
}
}

//header("Location:igdetails.php?pn=$pname");
//echo"Project Approved";
?>