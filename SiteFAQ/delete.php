<?php
    session_start();
    include 'config.php';
    try
    {
        $db = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_NAME.';charset=utf8mb4', DB_USERNAME, DB_PASSWORD);
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    $supp = $db->prepare('DELETE FROM faq WHERE idQuestion= ? ');
    $supp->execute([$_GET['idquestionSupp']]);

    header('Location: list.php');
?>
