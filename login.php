<?php 
	session_start();

	if(isset($_POST['login'])){
		include("db.php");
		$username = strip_tags(($_POST['username']));
		$passwrod = strip_tags(($_POST['password']));

		$username = stripslashes($_POST['username']);
		$password = stripslashes($_POST['password']);

		$username = mysqli_real_escape_string($db, $username);
		$password = mysqli_real_escape_string($db, $password);


		$sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
		$query = mysqli_query($db, $sql);
		$row = mysqli_fetch_array($query);
		$id = $row['id'];
		$db_password = $row['password'];
		$admin = $row['admin'];

		if ($password == $db_password) {
			$_SESSION['username'] = $username;
			$_SESSION['id'] = $id;
			if($admin==1){
				$_SESSION['admin'] = 1;
			}
			header("Location: index.php");
		} else {
			echo "You failed!";
		}

	}

 ?>

<html>>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="shortcut icon" href="img/icon.png"/>
  <link rel="stylesheet" href="style/index.css">
  <link rel="stylesheet" href="style/reg.css">
  <link rel="stylesheet" href="style/bg.css">
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
      <li><a href="login.php">Log In</a></li>
      <li><a href="register.php">Sign Up</a></li>
    </ul>
  </div>
  <center>

    <div id="login-form">
        <h1>Login</h1>
        <fieldset>
            <form  action="login.php" method="POST" ecntype="multipart/form-data">
                <input type="text" required placeholder="Username" name="username">
                <input type="password" required placeholder="Password" name="password">
                <input type="submit" name="login" value="Log In">
           <!--     <footer class="clearfix">
                    <p><span class="info"></span><a href="#">Need help?</a></p>
                </footer> --> 

            </form>
        </fieldset>

    </div>
    </center>
    </div>

</body>
</html>