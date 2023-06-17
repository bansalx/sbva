<?php
session_start();
/* Attempt to connect to MySQL database */
$con = mysqli_connect("localhost", "user", "userpass", "sbva_main");

// Check connection
if ($con === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$myfile = fopen("includes/config.db", "r") or die("config.db file is missing!");
 $rfile1 = fread($myfile,filesize("includes/config.db"));
                 $val1=explode("=",$rfile1);
                 $value=trim($val1[1]);
                 if($value!='true' && $value!='false')
                 	die("Value of env.production should be true or false!");
?>
