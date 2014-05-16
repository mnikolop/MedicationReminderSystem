<?php
	session_start();
	$DATABASE='cyberdoc';
	$USER='markella';
	$PASS='root';

	$db=mysql_connect('localhost',$USER,$PASS);
	if (!$db)
		die('error connecting to the db:'.mysql_error($db));
	mysql_select_db($DATABASE,$db);

	function query($q){
		global $db;
		$is=null;
		$ret=mysql_query($q,$db);
		if ($ret==false)
			return false;
		while ($i=mysql_fetch_array($ret))
			$is[]=$i;
		return $is;
	}
?>
