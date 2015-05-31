<?php
require_once 'tool/info.php';
require_once 'tool/conn.php';

function inDatabase(){
	global $con;
	$sharing = mysql_query("SELECT * FROM user, sharing, (select round(rand() * (select max(sid) from sharing)) as id) as r2   WHERE sold = 0 AND user.ustuid = sharing.ustuid AND sid >= id LIMIT 100", $con);
	$i = 0;
	$data[$i] = array('_' => '_');
	$i++;
	while ($row = mysql_fetch_array($sharing)){
		$data[$i] = $row;
		++$i;
	}

	echo json_encode(array('dataList'=>$data));
}

inDatabase($ustuid);
?>
