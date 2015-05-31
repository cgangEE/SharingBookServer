<?php
require_once 'tool/info.php';
require_once 'tool/conn.php';

function inDatabase($umd5, $ustuid){
	global $con;
	$user = mysql_query("SELECT * FROM user WHERE ustuid = '$ustuid' AND umd5 = '$umd5'");
	if (mysql_fetch_array($user) == null){
		$data[0] = array('_' => '_');
	}
	else {
		$sql = "SELECT * FROM message, user WHERE mread = 0 AND mreceiver = '$ustuid' AND msender = ustuid  ORDER BY mtime LIMIT 1";
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

$umd5 = $_GET['umd5'];
$ustuid = $_GET['ustuid'];

inDatabase($umd5, $ustuid);
?>
