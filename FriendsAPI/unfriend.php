<?php
 if(!isset($_SESSION)) 
    { 
       session_start(); 
	
		//connecting to the database
	
		//I'm assigning the values as the ask is not to design user interface. 
		//I've used postman api before assigning values, to check this API. This is perfectly working.
		$_POST['unfriendbutton']="ok";
		$db = mysqli_connect("localhost","root","root","authentication");
		$friend= "rahul";
		$username = "vignesh";
		$sql = "DELETE from friendslist WHERE username = '$username' AND friend = '$friend'";
		$result1 = mysqli_query($db,$sql);
		$sql1 = "SELECT friend FROM friendslist WHERE username = '$username'";
		$result = mysqli_query($db,$sql1);
		if(null!=$result)
		{
			while ($row = mysqli_fetch_assoc($result)) 
			{
				printf ("%s <br>", $row["friend"]);
			}
	
		}
		else
		{echo "you are not friends.";}
	}
?>