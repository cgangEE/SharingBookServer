<?php
	require_once 'tool/info.php';
	require_once 'tool/conn.php';

	function inDatabase($ustuid, $umd5){
		global $con;
		$result = mysql_query("SELECT * FROM user WHERE umd5='$umd5' AND ustuid='$ustuid'", $con);
		$row = mysql_fetch_array($result);
		if (!$row) return false;
		return true;
	}

	function observing($A, $B){
		global $con;
		$result = mysql_query("SELECT * FROM observing WHERE A='$A' AND B='$B'", $con);
		$row = mysql_fetch_array($result);
		if ($row){
//			mysql_query("DELETE FROM observing WHERE A='$A' AND B='$B'", $con);
			echo '2';
		}
		else{
//			mysql_query("INSERT INTO observing(A, B) VALUES('$A', '$B')");
			echo '1';
		}
	}

	$umd5 = $_GET['umd5'];
	$ustuid = $_GET['ustuid'];
	$B = $_GET['B'];

	if (inDatabase($ustuid, $umd5)==true){
		observing($ustuid, $B);
	}
	else echo '0';
?>
