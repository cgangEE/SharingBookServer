<?php
	require_once 'tool/info.php';
	require_once 'tool/conn.php';

	$spic = $_GET['spic'];
	$ustuid = $_GET['ustuid'];
	$umd5 = $_GET['umd5'];

	$target_path = 'upload/' . $spic . '.jpg';

	if (empty($spic) || empty($ustuid) || empty($umd5) )
		echo '0';
	else if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
		//$sql = "INTO sharing(spic, sname, sauthor, sprice, slocation, ustuid) VALUES ('$spic', '$sname', '$sauthor', '$sprice', '$slocation', '$ustuid')";

		$spic = $uploadUrl . $spic . '.jpg';

		$sql = "UPDATE user SET upic = '$spic' WHERE ustuid = '$ustuid' AND umd5 = '$umd5' ";

		if (!mysql_query($sql, $con)){
			echo '0';
			die(mysql_error());
		}
		echo '1';
	}
	else {
		echo '2';
	}
?>
