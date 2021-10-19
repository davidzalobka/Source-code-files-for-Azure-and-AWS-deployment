<?php session_start() ?>
<?php
	$host= 'blog-server-db.mysql.database.azure.com';
	$user = 'davidserver';
	$pass = 'letmein!2';
	$db = 'blog-db';
	$username = $_POST['uname'];
 	$password = $_POST['psw'];
    
	 $conn = mysqli_init();
	 mysqli_ssl_set($conn,NULL,NULL, "DigiCertGlobalRootCA.crt.pem", NULL, NULL);
	 $link=mysqli_real_connect($conn, $host, $user, $pass, $db,3306,NULL, MYSQLI_CLIENT_SSL);
	 if (mysqli_connect_errno($conn)) {
		 die('Failed to connect to MySQL: '.mysqli_connect_error());
	 }
	  
  	$query = "SELECT * FROM uinfo WHERE uname='".$username."' AND pw='".$password."'";
  	$result = mysqli_query($conn,$query);
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
		mysqli_query($conn,$query2);
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
	  $conn->close();
?>