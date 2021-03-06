<?php
	require_once 'info.php';
	require_once 'conn.php';


	mysql_query("DROP TABLE user", $con);
	mysql_query("DROP TABLE sharing", $con);
	mysql_query("DROP TABLE observing", $con);


	mysql_query("set character_set_server=utf8", $con);
	mysql_query("set character_set_database=utf8", $con);

	mysql_query("SET NAMES utf8", $con); 

#	uid int PRIMARY KEY NOT NULL AUTO_INCREMENT,
	$user ="CREATE TABLE user(
		uname varchar(50),
		uphone varchar(20),
		ustuid varchar(20) PRIMARY KEY NOT NULL,
		upwd varchar(50),
		umd5 varchar(255),
		ugrade varchar(10),
		upic varchar(255),
		usex varchar(10)
	) ENGINE=MyISAM DEFAULT CHARSET=utf8";

	if (!mysql_query($user, $con))
		die(mysql_error());
	else
		echo 'User Builded OK<br/>';
	
	$sharing ="CREATE TABLE sharing(
		sid int PRIMARY KEY NOT NULL AUTO_INCREMENT,
		spic varchar(50),
		sname varchar(50),
		sauthor varchar(50),
		sprice varchar(50),
		slocation varchar(50),
		sold int NOT NULL DEFAULT 0,
		stime timestamp DEFAULT CURRENT_TIMESTAMP,
		ustuid varchar(20),
	 	FOREIGN KEY(ustuid) REFERENCES user(ustuid),
		FULLTEXT (sname),
	   	FULLTEXT (sauthor)
	) ENGINE=MyISAM DEFAULT CHARSET=utf8";

	if (!mysql_query($sharing, $con))
		die(mysql_error());
	else
		echo 'Sharing Builded OK<br/>';


	$observing = "CREATE TABLE observing(
		oid int PRIMARY KEY NOT NULL AUTO_INCREMENT,
		A varchar(20),
		B varchar(20),
		FOREIGN KEY(A) REFERENCES user(ustuid),
		FOREIGN KEY(B) REFERENCES user(ustuid)
	) ENGINE=MyISAM DEFAULT CHARSET=utf8";

	if (!mysql_query($observing, $con))
		die(mysql_error());
	else
		echo 'Observing Builded OK<br/>';


	$message = "CREATE TABLE message(
		mid int PRIMARY KEY NOT NULL AUTO_INCREMENT,
		mread int NOT NULL DEFAULT 0,
		message varchar(10000), 	
		mtime timestamp DEFAULT CURRENT_TIMESTAMP,
		msender varchar(20),
		mreceiver varchar(20),
		FOREIGN KEY(msender) REFERENCES user(ustuid),
		FOREIGN KEY(mreceiver) REFERENCES user(ustuid)
	) ENGINE=MyISAM DEFAULT CHARSET=utf8";

	if (!mysql_query($message, $con))
		die(mysql_error());
	else
		echo 'Message Builded OK<br/>';


	mysql_close($con);
?>

