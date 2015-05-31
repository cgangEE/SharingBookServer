<?php
require_once 'tool/info.php';
require_once 'tool/conn.php';

function inDatabase($ustuid, $type){
	global $con;
#	$sharing = mysql_query("SELECT  * FROM message, user WHERE (msender = '$ustuid' OR mreceiver = '$ustuid') AND ustuid != '$ustuid' AND (ustuid = msender OR ustuid = mreceiver) GROUP BY ustuid ORDER BY mtime desc");
	$sharing = mysql_query("select * from (select * from message, user where (mreceiver = '$ustuid'  OR msender = '$ustuid' ) AND ustuid != '$ustuid' AND (mreceiver = ustuid OR msender = ustuid)  order by mid desc) as b group by ustuid order by mid desc");

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

inDatabase($ustuid);
?>
