# freelance-destro
A php file that will self delete all the files,folders and subfolders uppon supplying a configured password with a GET request

I made this script after I was scammed while doing a freelance work. The person who was supposed to pay me never did, and the day I realised he wasn't going to pay, I was going to delete the websites I did for him, but he had already changed FTP user and pass. I realised if I had this type of script, I would still have some leverage even without having account access. So I made this in order to have leverage in my future freelance jobs if things ever go south. 

Please make sure you have a backup before using this code. Use at your own risk. This file will selfdestruct with the website.

# Instructions

  1. Add this file to the root directory of the website.
  2. Write the siteurl.com/struct.php?setup and follow the setup instructions.	
  3. Activate the selfdestruct by typing out siteurl.com/struct.php?p=password
