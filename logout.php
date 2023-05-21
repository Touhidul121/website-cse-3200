<?php
session_start();

// destroy the session
session_destroy();

// redirect to home page
header("location: index.php");

// Git changes sync test