<?php
error_reporting (E_ALL ^ E_NOTICE);
$con=mysqli_connect("localhost","root","","demo");
if(!$con)
{
	die("Can not connect to database");
}
else
{
	$today = date('d:m:y');

	$queryp = mysqli_query($con,"select * from products where prdate0 = current_date  AND flag0=0 OR prdate1 = current_date  AND flag0=0 OR prdate2  = current_date  AND flag2=0 OR prdate3 = current_date  AND flag3=0 OR prdate4 = current_date  AND flag4=0");
	$queryd = mysqli_query($con,"select * from documents where drdate0 = current_date AND flag0=0 OR drdate1 = current_date AND flag1=0 OR drdate2 = current_date AND flag2=0 OR drdate3 = current_date AND flag3=0 OR drdate4 = current_date AND flag4=0");	
	
	$querypold = mysqli_query($con,"select * from products where prdate0 < current_date AND flag0=0 OR prdate1 < current_date AND flag1=0 OR prdate2 < current_date AND flag2=0 OR prdate3 < current_date AND flag3=0 OR prdate4 < current_date AND flag4=0");
	$querydold = mysqli_query($con,"select * from documents where drdate0 < current_date AND flag0=0 OR drdate1 < current_date AND flag1=0 OR drdate2 < current_date AND flag2=0 OR drdate3 < current_date AND flag3=0 OR drdate4 < current_date AND flag4=0");	
	
	$result1=array();
	$result2=array();
	$count=0;
	while($row = mysqli_fetch_assoc($queryp))
	{
		$result1[]=$row;
	}
	while($row = mysqli_fetch_assoc($querypold))
	{
		$result1[]=$row;
	}
	while($row = mysqli_fetch_assoc($queryd))
	{
		$result2[]=$row;
	}
	while($row = mysqli_fetch_assoc($querydold))
	{
		$result2[]=$row;
	}
	if (empty($result1))
	{
    	echo "their is no product having todays reminder date.</br>";
	}
	else
	{
		foreach($result1 as $rec1)
		{	
			if(!is_null($rec1['prdate1']))
									   {
										   if($rec1['prdate0']!=='0000-00-00' )
										   {
											  $prdates[]= $rec1['prdate0'];

											  if($rec1['prdate1']!=='0000-00-00'  )
											   {
												   $prdates[]= $rec1['prdate1'];;

												   if($rec1['prdate2']!=='0000-00-00')
													{
														 $prdates[]= $rec1['prdate2'];;

													   if($rec1['prdate3']!=='0000-00-00')
														{
															  $prdates[]= $rec1['prdate3'];;

															if($rec1['prdate4']!=='0000-00-00')
															{
															  $prdates[]= $rec1['prdate4'];;

															}
														}
													}
											   }
									     }
									   }
			
			$username1= $rec1['username'];
			$querymail1 = mysqli_query($con,"select email from users left join products on(users.username=products.username) where users.username = '$username1'");
			$row1 = mysqli_fetch_row($querymail1);
			$to_email1 = $row1[0];
			$subject1 = "Alert your product going to expire";
			$body1='
			<div color="#FFFFFF">Hey <b>'.$rec1['username'].',
				</b></br><p style="text-align: justify; text-justify: inter-word;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You got this mail from expiry tracker because your added product is going to expire. That product name is <b>'.$rec1['pname'].'</b> and its expiry date is <b>'.$rec1['pedate'].'</b> so teck required action for it. More information about the product is mentioned below, so check out the details in this mail.</p>
				
		    <table   style="table-layout:fixed; width: 500px; word-wrap: break-word;" border="1";>
           <tr>
				<th   style="width: 40%;">Attribute</th>
				<th   style="width: 60%;"><b> Value</b></th>			
		    </tr>
		         
            <tr>
				<td >Product Name :</td>
				<td style="word-wrap: break-word;"><b> '.$rec1['pname'].'</b></td>			
		    </tr>
				
		    <tr>	
		        <td>Category :</td><td>
				<b>'.$rec1['pcategory'].' </b></br></td> 				
			</tr>
			
			<tr> 
			    <td>Expiry date :</td>
				<td><b>'.$rec1['pedate'].'</b></td>
			</tr>
			
			<tr>
				<td>reminder dates :</td>
				<td><b>'.$prdates['0'].' '.$prdates['1'].' '.$prdates['2'].' '.$prdates['3'].' '.$prdates['4'].'</b></br></td>
			</tr>
			
			<tr>
				<td>Purchase date :</td>
				<td><b>'.$rec1['pdate'].'</b></br></td>
			</tr>
			
			
			<tr> 
                <td>price :</td>
				<td><b>'.$rec1['price'].'</b></br></td>				
			</tr>
			
			<tr>
				<td>Quntity :</td>
				<td><b>'.$rec1['Quantity'].'</b></br></td>				
			</tr>
			
			<tr>
				<td>Description :</td>
				<td style="word-wrap: break-word;"><b>'.$rec1['pdesc'].'</b></td>
			</tr>
		    </table>	
			<p style="text-align: justify; text-justify: inter-word;">If you have an quiry than you can contact us by <b><a href="../contact%20us.html">clicking here</a></b> and we are ansure you that  we will solve your problem.</p>
				 
				 Thank you,<br>
				 <b>Expiry Tracker</b>
				<footer> © all rights reserved by Expiry tracker</footer>
				</div> ';
			unset($prdates);
			$headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From: expiry tracker <notify.expirytracker@gmail.com>" . "\r\n" .'Reply-To: notify.expirytracker@gmail.com' . "\r\n" .'X-Mailer: PHP/';  
			if(mail($to_email1, $subject1, $body1, $headers))
			{
				$count++;
				$pnamesend=$rec1['pname'];
				
							$editquery0=" UPDATE products SET flag0=1 WHERE
				username= '$username1' AND pname = '$pnamesend' AND  prdate0 <= current_date AND flag0=0 ";

				$editquery1=" UPDATE products SET flag1=1 WHERE
				username= '$username1' AND pname=  '$pnamesend' AND  prdate1 <= current_date AND flag1=0";

				$editquery2=" UPDATE products SET flag2=1 WHERE
				username= '$username1' AND pname=  '$pnamesend' AND  prdate2 <= current_date AND flag2=0";

				$editquery3=" UPDATE products SET flag3=1 WHERE
				username= '$username1' AND pname=  '$pnamesend' AND  prdate3 <= current_date AND flag3=0";

				$editquery4=" UPDATE products SET flag4=1 WHERE
				username= '$username1' AND pname=  '$pnamesend' AND  prdate4 <= current_date AND flag4=0";
				
				
				mysqli_query($con, $editquery0);
				mysqli_query($con, $editquery1);
				mysqli_query($con, $editquery2);
				mysqli_query($con, $editquery3);
				mysqli_query($con, $editquery4);
                unset($pnamesend);
				unset($editquery0);
				unset($editquery1);
				unset($editquery2);
				unset($editquery3);
				unset($editquery4); 
						echo"mail sended to <b>".$to_email1.".</b> </br>";
				
				$txt = $today.'--'.$username1.'--'.$rec1['pname'].'--'.$rec1['pcategory'].'--'.$rec1['pedate'] . "\r\n";
				file_put_contents('alert_products.txt', $txt, FILE_APPEND);
				
			}
			else
			{
				$txt2 = $to_email1."-----".$subject1."-----".$body1."-----".$headers."-----";
				file_put_contents("pending_alert_products.txt",$txt2,FILE_APPEND);
				echo"there is product having today's reminder date, but failed to send mail. </br>";
			}
		}
	}
	
    if (empty($result2))
	{
		echo "their is no document having today's reminder date. </br>";
	}
	else
	{	
		foreach($result2 as $rec2)
		{
			if(!is_null($rec2['drdate1']))
									   {
										   if($rec2['drdate0']!=='0000-00-00' )
										   {
											  $drdates[]= $rec2['drdate0'];

											  if($rec2['drdate1']!=='0000-00-00'  )
											   {
												   $drdates[]= $rec2['drdate1'];;

												   if($rec2['drdate2']!=='0000-00-00')
													{
														 $drdates[]= $rec2['drdate2'];;

													   if($rec2['drdate3']!=='0000-00-00')
														{
															  $drdates[]= $rec2['drdate3'];;

															if($rec2['drdate4']!=='0000-00-00')
															{
															  $drdates[]= $rec2['drdate4'];;

															}
														}
													}
											   }
									     }
									   }
			
			$username2= $rec2['username'];
			$querymail2 = mysqli_query($con,"select email from users left join documents on(users.username=documents.username) where users.username = '$username2'");
			$row2 = mysqli_fetch_row($querymail2);
			$to_email2 = $row2[0];
			$subject2 = "Alert your document going to expire";
			$body2 = '
			<div color="#FFFFFF">Hey <b>'.$rec2['username'].',
				</b></br><p style="text-align: justify; text-justify: inter-word;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You got this mail from expiry tracker because your added document is going to expire. That document name is <b>'.$rec2['dname'].'</b> and its expiry date is <b>'.$rec2['dedate'].'</b> so teck required action for it. More information about the document is mentioned below, so check out the details in this mail.</p>
				
		    <table   style="table-layout:fixed; width: 500px; word-wrap: break-word;" border="1";>
           <tr>
				<th   style="width: 40%;">Attribute</th>
				<th   style="width: 60%;"><b> Value</b></th>			
		    </tr>
		         
            <tr>
				<td >document Name :</td>
				<td style="word-wrap: break-word;"><b> '.$rec2['dname'].'</b></td>			
		    </tr>
				
		    <tr>	
		        <td>Category :</td><td>
				<b>'.$rec2['dcategory'].' </b></br></td> 				
			</tr>
			
			<tr> 
			    <td>Expiry date :</td>
				<td><b>'.$rec2['dedate'].'</b></td>
			</tr>
			
			<tr>
				<td>reminder dates :</td>
				<td><b>'.$drdates['0'].' '.$drdates['1'].' '.$drdates['2'].' '.$drdates['3'].' '.$drdates['4'].'</b></br></td>
			</tr>
			
			<tr>
				<td>Issue date :</td>
				<td><b>'.$rec2['idate'].'</b></br></td>
			</tr>
			
			<tr>
				<td>Description :</td>
				<td style="word-wrap: break-word;"><b>'.$rec2['ddesc'].'</b></td>
			</tr>
		    </table>
				
				 <p style="text-align: justify; text-justify: inter-word;">If you have an quiry than you can contact us by <b><a href="../contact%20us.html">clicking here</a></b> and we are ansure you that  we will solve your problem.</p>
				  
				 Thank you,<br>
				 <b>Expiry Tracker</b>
				<footer> © all rights reserved by Expiry tracker</footer>
				</div> ';
			unset($drdates);
			 $headers  = 'MIME-Version: 1.0' . "\r\n";
             $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			 $headers .= "From: expiry tracker <notify.expirytracker@gmail.com>" . "\r\n" .'Reply-To: notify.expirytracker@gmail.com' . "\r\n" .'X-Mailer: PHP/'; 
		
			if(mail($to_email2, $subject2, $body2, $headers))
			{
				$count++;
				$dnamesend=$rec2['dname'];
				
				$editquery0=" UPDATE documents SET flag0=1 WHERE
				username= '$username2' AND dname = '$dnamesend' AND  drdate0 <= current_date AND flag0=0 ";

				$editquery1=" UPDATE documents SET flag1=1 WHERE
				username= '$username2' AND dname= '$dnamesend' AND  drdate1 <= current_date AND flag1=0";

				$editquery2=" UPDATE documents SET flag2=1 WHERE
				username= '$username2' AND dname= '$dnamesend' AND  drdate2 <= current_date AND flag2=0";

				$editquery3=" UPDATE documents SET flag3=1 WHERE
				username= '$username2' AND dname= '$dnamesend' AND  drdate3 <= current_date AND flag3=0";

				$editquery4=" UPDATE documents SET flag4=1 WHERE
				username= '$username2' AND dname= '$dnamesend' AND  drdate4 <= current_date AND flag4=0";
			
				
					mysqli_query($con, $editquery0);
					mysqli_query($con, $editquery1);
					mysqli_query($con, $editquery2);
					mysqli_query($con, $editquery3);
					mysqli_query($con, $editquery4);
		            unset($dnamesend);
				unset($editquery0);
				unset($editquery1);
				unset($editquery2);
				unset($editquery3);
				unset($editquery4);
				
				$txt = $today.'--'.$username2.'--'.$rec2['dname'].'--'.$rec2['dcategory'].'--'.$rec2['dedate']."\r\n";
				file_put_contents('alert_documents.txt', $txt, FILE_APPEND);
				echo"mail sended to <b>".$to_email2."</b> </br>";
			}
			else
			{
				$txt2 = $to_email2."-----".$subject2."-----".$body2."-----".$headers."-----";
				file_put_contents("pending_alert_documents.txt",$txt2,FILE_APPEND);
				echo"thier is document having today's reminder date, but failed to send mail </br>";
			}
		}
	}
	
	echo "Total <b>".$count."</b> alert trigger and <b>".$count."</b> mail sended </br>";
	mysqli_close($con);
}
?>