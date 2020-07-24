<?php
session_start();
require_once("../include/functions.php");
$_SESSION["admin_name"]=null;
// session_destroy();
redirect("index.php");
?>