<?php
 if(!isset($_SESSION)) 
    { 
       session_start(); 
	
		//connecting to the database
	
		//I'm assigning the values as the ask is not to design user interface. 
		//I've used postman api before assigning values, to check this API. This is perfectly working.
		$_POST['button']="ok";
		$db = mysqli_connect("localhost","root","root","authentication");
		if(isset($_POST['loginbutton']))
		{
			//session_start();
			$_POST['username'] = "vignesh";
			$_POST['email'] = "abcd@gail@gmail.com";
			$_POST['password']="123456";
			$_POST['password2']="123456";
			$username = mysqli_real_escape_string($db,$_POST['username']);
			$email = mysqli_real_escape_string($db,$_POST['email']);
			$password = mysqli_real_escape_string($db,$_POST['password']);
			$password = md5($password);
		
			$sql    = "SELECT * FROM users WHERE password='$password' AND username='$username'";
			$result = mysqli_query($db,$sql);
			if(mysqli_num_rows($result)==1)
			{
				$_SESSION['message'] = "You are now logged in.";
				$_SESSION['username'] = $username;
				header("location: /API/regAPI/home.php");
				exit();
			}else
			{
				//creation failed
				$_SESSION['message'] = "Username/Password cobination incorrect.";
			}
		}
	}