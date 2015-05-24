<?php
	require_once 'tool/info.php';
	require_once 'tool/conn.php';

	$message = $_GET['message'];
	$msender = $_GET['msender'];
	$mreceiver = $_GET['mreceiver'];

	$ustuid = $msender;
	$umd5 = $_GET['umd5'];


	$user = mysql_query("SELECT * FROM user WHERE ustuid = '$ustuid' AND umd5 = '$umd5'");
	if (mysql_fetch_row($user) == null)
		echo '2';
	else {
		$sql = "INSERT INTO message(message, msender, mreceiver) VALUES ('$message', '$msender', '$mreceiver')";
		if (!mysql_query($sql, $con)){
			echo '0';
			die(mysql_error());
		}
		echo '1';
	}
?>
