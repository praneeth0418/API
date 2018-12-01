<?php
	session_start();
	echo "welcome ".$_SESSION['username'];
	session_destroy();
?>