<?php
require_once 'tool/info.php';
require_once 'tool/conn.php';

function inDatabase($query){
	global $con;
	$sharing = mysql_query("SELECT * FROM user, sharing WHERE sold = 0 AND user.ustuid = sharing.ustuid AND ( sname like '%$query%' OR sauthor like '%$query%' ) ORDER BY stime desc LIMIT 100", $con);
	$i = 0;
	$data[$i] = array('_' => '_');
	$i++;
	while ($row = mysql_fetch_array($sharing)){
		$data[$i] = $row;
		++$i;
	}

	echo json_encode(array('dataList'=>$data));
}

$query = $_GET['query'];

inDatabase($query);
?>
