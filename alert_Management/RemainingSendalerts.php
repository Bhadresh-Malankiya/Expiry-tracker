<?php
if(file_get_contents("pending_alert_products.txt")){
	$string1 = file_get_contents("../alert_log/pending_alert_products.txt");
	$stringarr1 = explode("-----",$string1);
	$i1 = 0;
	$txt1 = "";
	while($stringarr1[$i1]){
			if(mail($stringarr1[$i1],$stringarr1[$i1+1],$stringarr1[$i1+2],$stringarr1[$i1+3])){
			}
			else{
				$txt1 = $txt1.$stringarr1[$i1]."-----".$stringarr1[$i1+1]."-----".$stringarr1[$i1+2]."-----".$stringarr1[$i1+3]."-----";
			}
			$i1 += 4;
	}
	file_put_contents("pending_alert_products.txt",$txt1);
}
if(file_get_contents("pending_alert_documents.txt")){
	$string2 = file_get_contents("../alert_log/pending_alert_documents.txt");
	$stringarr2 = explode("-----",$string2);
	$i2 = 0;
	$txt2 = "";
	while($stringarr2[$i2]){
			if(mail($stringarr2[$i2],$stringarr2[$i2+1],$stringarr2[$i2+2],$stringarr2[$i2+3])){
			}
			else{
				$txt2 = $txt2.$stringarr2[$i2]."-----".$stringarr2[$i2+1]."-----".$stringarr2[$i2+2]."-----".$stringarr2[$i2+3]."-----";
			}
			$i2 += 4;
	}
	file_put_contents("pending_alert_documents.txt",$txt2);
}
?>