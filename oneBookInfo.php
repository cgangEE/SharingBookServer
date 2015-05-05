<?php
require_once 'tool/info.php';
require_once 'tool/conn.php';

function inDatabase($sid){
	global $con;

	$sharing = mysql_query("SELECT * FROM user, sharing WHERE user.ustuid = sharing.ustuid AND sid = '$sid'", $con);

	$row = mysql_fetch_array($sharing);

	echo json_encode($row);
}

$sid = $_GET['sid'];

inDatabase($sid);
?>
