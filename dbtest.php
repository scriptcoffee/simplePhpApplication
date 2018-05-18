<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("DB_USER");
$dbpwd = getenv("DB_PASSWORD");
$dbname = getenv("DB_DATABASE");
echo $dbuser;
$connection = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);
if ($connection->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
} else {
    printf("Connected to the database");
}
$connection->close();
?>
