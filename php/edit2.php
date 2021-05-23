	<?php

	session_start();
if(!$_SESSION["username"])
	{
		header('location:index.html');
	}
	else{
		
	$con = mysqli_connect("localhost","root","","demo");
	if(!$con)
	{
		die("Connot connet to Database :" . mysqli_connect_errno());
	}
	else
	{	
				
                     $dname= $_POST['dname'];
		              $dnameold= $_POST['dnameold'];
                    $username= $_SESSION["username"];
				    $dcategory= $_POST['dcategory'];
				    $idate= $_POST['idate'];
				    $dedate= $_POST['dedate'];
	                $drdate0= $_POST['drdate0'];
					$drdate1= $_POST['drdate1'];
					$drdate2= $_POST['drdate2'];
					$drdate3= $_POST['drdate3'];
					$drdate4= $_POST['drdate4'];
				    $ddesc= $_POST['ddesc'];
		
		$flag0=0;$flag1=0;$flag2=0;$flag3=0;$flag4=0;
		

		
		$editquery0=" UPDATE documents SET flag0='$flag0' WHERE
		username= '$username' AND dname='$dnameold'  AND drdate0 !='$drdate0' ";
		
		$editquery1=" UPDATE documents SET flag1='$flag1' WHERE
		username= '$username' AND dname='$dnameold'  AND drdate1 !='$drdate1' ";
		
		$editquery2=" UPDATE documents SET flag2='$flag2' WHERE
		username= '$username' AND dname='$dnameold'  AND drdate2 !='$drdate2' ";
		
		$editquery3=" UPDATE documents SET flag3='$flag3' WHERE
		username= '$username' AND dname='$dnameold'  AND drdate3 !='$drdate3' ";
		
		$editquery4=" UPDATE documents SET flag4='$flag4' WHERE
		username= '$username' AND dname='$dnameold'  AND drdate4 !='$drdate4' ";
		
		$editquery=" UPDATE documents SET dname='$dname', dcategory='$dcategory',idate='$idate', dedate='$dedate', drdate0='$drdate0',  drdate1='$drdate1', drdate2='$drdate2', drdate3='$drdate3', drdate4='$drdate4',ddesc='$ddesc' WHERE
		username= '$username' AND dname='$dnameold'  AND idate='$idate' ";
		
		mysqli_query($con, $editquery0);
		mysqli_query($con, $editquery1);
		mysqli_query($con, $editquery2);
		mysqli_query($con, $editquery3);
		mysqli_query($con, $editquery4);
		
		if(!mysqli_query($con, $editquery))
		{
			echo "<b> Server is down try after sometimes... </b>";
		}
		else
		{
			
			include('loader.php');
			header('refresh: 3; url=http://localhost/Expirytracker/search/sname.php');
		}
		mysqli_close($con);
	}
	
	}
	
	?>