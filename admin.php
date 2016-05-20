<?php 
	session_start();
	include("db.php");
	date_default_timezone_set('Asia/Almaty');

	if(!isset($_SESSION['admin']) && $_SESSION['admin'] !=1){
		header("Location: login.php");
		return;
	}
 ?>

 <html>
 <head>
 	<title>BLog</title>
 </head>
 <body>
	 <?php 
		$sql = "SELECT * FROM posts ORDER BY id DESC";

	 	$res = mysqli_query($db, $sql) or die (mysqli_error());

	 	$posts = "";

	 	if(mysqli_num_rows($res) > 0) {
	 		while($row = mysqli_fetch_assoc($res)) {
	 			$id = $row['id'];
	 			$title = $row['title'];
	 			$date = $row['date'];

	 			$admin = "<div><a href='del_post.php?pid=$id'>Delete</a>&nbsp;<a href='edit_post.php?pid=$id'>Edit</a></div>";


	 			$posts = "<div><h2><a href='post_view.php?pid=$id' target='_blank'>$title</a></h2><h3>$date</h3>$admin<hr/></div>";
	 		echo $posts;
	 		}
	 	
	 	} else {
	 		echo "There are no posts to display"."<br>";

	 	}
	  ?>

	  <a href="post.php" target='_blank'>Post</a>
 </body>
 </html>