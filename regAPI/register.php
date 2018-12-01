<?php
	session_start();
	//connecting to the database
	
	//I'm assigning the values as the ask is not to design user interface. 
	//I've used postman api before assigning values, to check this API. This is perfectly working.
	$_POST['button']="ok";
	$db = mysqli_connect("localhost","root","root","authentication");
	if(isset($_POST['button']))
	{
		session_start();
		$_POST['username'] = "vignesh";
		$_POST['email'] = "abcd@gail@gmail.com";
		$_POST['password']="123456";
		$_POST['password2']="123456";
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$email = mysqli_real_escape_string($db,$_POST['email']);
		$password = mysqli_real_escape_string($db,$_POST['password']);
		$password2 = mysqli_real_escape_string($db,$_POST['password2']);
		
		if($password == $password2)
		{
			//create user
			$password = md5($password); //hashing the password before storing.
			$sql    = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')"; //insering user details to the database.
			mysqli_query($db,$sql);
			$_SESSION['message'] = "You are now logged in.";
			$_SESSION['username'] = $username;
			header("location: home.php");
			exit();
			
		}else
		{
			//creation failed
			$_SESSION['message'] = "Please ensure  <br>1. two passwords did match<br> 2. You do not have account with same username and email already.";
		}
	}else{echo "not set";}
?>