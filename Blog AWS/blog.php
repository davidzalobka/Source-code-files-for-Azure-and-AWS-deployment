<?php session_start()?>
<?php
	$host= 'wordpress-db.cemoimgw47fw.us-east-1.rds.amazonaws.com';
	$user = 'admin';
	$pass = 'wordpresspass';
	$db = 'wordpress-db';
    
  	$link = new mysqli($host,$user,$pass,$db);
  	if (!$link)
  	{
    	die('could not connect:' . mysql_error());
  	}
	$query = "SELECT uname FROM comments WHERE id='1'";
	$result1 = $link->query($query);
	$row = $result1->fetch_array(MYSQLI_ASSOC); 
	$query2 = "SELECT comm FROM comments WHERE id='1'";
	$result2 = $link->query($query2);
	$row2 = $result2->fetch_array(MYSQLI_ASSOC); 
	$query3 = "SELECT comm FROM comments WHERE id='2'";
	$result3 = $link->query($query3);
	$row3 = $result3->fetch_array(MYSQLI_ASSOC); 

?>
<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="style.css" />

<html>
<head><div class="header"><H1>Welcome to my blog about cars. I hope you enjoy my content, don't forget to leave a comment</H1></div></head>
<body id="index">

	<!-- blog content----------------------->

	<section id="content" class="body">
	  
	  <article class="hentry">	
			<header>
				<h2 class="entry-title"><a href="#" rel="bookmark" title="Permalink to this Building a Pusher-powered Real-Time Commenting System">New post!!</a></h2>
			</header>
			
			<footer class="post-info">
				<abbr class="published" title="2012-02-10T14:07:00-07:00">
					14th September 2021
				</abbr>

				<address class="vcard author">
					By <a class="url fn" href="#">David Zalobka</a>
				</address>
			</footer>
			
			<div class="entry-content">
				<p class="p-content"><?php  printf("%s",$row3["comm"]); ?></p>
			</div>
		</article>
			
	</section>

	
 	
	<a href="index.php" class="topcorner"><h2>Log out</h2></a>

	<footer class="post-comment">
		<h3>Latest comment</h3>
		<address class="vcard author">
			By <a class="url fn" href="#"><?php  printf("%s",$row["uname"]); ?></a>
		</address>
		<p><?php  printf("%s",$row2["comm"]); ?></p>
	</footer>
	
	<!-- add comment form-------------------->

 <form action="add_comment.php" method="post" class="commform">
	<section id="app">
		<div class="container">
		<div class="row">
			<div class="col-6">
			<div class="comment">
			<p v-for="items in item" v-text="items"></p>
			</div>
			</div>
			</div>
		<div class="row">
			<div class="col-6">
		<textarea type="text" class="input" placeholder="Write a comment" v-model="newItem" @keyup.enter="addItem()" name='newcomment'></textarea>
			<button v-on:click="addItem()" class='primaryContained float-right' type="submit">Add Comment</button>
			</div>
		</div>
		</div>
	</section>
 </form>
 
</body>
</html>