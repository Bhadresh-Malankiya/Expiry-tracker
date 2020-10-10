
<?php
	session_start();
	$username=$_SESSION["username"];
	$pname=$_POST["name"];
 	$pcategory=$_POST["category"];
	$Quantity=$_POST["quality"];
    $price=$_POST["price"];
    $pdate=$_POST["pdate"];
    $pedate=$_POST["pedate"];
    $prdate=$_POST["prdate"];
	$pdesc=$_POST["pdescription"];

	$insertquery="INSERT INTO `products`(`username`,`pname`,`pcategory`,`Quantity`,`price`,`pdate`,`pedate`,`prdate`,`pdesc`) VALUES ('$username','$pname','$pcategory','$Quantity','$price','$pdate','$pedate','$prdate','$pdesc')";

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
			echo "Product successfully added ";
			echo "<a href='../view.html'>view reminder</a> ";
			echo "YOU WILL REDIRECT TO ADD PRODUCT PAGE IN 3 SECONDS";
			header('refresh: 3; url= ../addproducts.html');
		}
		mysqli_close($con);
	}
?>