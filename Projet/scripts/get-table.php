<?php

session_name("BananePoire");
session_start();

if (!isset($_SESSION['loggedIn']) || !isset($_SESSION['isAdmin'])) {
  exit();
}
require 'Database.php';
require 'utils.php';


$dbh= Database::connect();
echo json_encode(Event::getAllEvenementTable($dbh));