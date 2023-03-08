<?php
$host = "localhost";
$user = "mmppppss";
$pass = "9057";
$dbname = "mmppppss";
$connect = pg_connect("host=$host dbname=$dbname user=$user password=$pass") or die('No se ha podido conectar: ' . pg_last_error());

?>