<?php
session_start();
require_once "includes/functions.php";
// Destroying user Sessions
unset($_SESSION['email']);
unset($_SESSION['user_id']);
unset($_SESSION['admin_uqtext']);
// Redirecting To Home Page
redirect_to("index.php");