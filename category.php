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
		die("Connt connet to Database");
	}
	else{

	$username=$_SESSION["username"];
		
	$pro1 = mysqli_query($con,"SELECT pname FROM `products` WHERE `username` =  '$username' and `prdate` > 'Current_Date' and pcategory = 'Medicines'");
	$pro2 = mysqli_query($con,"SELECT pname FROM `products` WHERE `username` =  '$username' and `prdate` > 'Current_Date' and pcategory = 'Foods'");
	$pro3 = mysqli_query($con,"SELECT pname FROM `products` WHERE `username` =  '$username' and `prdate` > 'Current_Date' and pcategory = 'Groceries'");
	$pro4 = mysqli_query($con,"SELECT pname FROM `products` WHERE `username` =  '$username' and `prdate` > 'Current_Date' and pcategory = 'Custom Product'");
	$doc1 = mysqli_query($con,"SELECT dname FROM `documents` WHERE `username` =  '$username' and `drdate` > 'Current_Date' and dcategory = 'Office Documents'");
	$doc2 = mysqli_query($con,"SELECT dname FROM `documents` WHERE `username` =  '$username' and `drdate` > 'Current_Date' and dcategory = 'Educational'");
	$doc3 = mysqli_query($con,"SELECT dname FROM `documents` WHERE `username` =  '$username' and `drdate` > 'Current_Date' and dcategory = 'Personal'");
	$doc4 = mysqli_query($con,"SELECT dname FROM `documents` WHERE `username` =  '$username' and `drdate` > 'Current_Date' and dcategory = 'Custom Documents'");	
				
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.86, maximum-scale=3.0, minimum-scale=0.86">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category Page</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php
	include('php/navbar.php');
	?>
 <div class="card-container">
  <div class="card">
    <h3 class="title1">Medicines</h3>
    <div class="bar"  >
      <div class="emptybar"></div>
		<div class="filledbar"></div>
		<?php
		$row1 = mysqli_fetch_row($pro1);
		$num = mysqli_num_rows($pro1);
		
		if(!$row1){
			echo "<p>EMPTY</p>";
		}
		else{
			if($num > 5)
			{
				$num = 5;
			}
		for($i=0;$i<$num;$i++){
		echo "<p><b>".$row1[$i]."</p></b>";
		}	
			}
		?>
	 
 </div>
  </div>
  <div class="card">
    <h3 class="title1">Foods</h3>
    <div class="bar">
      <div class="emptybar"></div>
      <div class="filledbar"></div>
	  <?php
		$row2 = mysqli_fetch_row($pro2);
		$num = mysqli_num_rows($pro2);
		
		if(!$row2){
			echo "<p>EMPTY</p>";
		}
		else{
			if($num > 5)
			{
				$num = 5;
			}
		for($i=0;$i<$num;$i++){
		echo "<p><b>".$row2[$i]."</p></b>";
		}	
			}
		?>
    </div>
  </div>
  
	<div class="card">
    <h3 class="title1">Groceries</h3>
    <div class="bar">
      <div class="emptybar"></div>
      <div class="filledbar"></div>
	    <?php
		$row3 = mysqli_fetch_row($pro3);
		$num = mysqli_num_rows($pro3);
		
		if(!$row3){
			echo "<p>EMPTY</p>";
		}
		else{
			if($num > 5)
			{
				$num = 5;
			}
		for($i=0;$i<$num;$i++){
		echo "<p><b>".$row3[$i]."</p></b>";
		}	
			}	
		?>
    </div>
	</div>
	 
	   <div class="card">
    <h3 class="title1">Custom Products</h3>
    <div class="bar">
      <div class="emptybar"></div>
      <div class="filledbar"></div>
	  <?php
		$row4 = mysqli_fetch_row($pro4);
		$num = mysqli_num_rows($pro4);
		
		if(!$row4){
			echo "<p>EMPTY</p>";
		}
		else{
			if($num > 5)
			{
				$num = 5;
			}
		for($i=0;$i<$num;$i++){
		echo "<p><b>".$row4[$i]."</p></b>";
		}	
			}
		?>
    </div>
  </div>
	</div>
	
	
	<div class="card-container" >
<div class="card">
    <h3 class="title1">Office Documents</h3>
    <div class="bar">
      <div class="emptybar"></div>
      <div class="filledbar"></div>
	<?php
		$rowd1 = mysqli_fetch_row($doc1);
		$num = mysqli_num_rows($doc1);
		
		if(!$rowd1){
			echo "<p>EMPTY</p>";
		}
		else{
			if($num > 5)
			{
				$num = 5;
			}
		for($i=0;$i<$num;$i++){
		echo "<p><b>".$rowd1[$i]."</p></b>";
		}	
			}
		?>
    </div>
	</div>
	<div class="card">
    <h3 class="title1">Educational</h3>
    <div class="bar">
      <div class="emptybar"></div>
      <div class="filledbar"></div>
	  <?php
		$rowd2 = mysqli_fetch_row($doc2);
		$num = mysqli_num_rows($doc2);
		
		if(!$rowd2){
			echo "<p>EMPTY</p>";
		}
		else{
			if($num > 5)
			{
				$num = 5;
			}
		for($i=0;$i<$num;$i++){
		echo "<p><b>".$rowd2[$i]."</p></b>";
		}	
			}
		?>
    </div>
    </div>
	
	<div class="card">
    <h3 class="title1">Personal</h3>
    <div class="bar">
      <div class="emptybar"></div>
      <div class="filledbar"></div>
	 <?php
		$rowd3 = mysqli_fetch_row($doc3);
		$num = mysqli_num_rows($doc3);
		
		if(!$rowd3){
			echo "<p>EMPTY</p>";
		}
		else{
			if($num > 5)
			{
				$num = 5;
			}
		for($i=0;$i<$num;$i++){
		echo "<p><b>".$rowd3[$i]."</p></b>";
		}	
			}
		?>
    </div>
	</div>
  
  <div class="card">
    <h3 class="title1">Custom Documents</h3>
    <div class="bar">
      <div class="emptybar"></div>
      <div class="filledbar"></div>
	  <?php
		$rowd4 = mysqli_fetch_row($doc4);
		$num = mysqli_num_rows($doc4);
		
		if(!$rowd4){
			echo "<p>EMPTY</p>";
		}
		else{
			if($num > 5)
			{
				$num = 5;
			}
		for($i=0;$i<$num;$i++){
		echo "<p><b>".$rowd4[$i]."</p></b>";
		}	
			}
		mysqli_close($con);
		?>
    </div>
    </div>
  </div>
   
    
    
<div class="navbar2" >
<p style="text-align: center; margin-bottom: 0pt;"> We hope all your requirements will fullfil with expiry tracker, you can contact us by using below link.</p> 

<a href="https://www.facebook.com/" class="fa fa-facebook"></a> 
<a href="https://twitter.com" class="fa fa-twitter"></a> 
<a href="https://wa.me/917359359602" class="fa fa-whatsapp"></a>
<a href="https://www.instagram.com/" class="fa fa-instagram"></a>
<a href="https://in.pinterest.com" class="fa fa-pinterest"></a>
<p style="clear: left; margin-top: 0pt;"></p> <hr>
<a href="contact%20us.html" >Contact Us OR Feedback</a><br>
<p style="text-align: center;"> © all rights reserved by EXPIRY TRACKER</p><br>

</div>
 
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
<?php	}}
?>