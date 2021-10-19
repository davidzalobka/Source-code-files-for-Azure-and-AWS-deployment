<?php session_start() ?>
<?php
	$username = $_SESSION["user"];
    $comment = $_POST['newcomment'];
    $host= 'wordpress-db.cemoimgw47fw.us-east-1.rds.amazonaws.com';
 	$user = 'admin';
  	$pass = 'wordpresspass';
  	$db = 'wordpress-db';
  	$link = new mysqli($host,$user,$pass,$db);
  	if (!$link)
  	{
    	die('could not connect:' . mysql_error());
  	}
	$query1 = "DELETE FROM comments WHERE id=1";
	$result1 = $link->query($query1);
    $query = "INSERT INTO comments (uname,comm,id) VALUES ('".$username."','".$comment."','1')";
  	$result = $link->query($query);
    echo "<script>window.top.location.href = 'blog.php';  </script>";
    
	
  
  
?>