<?php
require_once 'tool/info.php';
require_once 'tool/conn.php';

function inDatabase($ustuid, $umd5, $sid){
	global $con;

	$sharing = mysql_query("UPDATE user, sharing SET sold = 1 WHERE user.ustuid = sharing.ustuid AND sid = '$sid' AND sharing.ustuid = '$ustuid' AND umd5 = '$umd5' ", $con);

	echo mysql_affected_rows();
}

$ustuid = $_GET['ustuid'];
$umd5 = $_GET['umd5'];
$sid = $_GET['sid'];

inDatabase($ustuid, $umd5, $sid);
?>
