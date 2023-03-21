<?php
include 'config.php';

if ((isset($_POST['add']))) {
try
{
    $db = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_NAME.'', DB_USERNAME, DB_PASSWORD);
}
 
catch(Exception $e)
 
{
        die('Erreur : '.$e->getMessage());
}
$rep = $db->prepare('UPDATE faq SET reponseApportee= ? WHERE idQuestion= ? ');
$rep->execute([$_POST['add'], $_GET['idquestionRep']]);
var_dump($_POST);

header('Location: list.php');
}else {
    ?>
    <form method="POST">
        <textarea name="add" id="add" cols="20" rows="1" required></textarea>
        <p><button type="submit" class="Validbutton">Valider</button></p>
    </form>
    <?php
}