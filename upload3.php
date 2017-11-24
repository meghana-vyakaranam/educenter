<?php
	session_start(); 
  	$annw=fopen("announcements.txt","a");
  	if($_POST['ta']!='')
  		fwrite($annw,$_POST["ta"]."\n");
  	header("Location:teacher22.php");
?>