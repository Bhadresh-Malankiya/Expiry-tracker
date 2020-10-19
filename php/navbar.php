<?php
session_start()
?>
<html>
<head>
	 <link rel="stylesheet" href="../fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	</head>
<body>
<div class="navbar">
<p > <a href="../Expirytracker/index.html" >Expiry Tracker</a></p>

	<?php 
	echo " <p>Welcome ,".$_SESSION["username"]."</p>";
	?>
<a href='php/logout.php'>Logout</a>	
<a href="../Expirytracker/view.php">View Reminder </a>
<a href="../Expirytracker/category.php">Category</a>
<a href="../Expirytracker/adddocuments.php">Add Documents</a>
<a href="../Expirytracker/addproducts.php">Add Products</a>
</div>
	</body>
</html>
<?php?>