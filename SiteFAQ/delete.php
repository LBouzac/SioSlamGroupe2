<?php
include 'config.php';
try
 
{
    $db = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_NAME.'', DB_USERNAME, DB_PASSWORD);
}
 
catch(Exception $e)
 
{
        die('Erreur : '.$e->getMessage());
}
//$id = $_GET['idquestionSupp'];
$supp = $db->prepare('DELETE FROM faq WHERE idQuestion= ? ');
$supp->execute([$_GET['idquestionSupp']]);

header('Location: list.php');
 