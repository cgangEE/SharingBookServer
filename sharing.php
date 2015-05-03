<?php
	require_once 'tool/info.php';
	require_once 'tool/conn.php';

	$spic = $_GET['spic'];
	$sname = $_GET['sname'];
	$sauthor = $_GET['sauthor'];
	$sprice = $_GET['sprice'];
	$slocation = $_GET['slocation'];
	$ustuid = $_GET['ustuid'];
	$target_path = 'upload/' . $spic . '.jpg';

	if (empty($spic) || empty($sname) || empty($sauthor)
				|| empty($sprice) || empty($slocation) 
				|| empty($ustuid))
		echo '0';
	else if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
		$sql = "INSERT INTO sharing(spic, sname, sauthor, sprice, slocation, ustuid) VALUES ('$spic', '$sname', '$sauthor', '$sprice', '$slocation', '$ustuid')";
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
