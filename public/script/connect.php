<?php
function connect() {
    // connect to db
    $host = "localhost";
    $database = "360site";
    $user = "webuser";
    $password = "P@ssw0rd";

$connection = mysqli_connect($host, $user, $password, $database);

$error = mysqli_connect_error();
if($error != null)
{
  $output = "<p>Unable to connect to database!</p>";
  exit($output);
} else return $connection;
}

?>