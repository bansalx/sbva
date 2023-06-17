<?php
/* Attempt to connect to MySQL database */
include_once 'includes/config.php';

// Command Set 1
$sql = "CREATE TABLE `reviews` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(100) NOT NULL,
	`review` VARCHAR(255) NOT NULL,
	`country` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1";

mysqli_query($con, $sql);

// Command Set 2
$sql = "CREATE TABLE `login` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(255) NOT NULL,
	`password` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='latin1_swedish_ci'";
mysqli_query($con, $sql);

// Command Set 3
$sql = "INSERT INTO login (id, username, password) VALUES (1, 'sagar', 'bansal')";
mysqli_query($con, $sql);
$sql = "INSERT INTO login (id, username, password) VALUES (2, 'alice', 'password1')";
mysqli_query($con, $sql);
$sql = "INSERT INTO login (id, username, password) VALUES (2, 'bob', 'impossible')";
mysqli_query($con, $sql);


// Command Set 4
$sql = "INSERT INTO reviews (id, name, review, country) VALUES (1, 'Sagar Bansal', 'SBVA Is An Awesome Application!', 'India')";
mysqli_query($con, $sql);

// Redirect To Index Page
header("location: index.php");

// Close connection
mysqli_close($con);
?>