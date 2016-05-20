<?php 
	session_start();
	include("db.php");
	date_default_timezone_set('Asia/Almaty');
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Blog-Main Page</title>
  <link rel="shortcut icon" href="img/icon.png"/>
  <link rel="stylesheet" href="style/index.css">
  <link rel="stylesheet" href="style/bg.css">
</head>
<body>
 <div class="title">
  <div class="nav">
    <ul class='left-ul'>
      <li><a href="index.php">Blog</a></li>
<!--       <select id="select" onchange="javascript:handleSelect(this)">
  <option value="index">IT industry</option>
  <option value="index2">Cats</option>
  <option value="index3">Business</option>
  <option value="index1">Cars</option>
</select></li> -->
    </ul>
    <ul class='right-ul'>
    	<?php 
    	if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
		 		echo "<li><a href='admin.php'>Admin</a> | <a href='logout.php'>Logout</a></li>";
		 	}

		 	if(!isset($_SESSION['username'])) {
		 		echo "<li><a href='login.php'>Log in</a></li> | <li><a href='register.php'>Sign Up</a></li>";
		 	}
		 	if(isset($_SESSION['username']) && !isset($_SESSION['admin'])) {
		 		echo "<li><a href = '#'>".$_SESSION['username']."</a> | <a href='logout.php'>Logout</a></li>";
		 	} ?>
     <!--  <li><a href="profile.php"><?php #echo "  " .$_SESSION['login'];?></a></li>
      <li><a href="indexout.php">Log Out</a></li> -->
    </ul>
  </div>

  <center>
  <h1 id="sub">Idea Blog</h1>
 	<hr id="line">
  <h2 id="sub">Idea Blog by Isaev Chingiz</h2></center>
</div>

<?php 
require("nbbc/nbbc.php");

$bbcode = new BBCode;


$sql = "SELECT * FROM posts ORDER BY id DESC";

$res = mysqli_query($db, $sql) or die (mysqli_error($sql));

$posts = "";

if(mysqli_num_rows($res) > 0) {
	while($row = mysqli_fetch_assoc($res)) {
		$id = $row['id'];
		$title = $row['title'];
		$short = $row['short'];
		$date = $row['date'];
	if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
			$admin = "<div><a href='del_post.php?pid=$id'>Delete</a>&nbsp;<a href='edit_post.php?pid=$id'>Edit</a></div>";
		}else {
			$admin = "";
		}
		$output = $bbcode->Parse($short);

		$posts = "<hr><div class='post'><a href='post_view.php?pid=$id' target='_blank'><h2 class='post-title'>$title</h2><h3 class='short'>$output</h3></a><p class='post-data'>Posted on $date</p></div><br>";
	echo $posts;
	}

} else {
	echo "<h2 class ='nopost'>There are no posts to display</h2>"."<br>";

}
?>

 <br><hr><br>
                
</body>
</html>

