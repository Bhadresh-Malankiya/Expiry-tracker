<?php?>
<div class="navbar">
<p style="margin-top: -45px; float:left;">
	<img src="../title.png" width="250px" height="20px"> </p>


<a class="ahover" href="http://localhost/Expirytracker/php/logout.php">Logout</a>	
<div class="dropdown">
    <a class="dropbtn">View  </a>
    <div style="margin-top: 55px;" class="dropdown-content">
		<a style="text-align: left; margin-top: 0px;" href="http://localhost/Expirytracker/view/vexpirydate.php">Expirydate </a></br>
		<a style="text-align: left; margin-top: 0px;" href="http://localhost/Expirytracker/view/vcategory.php">Category </a></br>
    
      <a style="text-align: left; margin-top: 0px;" href="http://localhost/Expirytracker/view/vreminderdate.php">Reminder date</a></br>
	  <a style="text-align: left;  margin-top: 0px;"href="http://localhost/Expirytracker/view/vexpired.php">Expired</a></br>
		  <a style="text-align: left;  margin-top: 0px;"href="http://localhost/Expirytracker/view/vexpired_reminder.php">expired reminder</a></br>

    </div>
  </div> 
	<div class="dropdown">
    <a class="dropbtn">Search  </a>
    <div style="margin-top: 55px;" class="dropdown-content">
		<a style="text-align: left; margin-top: 0px;" href="http://localhost/Expirytracker/search/sname.php">Name </a></br>
		<a style="text-align: left; margin-top: 0px;" href="http://localhost/Expirytracker/search/scategory.php">Category </a></br>
    
      <a style="text-align: left; margin-top: 0px;" href="http://localhost/Expirytracker/search/sreminderdate.php">Reminderdate</a></br>
	  <a style="text-align: left;  margin-top: 0px;"href="http://localhost/Expirytracker/search/sexpirydate.php">Expirydate</a></br>
    </div>
  </div> 
<a  class="ahover" id="addDocumentBtn" onClick=addDocument() name="addDocument" href="#">Add Documents</a>
<a class="ahover" id="addProductBtn"  name="addProduct" onClick=addProduct() href="#">Add Products</a>
</div>

<style>
.addDocumentForm,.addProductForm{
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.6); /* Black w/ opacity */
}

/* Modal Content */
.formContent {
  background-color: rgba(0,0,0,0.4);
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: auto;
}

/* The Close Button */
.closeD,.closeP {
  color: #aaaaaa;
  float: right;
  padding-right: 10px;;
  font-size: 30px;
  font-weight: bold;
}

.closeD:hover,.closeD:focus,.closeP:hover,.closeP:focus {
  color: red;
  text-decoration: none;
  cursor: pointer;
}	
	body{	
	overflow: auto;
	}
</style>
<div id="addDocumentForm" class="addDocumentForm">
	<div class="formContent">
	    <div class="container"  style="margin-top:135px; margin-bottom:25px;">
			<span class="closeD" >&times;</span>
                <div class="signup-content">
					
                    <form action="http://localhost/Expirytracker/php/addd.php" method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">ADD DOCUMENTS</h2>
                        <hr>
						<div class="form-group"><p><b>Enter Name of document</b><b style="color:red;" > *</b></p>
                            <input type="text" class="form-input" name="name" id="name" style="background-color: #FFFFFF; padding: 12px;" placeholder="document Name" required/>
                        </div>
                        <div class="form-group"><p><b>Enter category of document</b><b style="color:red;" > *</b></p>
                            <select class="form-input" name="category" required>
								  <option value="">Select Category</option>
								  <option value="Office Documents">Office Documents</option>
								  <option value="Educational">Educational</option>
						          <option value="Personal">Personal</option>
								<option value="Custom Documents">Custom Documents</option>
							</select>
                        </div>

                        
                        <div class="form-group"><p><b>Enter issue Date</b></p>
                        <input type="date" class="form-input" name="idate" />
                        </div>
                       <div class="form-group"> <p><b>Enter expiry Date</b><b style="color:red;" > *</b></p>
                           <input type="date" class="form-input" name="dedate" required/>
                       </div>
                       <div class="form-group"> <p><b>set reminder</b><b style="color:red;" > *</b></p>
						  <input type="date" class="form-input" name="drdate0" required/>
						   <p id="adddateD1"></p>
						   <p id="adddateD2"></p>
						   <p id="adddateD3"></p>
						   <p id="adddateD4"></p>
						   <p id="maxadddate">
						   <input type="button"  class="form-submit" onclick = "adddateD()" value="+" ></p>
						   <script>
							   var i = 1;
							   function adddateD() {  	
								    document.getElementById("adddateD"+ i).innerHTML="<input type='date' class='form-input' name='drdate" + i + "' '/>";
								   	i++;
								   if(i == 5){
									   document.getElementById("maxadddateD").innerHTML="";
								   }
							   }</script>
                       </div>
						
                        <div class="form-group"><p><b>Enter description about document</b></p>
                        <input type="text" class="form-input" name="ddescription" placeholder="Decription" Value="Empty"/>
                        </div>
                        
 
                        <div class="form-group" style="margin-bottom:20px;">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="ADD DOCUMENTS"/>
                        </div>
                    </form>
                </div>
            </div>
		</div>
</div>

<script>
// JavaScript Document
	function addDocument() {
	    document.getElementById("addProductForm").style.display = "none";
		var modalD = document.getElementById("addDocumentForm");
		var spanD = document.getElementsByClassName("closeD")[0];
		modalD.style.display = "block";
		
		spanD.onclick = function() {
			modalD.style.display = "none";
			
		}
		window.onclick = function() {
			if(event.target == modalD) {
			modalD.style.display = "none";
			
		}
		}
	}
	
</script>


<div id="addProductForm" class="addProductForm">
	<div class="formContent">
<div class="container" style="margin-top:135px; margin-bottom:25px;">
	<span class="closeP" >&times;</span>
                <div class="signup-content">
                    <form action="http://localhost/Expirytracker/php/addp.php" method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">ADD PRODUCTS</h2>
						<hr> <div class="form-group"><p><b>Enter Name of product</b><b style="color:red;" > *</b></p>
                            <input type="text" class="form-input" name="name" id="name" placeholder="Product Name" required/>
                        </div>
                        <div class="form-group"><p><b>Enter category of product</b><b style="color:red;" > *</b></p>
							<select class="form-input" name="category" required>
								  <option value="">Select Category</option>
								  <option value="Medicines">Medicines</option>
								  <option value="Foods">Foods</option>
								  <option value="Groceries">Groceries</option>
								  <option value="Custom Product">Custom Product</option>
							</select>
                        </div>
                        <div class="form-group"><p><b>Enter Quantity of product</b></p>
                        <input type="text" class="form-input" name="quality"  placeholder=" Quantity"/>
                        </div>
                        <div class="form-group"><p><b>Enter price of product</b></p>
                        <input type="text" class="form-input" name="price"  placeholder="Price"/>
                        </div>
                        <div class="form-group"><p><b>Enter purchase Date</b></p>
                        <input type="date" class="form-input" name="pdate" />
                        </div>
                       <div class="form-group"> <p><b>Enter Expiry Date</b><b style="color:red;" > *</b></p>
                           <input type="date" class="form-input" name="pedate" required/>
                       </div>
                       <div class="form-group" > <p><b>set reminder At least 1 is required Up to 5</b><b style="color:red;" > *</b></p>
                           <input type="date" class="form-input" name="prdate0" required/>
						   <p id="adddateP1"></p>
						   <p id="adddateP2"></p>
						   <p id="adddateP3"></p>
						   <p id="adddateP4"></p>
						   <p id="maxadddateP">
						   <input type="button"  class="form-submit" onclick = "adddateP()" value="+" ></p>
						   <script>
							   var i = 1;
							   function adddateP() {  	
								    document.getElementById("adddateP"+ i).innerHTML="<input type='date' class='form-input' name='prdate" + i + "' '/>";
								   	i++;
								   if(i == 5){
									   document.getElementById("maxadddateP").innerHTML="";
								   }
							   }</script>

                       </div>
						
						 <div class="form-group"><p><b>Retailer details</b></p>
                        <input type="text" class="form-input" name="rdetails" placeholder="Retailer details"/>
                        </div>
						
                        <div class="form-group"><p><b>Enter description about product</b></p>
                        <input type="text" class="form-input" name="pdescription" placeholder="Dscription" />
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="ADD PRODUCT"/>
                        </div>
                    </form>
                </div>
            </div>
	</div>
	</div>


<script>

function addProduct() {
	document.getElementById("addDocumentForm").style.display = "none";
	
		var modalP = document.getElementById("addProductForm");
		var spanP = document.getElementsByClassName("closeP")[0];
		
		modalP.style.display = "block";
		
		spanP.onclick = function() {
			modalP.style.display = "none";
			
		}
		
		window.onclick = function(event) {
			if (event.target == modalP ) {
				modalP.style.display = "none";
				
				
			}
		}
		
}

</script> 
<?php?>