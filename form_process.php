<?php

$user_firstName = $_POST['user_firstName'];
$user_lastName = $_POST['user_lastName'];
$user_email = $_POST['user_email'];
$user_phone = $_POST['user_phone'];
$user_date = $_POST['user_date'];
$user_hostName = $_POST['user_hostName'];
$user_ip = $_POST['user_ip'];
$user_http = $_POST['user_HTTP'];
$user_https = $_POST['user_HTTPS'];
$user_cert = $_POST['user_cert'];
$user_reason = $_POST['user_reasonForProxy'];
$user_addInfo = $_POST['user_additionalInfo'];

$conn = mysqli_connect("localhost", "root", ""); //proceduarl MySQLi (i stands for improved)

	if(!$conn){
		die("Cannot Connect: " . mysql_error());		//if database cannot connect then print error
	}
		echo "Congrats you connected!";
	

$sql = "CREATE DATABASE IF NOT EXISTS form_DB";		//create database if it doesn't already exits
	if(mysqli_query($conn, $sql)){
		echo "Database Created Successfully"; //testing
	}
	else{
		echo "Error creating database: " . mysqli_error($conn);		
	}


//must select db first that we are performing queries on
mysqli_select_db($conn, 'form_DB');
//now we can start query operations (creating tables, inerting, updating, etc.)
$statement = "CREATE TABLE IF NOT EXISTS LabBenchDemo ( 			
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
userphone VARCHAR(30) NOT NULL,
userdate DATE NOT NULL,
userhostName VARCHAR(50) NOT NULL,
userIP VARCHAR(30) NOT NULL,
userhttp VARCHAR(20) NOT NULL,
userhttps VARCHAR(20) NOT NULL,
usercert VARCHAR(2000) NOT NULL,
user_reason TEXT NOT NULL,
user_addInfo TEXT NOT NULL
)";															//statement to create table with col. defined

	if (mysqli_query($conn, $statement)) {					//creating table
   		 echo "Table LabBenchDemo created successfully";   //testing
	}	 
	else {
    echo "Error creating table: " . mysqli_error($conn);
	}

$statement = "INSERT INTO LabBenchDemo (firstname, lastname, email, 
							userphone, userdate, userhostName, userIP, 
						     userhttp, userhttps, usercert, user_reason, user_addInfo) 
							 VALUES('$user_firstName', '$user_lastName', '$user_email', '$user_phone', '$user_date', '$user_hostName', 
								    '$user_ip', '$user_http', '$user_https', 'user_cert', '$user_reason', '$user_addInfo')";

	if (mysqli_query($conn, $statement)) {					//inserting values in  table
   		 echo "Form values entered sucessfully";   //tesing
		}	 
	else {
    	echo "Error inserting values: " . mysqli_error($conn);
	}






mysqli_close($conn);	//close the connection

?>