<?php
/* Attempt to connect to MySQL database */
include_once 'includes/config.php';
// Prepare an insert statement
    $sql = "TRUNCATE  reviews ";
    mysqli_query($con, $sql);


 header("location: setup.php");

    // Close connection
    mysqli_close($con);

?>
