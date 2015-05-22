<?php
	require_once 'tool/info.php';
	require_once 'tool/conn.php';

	function inDatabase($ustuid){
		global $con;
		$result = mysql_query("SELECT * FROM observing WHERE A = '$ustuid' AND B != '$ustuid'", $con);
		echo mysql_affected_rows() . ' ';

		$result = mysql_query("SELECT * FROM observing WHERE A != '$ustuid' AND B = '$ustuid'", $con);
		echo mysql_affected_rows();
	}

	$ustuid = $_GET['ustuid'];
	inDatabase($ustuid);
?>
