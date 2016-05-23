<?php
	$dbC = @mysqli_connect("localhost","dealaway","egnrnfgiaa9439") or die("Mysql Connection Error");
	@mysqli_select_db($dbC, "dealaway_burhan") or die("Database not Found in Mysql");
	session_start();
?>