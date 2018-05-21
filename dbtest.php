<?php
$dbhost = getenv("DB_HOST");
$dbuser = getenv("DB_USER");
$dbpwd = getenv("DB_PASSWORD");
$dbname = getenv("DB_DATABASE");
$dbconn = pg_connect("host=".$dbhost." dbname=".$dbname." user=".$dbuser." password=".$dbpwd)
    or die('Could not connect: ' . pg_last_error());
echo pg_dbname();
pg_close($dbconn);
?>
