<?php

session_start();
// session_unset("user");
session_unset();
header("Location: login.php");
?>