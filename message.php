<?php
require_once 'tool/info.php';
require_once 'tool/conn.php';

function inDatabase($ustuid, $umd5){
	global $con;
	$user = mysql_query("SELECT * FROM user WHERE ustuid = '$ustuid' AND umd5 = '$umd5'");
	if (mysql_fetch_array($user) == null){
		$data[0] = array('_' => '_');
	}
	else {
		$sql = "SELECT * FROM message WHERE msender = '$ustuid' OR mreceiver = '$ustuid'  ORDER BY mtime desc LIMIT 100";
		$sharing = mysql_query($sql, $con);

		$i = 0;
		$data[$i] = array('_' => '_');
		$i++;
		while ($row = mysql_fetch_array($sharing)){
			$data[$i] = $row;
			++$i;
		}
	}

	echo json_encode(array('dataList'=>$data));
}

$ustuid = $_GET['ustuid'];
$umd5 = $_GET['umd5'];

inDatabase($ustuid, $umd5);
?>
