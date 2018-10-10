<?php
session_start();

$_SESSION['userlevel'];

if ($_SESSION['userlevel'] == 0) {
    header("Location: index.php");
}
else if ($_SESSION['userlevel'] == 1 || $_SESSION['userlevel']== 2) {
 
}

?>