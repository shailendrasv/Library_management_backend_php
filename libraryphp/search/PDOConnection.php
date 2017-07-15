<?php

/* Connect to an ODBC database using driver invocation */
$dsn = 'mysql:dbname=libraryphp;host=127.2.178.2';
$user = 'admin5w1t1lz';
$password = 'C7geavSj_bVH';

try {
    $cnn = new PDO($dsn, $user, $password);
	$cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}


?>
