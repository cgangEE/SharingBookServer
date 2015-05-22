<?php
require_once 'tool/info.php';
require_once 'tool/conn.php';

function inDatabase($ustuid, $type){
	global $con;
	if ($type == 0)
		$sharing = mysql_query("SELECT * FROM observing, user WHERE A = '$ustuid' AND B != '$ustuid' AND B = ustuid");
	else if ($type == 1){
		$sharing = mysql_query("SELECT * FROM observing, user WHERE A != '$ustuid' AND B = '$ustuid' AND A = ustuid");
	}

	$i = 0;
	$data[$i] = array('_' => '_');
	$i++;
	while ($row = mysql_fetch_array($sharing)){
		$data[$i] = $row;
		++$i;
	}

	echo json_encode(array('dataList'=>$data));
}

$ustuid = $_GET['ustuid'];
$type = $_GET['type'];

inDatabase($ustuid, $type);
?>
