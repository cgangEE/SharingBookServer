<?php
	require_once 'tool/info.php';
	require_once 'tool/conn.php';

	function inDatabase($ustuid){
		global $con;
		$result = mysql_query("SELECT * FROM user WHERE ustuid='$ustuid'", $con);
		$row = mysql_fetch_array($result);
		if ($row){
			echo json_encode($row);
		}
	}

	$ustuid = $_GET['ustuid'];

	inDatabase($ustuid);
?>
