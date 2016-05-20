<?php 
	session_start();
	include("db.php");

	if(!isset($_SESSION['username'])) {
		header("Location: login.php");
		return;
	}


	if (!isset($_GET['pid'])) {
		header("Location: index.php");
	};

	$pid = $_GET['pid'];


	if(isset($_POST['post'])){
		$title = strip_tags($_POST['title']);
		$content = strip_tags($_POST['content']);
    $short = strip_tags($_POST['short']);


		$title = mysqli_real_escape_string($db, $title);
		$content = mysqli_real_escape_string($db, $content);
    $short = mysqli_real_escape_string($db, $short);

		$date = date('F j, Y, H:i:s');

		$sql="UPDATE posts SET title='$title', short='$short', content='$content', date='$date' WHERE id = $pid";

		if($title == ""|| $content == "" || $short== ""){
			echo "Please complete your post";
			return;
	};

	mysqli_query($db, $sql);

	header("Location: index.php");

	};
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script/script.js"></script>
  <title>Edit Post</title>
  <link rel="shortcut icon" href="img/icon.png"/>
  <link rel="stylesheet" href="style/index.css">
  <link rel="stylesheet" href="style/creat_post.css">
  <link rel="stylesheet" href="style/bg.css">
  <style type="text/css">
  	.form {
    font-family: 'Open Sans Condensed', arial, sans;
    width: 500px;
    padding: 30px;
    background: #FFFFFF;
    margin: 50px auto;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
    -moz-box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
    -webkit-box-shadow:  0px 0px 15px rgba(0, 0, 0, 0.22);
  	}
  	.form textarea{
    resize:none;
    overflow: hidden;
	}
	.form input[type="submit"]{
    -moz-box-shadow: inset 0px 1px 0px 0px #45D6D6;
    -webkit-box-shadow: inset 0px 1px 0px 0px #45D6D6;
    box-shadow: inset 0px 1px 0px 0px #45D6D6;
    background-color: #2CBBBB;
    border: 1px solid #27A0A0;
    display: inline-block;
    cursor: pointer;
    color: #FFFFFF;
    font-family: 'Open Sans Condensed', sans-serif;
    font-size: 14px;
    padding: 8px 18px;
    text-decoration: none;
    text-transform: uppercase;
	}
	.form input[type="submit"]:hover {
    background:linear-gradient(to bottom, #34CACA 5%, #30C9C9 100%);
    background-color:#34CACA;
}
	.form input[type="text"],
	.form textarea,
	.form select 
{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    outline: none;
    display: block;
    width: 100%;
    padding: 7px;
    border: none;
    border-bottom: 1px solid #ddd;
    background: transparent;
    margin-bottom: 10px;
    font: 16px Arial, Helvetica, sans-serif;
}
  </style>
</head>
<body>
<div class="title">
  <div class="nav">
    <ul class='left-ul'>
      <li><a href="index.php">Blog</a></li>
     <!-- <li><select id="select" onchange="javascript:handleSelect(this)">
  <option value="index">IT industry</option>
  <option value="index2">Cats</option>
  <option value="index3">Business</option>
  <option value="index1">Cars</option>
</select></li> -->
    </ul>
    <ul class='right-ul'>
      <li><a href="profile.php"><?php #echo "  " .$_SESSION['login'];?></a></li>
      <li><a href="indexout.php">Log Out</a></li>
    </ul>
  </div>
  <center>
  <h1 id="sub">Creating publication</h1>
  <hr id="line">
  </center>
</div>
	<?php 
		$sql_get = "SELECT * FROM posts WHERE id=$pid LIMIT 1";
 		$res = mysqli_query($db, $sql_get);

 		if(mysqli_num_rows($res)>0){
 			while ($row= mysqli_fetch_assoc($res)) {
 				$title = $row['title'];
 				$content = $row['content'];
        $short = $row['short'];
        $date = $row['date'];

 				echo "<hr><form action='edit_post.php?pid=$pid' method='post' enctype='multipart/form-data' class='form'>";
 				echo "<input placeholder='Title' name='title' type='text' value='$title' autofocus size='48'>";
        echo "<textarea placeholder='Short' name='short' rows='5'>$short</textarea>";
        echo "<textarea placeholder='Content' name='content' rows='20' cols='50'>$content</textarea>";
 			}
 		}
 	 ?>

		<input name="post" type="submit" value="Update">
 	</form>
 	<br><br><br>
 </body>
 </html>