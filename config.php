<?php
// creates the JSON file - /config.php?v=3-NM20000xCu101042u0010
$val=$_GET['v'];
$noOfDevices=substr($val,0,strpos($val,'-'));
$d = array();
$get=strpos($val,'-')+1;
for($i=0;$i<$noOfDevices;$i++,$get+=7){
	$d[$i] = array('id' => substr($val,$get,3)."-Room".($i+1) ,'pin16' => substr($val,$get+3,1)."-Button1" ,'pin05' => substr($val,$get+4,1)."-Button2" ,'pin04' => substr($val,$get+5,1)."-Button3" ,'pin00' => substr($val,$get+6,1)."-Button4");
}
$json = json_encode(array('status' =>$d));
file_put_contents('sample.json', $json);
?>
