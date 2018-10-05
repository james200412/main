<?php

DEFINE ('DB_USER', 'root');

DEFINE ('DB_PASSWORD', '');

DEFINE ('DB_HOST', 'localhost');

DEFINE ('DB_NAME', 'fyp_final');



// Make the connection:

$connect = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );





// Set the encoding...

mysqli_set_charset($connect, 'utf8');