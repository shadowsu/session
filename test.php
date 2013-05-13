<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php

session_start();

if(isset($_SESSION['views']))
  $_SESSION['views']=$_SESSION['views']+1;
else
  $_SESSION['views']=1;

?> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>

<body>
<?php 
  echo "Views=". $_SESSION['views']."<br/>"; 
	
	function getip() {    
	 $ip = $_SERVER["REMOTE_ADDR"];     
	 if (!empty($_SERVER['HTTP_CLIENT_IP'])) {        
	  $ip = $_SERVER['HTTP_CLIENT_IP'];    
	 } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {        
	  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];    
	 }    
	  return $ip;
	}
	echo getip();

	$ip=getip();
	$file = fopen("views.txt","a");
	echo fwrite($file,"[".$_SESSION['views'].":".$ip."]\r\n");
	fclose($file);

?>
</body>
</html>
