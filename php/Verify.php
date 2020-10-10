<?php
	$username=$_POST["uname"];
	$password=$_POST["password"];

	$query = " Select * from users where username = '$username' and password= '$password'" ;

	$con = mysqli_connect("localhost","root","","demo");
	if(!$con)
	{
		die("Connt connet to Database");
	}
	else
	{	
	
		if($result = mysqli_query($con, $query))
		{	
			
			if(mysqli_num_rows($result) > 0)
			{	
				
				
				while($row = mysqli_fetch_array($result)){
					
					session_start();
					$_SESSION['username']=$username;
					header('refresh: 3; url=../addproducts.html');
					
				}
			}
			else
			{
				echo "Incorrect username or pasword ";
				echo "Redirect in 3 Seconds";	
				header('refresh: 3; url=../login.html');
			
			}
		}
		else{
		  mysqli_close($con);;
		}
	}
		

?>