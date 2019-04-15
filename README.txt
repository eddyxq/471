CPSC 471: Database Management Systems
Library Management System by Group #3
	-Trilok Patel 
	-Muhammad Saadan
	-Eddy Qiang

In order to run this system please do the following
1. Install XAMPP (or any distribution that contains phpMyAdmin, PHP 7, mySQL, Apache distribution
	preferrably XAMPP for ease of use)
2. Download the project
3. Locate the htdocs folder inside the installation files of XAMPP from the local disk
	where XAMPP is installed
4. Copy all the project files directly into the htdocs folder, and the image (library.png) into the img folder
	(if they are not already there)
5. Open XAMPP, and start Apache and MySQL
6. Go to your preferred browser, and type localhost in the url box
7. Go to phpmyAdmin and create a database named "lms" and then click import on the top of the page
	in order to open the lms.sql file that was part of the project folder in order to load the 
	database. For the encoding, make sure to use utf8_general_ci
	Note: Make sure that the root user for the phpmyadmin account that is being used
	to access the database has no password and in the field says "".
8. Once successfully loaded, go to the browser and type localhost in the search bar again and you will
	be redirected to the system to log in!
	Credentials for sample users
	Member: 
		UserID: 1
		Password: pass1
	Librarian: 
		UserID: 3
		Password: pass3
	Administrator: 
		UserID: 4
		Password: pass4