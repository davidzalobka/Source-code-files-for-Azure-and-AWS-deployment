
<!DOCTYPE html>
<style>
.header {
    padding: 16px;
    text-align: center;
    background: #1abc9c;
    color: white;
    font-size: 16px;
  }
.bordersize{
  height: 20;
  width: 2000;
}
</style>
<html>
<head><div class="header"><H1>You are the Administrator of this blog</H1></div></head>
<body>
<h3>Write inside the text area your new post</h3>
<form action="post-upload.php" method="post">
<div class="bordersize">
<textarea rows="8" cols="150" type="text" class="input" placeholder="Place your post here" v-model="newItem" @keyup.enter="addItem()" name='newpost'></textarea>
</div>
			<button v-on:click="addItem()" class='primaryContained float-right' type="submit">Add new post</button>
</form>


<a href="blog.php"><H1 align="center">Visit blog</H1></a>
</body>
</html>