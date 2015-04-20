<?php
// Connect to database server
$conn = mysql_connect("localhost", "daniwebs_dani", "dani1980"); 

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select database
mysql_select_db("daniwebs_ikeet") or die(mysql_error()); 

?>