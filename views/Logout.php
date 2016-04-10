<?php
session_start();
unset($_SESSION["user"]);  // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
header("Location: http://localhost/MovieRater/views/index.php");
?>