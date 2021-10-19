<?php session_start() ?>
<?php
	$username = $_SESSION["user"];
    $comment = $_POST['newcomment'];
    $host= 'blog-server-db.mysql.database.azure.com';
 	$user = 'davidserver';
  	$pass = 'letmein!2';
  	$db = 'blog-db';
	$conn = mysqli_init();
	mysqli_ssl_set($conn,NULL,NULL, "DigiCertGlobalRootCA.crt.pem", NULL, NULL);
	$link=mysqli_real_connect($conn, $host, $user, $pass, $db,3306,NULL,MYSQLI_CLIENT_SSL);
	if (mysqli_connect_errno($conn)) {
	  die('Failed to connect to MySQL: '.mysqli_connect_error());
	}
  	
	$query1 = "DELETE FROM comments WHERE id=1";
	$result1 = mysqli_query($conn,$query1);
    $query = "INSERT INTO comments (uname,comm,id) VALUES ('".$username."','".$comment."','1')";
  	$result = mysqli_query($conn,$query);
    echo "<script>window.top.location.href = 'blog.php';  </script>";
    $conn->close();
	
  
  
?>