<?php
include "CustLinks.php";
include "db.php";

session_start();
echo "<br><br>";

$username = $_SESSION["Cusername"];
$flightNum = $_POST['fnum'];



?>