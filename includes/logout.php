<?php 
///Code...

//Lets Starting the session to make all session of logout mod..
session_start();

///Make All session to null after logout..
$_SESSION['username'] = null;
$_SESSION['firstname'] = null;
$_SESSION['lastname'] = null;
$_SESSION['usertype'] = null;

//Redirecting to HOME SITE after logout...
header("Location: ../index.php");
