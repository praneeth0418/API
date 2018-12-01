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
		$_POST['friend']="kiran";
		if(isset($_POST['friendbutton']))
		{
			array_push($friends,"Praneeth","vasi",$_POST['friend'],"rahul");
			
			
		}
		else {echo "not working";}
		
		
			if(is_array($friends))
			{
				
				
				$friendarr = array();
				
				foreach($friends as $friend)
				{		
						$frd = mysqli_real_escape_string($db,$friend);
						$friendarr[] = "$frd";
						foreach($friendarr as $farr)
						{
							$sql    = "INSERT INTO friendslist VALUES ('$username','$farr')"; //insering user details to the database.
							mysqli_query($db,$sql);
						}
				}
			}	
	}
	else {echo "not working";}