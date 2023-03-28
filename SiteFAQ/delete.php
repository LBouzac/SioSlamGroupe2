<?php
    session_start();
    include 'config.php';

    if ((isset($_POST['submit']))) 
            {                
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
            }
            else 
            {
        ?>
            <br><br><strong>Etes vous sur de vouloir Supprimer la question ?!</strong>
            <form method="POST">
                <p><button type="submit" name="submit" class="boutonacces">Valider</button>
            </form>
            <button class="boutonacces"><a href="list.php">Annuler</a></button>
        <?php
            }
