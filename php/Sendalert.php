<?php
$con=mysqli_connect("localhost","root","","demo");
if(!$con)
{
	die("Can not connect to database");
}
else
{
	$queryp = mysqli_query($con,"select * from products where prdate = current_date");
	$queryd = mysqli_query($con,"select * from documents where drdate = current_date");
	
	while($row = mysqli_fetch_assoc($queryp))
	{
		$result1[]=$row;
	}
	while($row = mysqli_fetch_assoc($queryd))
	{
		$result2[]=$row;
	}
		foreach($result1 as $rec1)
		{	
			$username1= $rec1['username'];
			$querymail1 = mysqli_query($con,"select email from users left join products on(users.username=products.username) where users.username = '$username1'");
			$row1 = mysqli_fetch_row($querymail1);
			$to_email1 = $row1[0];
			$subject1 = "ALERT REMINDER DATE TRIGGERED FOR :".$rec1['pname'];
			$body1 = 
			"<b><h1><div color='#ffffff'>			
			Hello Mr.".$rec1['username'].
				"</b></h1><h2>
				Your Product Name :<b>".$rec1['pname'].
				"</b>
				From category :<b>".$rec1['pcategory'].
				"</b>
				having Expirydate :<b>".$rec1['pedate'].
				"</b>
				and Description :<b>".$rec1['pdesc'].
				"</b></h2><h1 >
				It will expires in Few days.</h1></b></div>
				<footer> © all rights reserved by EXPIRY TRACKER</footer>";
			$headers = "From: Notify.expirytracker@gmail.com";
			mail($to_email1, $subject1, $body1, $headers);
		}
		foreach($result2 as $rec2)
		{
			$username2= $rec2['username'];
			$querymail2 = mysqli_query($con,"select email from users left join documents on(users.username=documents.username) where users.username = '$username2'");
			$row2 = mysqli_fetch_row($querymail2);
			$to_email2 = $row2[0];
			$subject2 = "ALERT REMINDER DATE TRIGGERED FOR :".$rec2['dname'];
			$body2 =  
			"<div color='#FFFFFF'><b><h1 >			
			Hello Mr.".$rec2['username'].
				"</b></h1><h2 >
				Your Document Name :<b>".$rec2['dname'].
				"</b>
				From category :<b>".$rec2['dcategory'].
				"</b>
				having Due date :<b>".$rec2['dedate'].
				"</b>
				 and Description :<b>".$rec2['ddesc'].
				"</b></h2><h1 >
				It will expires in Few days.</h1></b></div>
				<footer> © all rights reserved by EXPIRY TRACKER</footer>";
			$headers = "From: Notify.expirytracker@gmail.com";
			mail($to_email2, $subject2,$body2, $headers);
		}
	mysqli_close($con);
}
?>