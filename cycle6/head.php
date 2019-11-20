<?php
/**
 * Created by PhpStorm.
 * User: joshe
 * Date: 11/19/2019
 * Time: 10:19 PM
 */
session_start();
$currentfile = basename($_SERVER['PHP_SELF']); //get current filename
$rightnow = time(); //set current time

//turn on error reporting for debugging - Page 699
error_reporting(E_ALL);
ini_set('display_errors','1'); //change this after testing is complete

//set the time zone
ini_set( 'date.timezone', 'America/New_York');
date_default_timezone_set('America/New_York');

require_once "connect.php";
require_once "functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Josh's Pharmacy</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
<header>
    <h1>Welcome to Josh's Pharmacy. This website is still in the works but feel free to <a href="makeappointment.php">make an appointment</a> to pick up your medications.</h1>
</header>
<main>

