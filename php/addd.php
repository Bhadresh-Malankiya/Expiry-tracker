
<?php
	session_start();
	$username=$_SESSION["username"];
	$dname=$_POST["name"];
 	$dcategory=$_POST["category"];
    $idate=$_POST["idate"];
    $dedate=$_POST["dedate"];
    $drdate=$_POST["drdate"];
	$ddesc=$_POST["ddescription"];

	$insertquery="INSERT INTO `documents`(`username`, `dname`, `dcategory`, `idate`, `dedate`, `drdate`, `ddesc`) VALUES ('$username','$dname','$dcategory','$idate','$dedate','$drdate','$ddesc')";

	$con = mysqli_connect("localhost","root","","demo");
	if(!$con)
	{
		die("Connot connet to Database :" . mysqli_connect_errno());
	}
	else
	{	
		if(!mysqli_query($con,$insertquery))
		{
			echo "<b> Server is down try after sometimes... Mr.</b>".$_SESSION["username"];
		}
		else
		{
			echo "Document successfully added ";
			echo "<a href='../view.html'>view reminder</a> ";
			echo "YOU WILL REDIRECT TO ADD DOCUMENT PAGE IN 3 SECONDS";
			header('refresh: 3; url= ../adddocuments.html');
		}
		mysqli_close($con);
	}
?>