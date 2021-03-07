<?php

session_name("BananePoire");
session_start();

if (!isset($_SESSION['loggedIn']) || !isset($_SESSION['isAdmin'])) {
  exit();
}
require 'Database.php';
require 'utils.php';


$dbh= Database::connect();

$array = Event::getAllEvenementCall($dbh);
if(count($array)==0) return null;
$id = $array[0]['id'];

if(isset($_GET['id'])){
  $id = $_GET['id'];
}

echo json_encode(Event::getInscritsEvent($dbh,$id));