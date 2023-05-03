
<?php
/*
$servername = "localhost";
$database = "geumcain_tekvisory";
$username = "geumcain_tekvisory";
$password = "geumcain_tekvisory";
 
 */
$servername = "localhost";
$database = "tekvisory";
$username = "root";
$password = "";

// Create connection
 
$con = mysqli_connect($servername, $username, $password, $database);
 
// Check connection
 
if (!$con) {
    
    die("Connection failed: " . mysqli_connect_error());
}

?>
