<?php session_start() ?>
<?php
	  $host= 'wordpress-db.cemoimgw47fw.us-east-1.rds.amazonaws.com';
    $user = 'admin';
    $pass = 'wordpresspass';
    $db = 'wordpress-db';
    $newpost = $_POST['newpost'];
    
  	$link = new mysqli($host,$user,$pass,$db);
  	if (!$link)
  	{
    	die('could not connect:' . mysql_error());
  	}
    $query = "SELECT * FROM comments WHERE uname='admin'";
    $result = $link->query($query);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    if($result == true){
	  $query1 = "UPDATE comments SET comm='".$newpost."' WHERE uname='admin'";
	  $result1 = $link->query($query1);
    }else{
      $query2 ="INSERT INTO comments (uname,comm,id) VALUES ('admin','".$newpost."','2')";
      $result2 = $link->query($query2);
    }
    echo "<script>window.top.location.href = 'blog.php';  </script>";
    
    
    
	
  
  
?>