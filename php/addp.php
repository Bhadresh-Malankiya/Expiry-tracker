
<?php
	session_start();
if(!$_SESSION["username"])
	{
		header('location:../index.html');
	}
	else{
	$username=$_SESSION["username"];
	$pname=$_POST["name"];
 	$pcategory=$_POST["category"];	
	if($_POST["quality"]==NULL)$Quantity="empty"; else $Quantity=$_POST["quality"];
	if($_POST["price"]==NULL)$price="empty";else $price=$_POST["price"];
	if($_POST["pdate"]==NULL)$pdate="empty";else $pdate=$_POST["pdate"];
    $pedate=$_POST["pedate"];
    $prdate=$_POST["prdate"];
	$prdate1=$_POST["prdate1"];
	$prdate2=$_POST["prdate2"];
	$prdate3=$_POST["prdate3"];
	$prdate4=$_POST["prdate4"];	
	if($_POST["rdetails"]==NULL)$rdetails="empty"; else $rdetails=$_POST["rdetails"];
	if($_POST["pdescription"]==NULL)$pdesc="empty"; else $pdesc=$_POST["pdescription"];



	$insertquery="INSERT INTO `products`(`username`,`pname`,`pcategory`,`Quantity`,`price`,`pdate`,`pedate`,`prdate`,`prdate1`,`prdate2`,`prdate3`,`prdate4`,  `rdetails`,`pdesc`) VALUES ('$username','$pname','$pcategory','$Quantity','$price','$pdate','$pedate','$prdate','$prdate1','$prdate2','$prdate3','$prdate4','$rdetails','$pdesc')";

	$con = mysqli_connect("localhost","root","","demo");
	if(!$con)
	{
		die("Connot connet to Database :" . mysqli_connect_errno());
	}
	else
	{	
		if(!mysqli_query($con,$insertquery))
		{
			echo "<b> Server is down try after sometimes... </b>".$_SESSION["username"];
		}
		else
		{
			
			include("loader.php");
			header('refresh: 3; url= ../addproducts.php');
		}
		mysqli_close($con);
	}
	}
?>