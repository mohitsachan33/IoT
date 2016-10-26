<?php
// NodeMCU will always check this URL /ask.php?id=NM1
$json_file = file_get_contents('sample.json');
$stats = json_decode($json_file);
$id=$_GET['id'];
foreach ($stats->status as $i => $stat) {
	if(substr($stat->id,0,3) == $id){
		echo dechex(substr($stat->pin16,0,1)*8+substr($stat->pin05,0,1)*4+substr($stat->pin04,0,1)*2+substr($stat->pin00,0,1));
	} 
}
?>
