<?php session_start() ?>
<?php
	$host= 'wordpress-db.cemoimgw47fw.us-east-1.rds.amazonaws.com';
	$user = 'admin';
	$pass = 'wordpresspass';
	$db = 'wordpress-db';
	$username = $_POST['uname'];
 	$password = $_POST['psw'];
    
  	$link = new mysqli($host,$user,$pass,$db);
  	if (!$link)
  	{
    		die('could not connect:' . mysql_error());
  	}

  	//mysql_select_db("blog_db",$link) or die ('Problem with DB');
	  
  	$query = "SELECT * FROM uinfo WHERE uname='".$username."' AND pw='".$password."'";
  	$result = $link->query($query);
	if($username=='admin'){
		echo "<script> window.top.location.href = 'admin.php'; </script>";
		$flag = 1;
	}
	$flag = 0;
  	if($query==true)
  	{	
	 	while($row = $result->fetch_array(MYSQLI_ASSOC))
	 	{
			
		$query2="UPDATE auth SET lev=1 WHERE lev=0;";
		$link->query($query2);
        $_SESSION["user"]=$username;
		$flag = 1;
		$_SESSION["flag"]=$flag;
		echo "<script> window.top.location.href = 'blog.php'; </script>";
		}
  	}
  
  	if($flag == 0)
  	{
    	echo "<script>window.top.location.href = 'index.php';  </script>";
  	}
?>