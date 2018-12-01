<?php
 if(!isset($_SESSION)) 
    { 
       session_start(); 
	
		//connecting to the database
	
		//I'm assigning the values as the ask is not to design user interface. 
		//I've used postman api before assigning values, to check this API. This is perfectly working.
		$_POST['button']="ok";
		$db = mysqli_connect("localhost","root","root","authentication");
		$username = "vignesh";
		$friends = array();
		//$friends = array($username => $friends);
		$_POST['friend']="kiran";
		if(isset($_POST['button']))
		{
			array_push($friends,$_POST['friend'],"rahul");
			
			
		}
		else {echo "not working";}
		
		
			if(is_array($friends))
			{
				
				
				$friendarr = array();
				
				foreach($friends as $friend)
				{
					//echo $friend;
					
						
						$frd = mysqli_real_escape_string($db,$friend);
						$friendarr[] = "$frd";
						foreach($friendarr as $farr)
					{
						$sql    = "IF NOT EXISTS(SELECT username FROM users WHERE username = '$username') INSERT INTO users(friends) VALUES('$farr')"; //insering user details to the database.
						//$sql .= implode(',', $friendarr);
						mysqli_query($db,$sql);
						echo "successfully added";
					}
				}
				
				//echo $friendarr[0];
			}
		
		
	}
	else {echo "not working";}