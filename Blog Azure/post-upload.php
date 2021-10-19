<?php session_start() ?>
<?php
	$host= 'blog-server-db.mysql.database.azure.com';
    $user = 'davidserver';
    $pass = 'letmein!2';
    $db = 'blog-db';
    $newpost = $_POST['newpost'];
    
    $conn = mysqli_init();
	  mysqli_ssl_set($conn,NULL,NULL, "DigiCertGlobalRootCA.crt.pem", NULL, NULL);
	  $link=mysqli_real_connect($conn, $host, $user, $pass, $db,3306,NULL, MYSQLI_CLIENT_SSL);
	  if (mysqli_connect_errno($conn)) {
		  die('Failed to connect to MySQL: '.mysqli_connect_error());
	  }

    $query = "SELECT * FROM comments WHERE uname='admin'";
    $result = mysqli_query($conn,$query);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    if($result == true){
	  $query1 = "UPDATE comments SET comm='".$newpost."' WHERE uname='admin'";
	  $result1 = mysqli_query($conn,$query1);
    }else{
      $query2 ="INSERT INTO comments (uname,comm,id) VALUES ('admin','".$newpost."','2')";
      $result2 = mysqli_query($conn,$query2);
    }
    echo "<script>window.top.location.href = 'blog.php';  </script>";
    $conn->close();
    
    
	
  
  
?>