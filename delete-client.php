<?php
require('includes/admin-auth.php');

// use client id value to retrieve page data
$id = $_GET['id'];

// connect to database
require('includes/db.php');

// query to check if id exists
$sql = "SELECT * FROM optproj_clients WHERE id = :id";
$cmd = $db->prepare($sql);
$cmd->bindParam(':id', $id, PDO::PARAM_INT);
$cmd->execute();
$client = $cmd->fetch();

// query to delete data if page exists
$sql = "DELETE FROM optproj_clients WHERE id = :id";
$cmd = $db->prepare($sql);
$cmd->bindParam(':id', $id, PDO::PARAM_INT);
$cmd->execute();

// disconnect to database
$db = null;

// redirect to the updated page
header('location:clients.php');

?>