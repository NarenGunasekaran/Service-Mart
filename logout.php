<?php
session_start();
if($_SESSION['usernames']!=''){
unset($_SESSION['usernames']);
unset($_SESSION['userid']);
header('Location:index.php');
}

?>
