<?php  
$deviceId = $_GET['id'];
$gpioPin = $_GET['pin'];
$toggle = $_GET['toggle'];
$json_file = file_get_contents('sample.json');
$stats = json_decode($json_file);
foreach ($stats->status as $i => $stat) {
	if(substr($stat->id,0,3) == $deviceId){
		$n='pin'.$gpioPin;
		$stat->$n=$toggle.substr($stat->$n,1,20);
	}
}
$json = json_encode($stats);
file_put_contents('sample.json', $json);
?>
