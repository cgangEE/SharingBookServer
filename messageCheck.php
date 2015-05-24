<?php
require_once 'tool/info.php';
require_once 'tool/conn.php';

function inDatabase($umd5, $msender, $mreceiver){
	global $con;
	$user = mysql_query("SELECT * FROM user WHERE ustuid = '$mreceiver' AND umd5 = '$umd5'");
	if (mysql_fetch_array($user) == null){
		$data[0] = array('_' => '_');
	}
	else {
		$sql = "SELECT * FROM message WHERE mread = 0 AND  msender = '$msender' AND mreceiver = '$mreceiver'  ORDER BY mtime LIMIT 1";
		$sharing = mysql_query($sql, $con);

		$i = 0;
		$data[$i] = array('_' => '_');
		$i++;
		while ($row = mysql_fetch_array($sharing)){
			$data[$i] = $row;
			++$i;
		}

		$sql2 = "UPDATE message SET mread = 1 WHERE msender = '$msender' AND mreceiver = '$mreceiver' AND mread = 0 ORDER BY mtime LIMIT 1";
		mysql_query($sql2, $con);
	}

	echo json_encode(array('dataList'=>$data));
}

$umd5 = $_GET['umd5'];
$msender = $_GET['msender'];
$mreceiver = $_GET['mreceiver'];

inDatabase($umd5, $msender, $mreceiver);
?>
