<?php 
	if(isset($_SESSION['id'])) {
		header("Location: index.php");
	};

	if(isset($_POST['register'])) {
		include("db.php");

		$username = strip_tags($_POST['username']);
		$password = strip_tags($_POST['password']);
		$password_confirm = strip_tags($_POST['password_confirm']);
		$email = strip_tags($_POST['email']);

		$username = stripslashes($_POST['username']);
		$password = stripslashes($_POST['password']);
		$password_confirm = stripslashes($_POST['password_confirm']);
		$email = stripslashes($_POST['email']);

		$username = mysqli_real_escape_string($db, $username);
		$password = mysqli_real_escape_string($db, $password);
		$password_confirm = mysqli_real_escape_string($db, $password_confirm);
		$email = mysqli_real_escape_string($db, $email);


		$sql_store = "INSERT INTO users(username,password,email) VALUES ('$username','$password','$email')";
		$sql_fetch_username = "SELECT username FROM users WHERE username='$username'";
		$sql_fetch_email = "SELECT email FROM users WHERE email='$email'";

		$query_username = mysqli_query($db, $sql_fetch_username);
		$query_email = mysqli_query($db, $sql_fetch_email);

		if(mysqli_num_rows($query_username)) {
			echo  "<div id = 'login-form'>There is already a user with that name!</div>";
			return;
		}

		// if($username == ""){
		// 	echo "Please insert a username";
		// 	return;
		// }

		// if($password == "" || $password_confirm == ""){
		// 	echo "Please insert your password";
		// 	return;
		// }

		// if ($password != $password_confirm){
		// 	echo "The password do not match";
		// 	return;
		// }

		// if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		// 	echo "This is not valid";
		// 	return;
		// }

		// if (mysqli_num_rows($query_email)){
		// 	echo "That email is already in use!";
		// 	return;
		// }

		mysqli_query($db, $sql_store);

		header("Location: login.php");
	}
 ?>


<html>>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <!-- <script src="script/script.js"></script> -->
  <title>Sign Up</title>
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
      <li><a href="login.php">Log In | </a></li>
      <li><a href="register.php">Sign Up</a></li>
    </ul>
  </div>
  <center>

    <div id="login-form">
        <h1>Sign Up</h1>
        <fieldset>
            <form  action="register.php" method="POST" ecntype="multipart/form-data" name="registration" onsubmit='return validate()'>
                <input type="text" placeholder="Username" name="username" id="user">
                <input type="password"  required placeholder="Password" name="password">
                <input type="password"  required placeholder="Confirm password" name="password_confirm">
                <input type="text"  required placeholder="Email Adress" name="email">
                <input type="submit" name="register" value="Sign Up">

<!--                 <footer class="clearfix">
                    <p><span class="info"></span><a href="#">Need help?</a></p>
                </footer> -->

            </form>
        </fieldset>

    </div>
    </center>
    </div>
</body>
<script type="text/javascript">
	function validate() {
	var logtest = /^[a-z0-9_-]{3,16}$/;
	var login = document.forms["registration"]["username"].value;

	var email = document.forms["registration"]["email"].value;
	var emailtest = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;

	var password = document.forms["registration"]["password"].value;
	var rpassword = document.forms["registration"]["password_confirm"].value;
	
	 if(!logtest.test(login)){
	    alert("Login must contain only a-z, 0-9 and symbols '-' and '_', and be more than 2 and less than 16")
	    return false;
	}
	  else if (!emailtest.test(email)) {
    	alert("Email must contain @ and must be like: mail@mail.com");
    	return false;
  	}

  	else if(password.length<4 || password.length>15){
    	alert("Password length must be more than 4 and less than 15");
    	return false;
    }

  	else if(!(password==rpassword)){
    	alert("Passwords are not same");
    	return false;
    }
}

//   else{
//     alert("Changes successfully saved")
//   }
// };
</script>
</html>