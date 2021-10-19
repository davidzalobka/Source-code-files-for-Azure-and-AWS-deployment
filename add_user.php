<?php session_start() ?>
<?php
	$username = $_POST['username'];
 	$password = $_POST['psw'];
    $passwordrep = $_POST['psw-repeat'];
	$host= 'wordpress-db.cemoimgw47fw.us-east-1.rds.amazonaws.com';
 	$user = 'admin';
  	$pass = 'wordpresspass';
  	$db = 'wordpress-db';
	
  	$link = new mysqli($host,$user,$pass,$db);
  	if (!$link)
  	{
    	die('could not connect:' . mysql_error());
  	}

    if($password==$passwordrep)
    {
  	    $query = "INSERT INTO uinfo (uname,pw) VALUES ('".$username."','".$password."')";
  	    $result = $link->query($query);
        echo "<script>window.top.location.href = 'index.php';  </script>";
    }
	
  
  
?>