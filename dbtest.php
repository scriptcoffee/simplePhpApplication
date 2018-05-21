<?php
$dbhost = getenv("DB_HOST");
$dbuser = getenv("DB_USER");
$dbpwd = getenv("DB_PASSWORD");
$dbname = getenv("DB_DATABASE");
$dbconn = pg_connect("host=".$dbhost." dbname=".$dbname." user=".$dbuser." password=".$dbpwd)
    or die('Could not connect: ' . pg_last_error());

$createTableStatement = "CREATE TABLE Posts (Name varchar(255),Post varchar(255));"
pg_query($query);

if (!empty($_POST['name']) && !empty($_POST['post'])) {
    $query = "INSERT INTO Posts VALUES (".$_POST['name'].",".$_POST['post'].");"
    pg_query($query) or die('Query failed: ' . pg_last_error());
}

// Performing SQL query
$query = 'SELECT * FROM Posts';
    pg_query($query) or die('Query failed: ' . pg_last_error());

// Printing results in HTML
echo "<table>\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Free resultset
pg_free_result($result);

pg_close($dbconn);
?>


<form action="dbtest.php" method="post">
Name: <input type="text" name="name"><br>
Post: <input type="text" name="post"><br>
<input type="submit">
</form>
