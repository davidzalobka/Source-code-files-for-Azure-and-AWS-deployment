<?php session_start() ?>
<?php
	$username = $_POST['username'];
 	$password = $_POST['psw'];
    $passwordrep = $_POST['psw-repeat'];
	$host= 'blog-server-db.mysql.database.azure.com';
 	$user = 'davidserver';
  	$pass = 'letmein!2';
  	$db = 'blog-db';
	
  	$conn = mysqli_init();
	  mysqli_ssl_set($conn,NULL,NULL, "DigiCertGlobalRootCA.crt.pem", NULL, NULL);
	  $link=mysqli_real_connect($conn, $host, $user, $pass, $db,3306,NULL, MYSQLI_CLIENT_SSL);
	  if (mysqli_connect_errno($conn)) {
		  die('Failed to connect to MySQL: '.mysqli_connect_error());
	  }

    if($password==$passwordrep)
    {
  	    $query = "INSERT INTO uinfo (uname,pw) VALUES ('".$username."','".$password."')";
  	    $result = mysqli_query($conn,$query);
        echo "<script>window.top.location.href = 'index.php';  </script>";
    }
	$conn->close();
  
  
?>