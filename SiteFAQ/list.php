<?php 
session_start();
    include "config.php";

    if(!(isset($_SESSION["pseudo"]) && isset($_SESSION["mdp"]))){
        header("Location: login.php");
        return;
    }
?>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="main.css" />
    <link rel="icon" type="img/png" href="img/logo.png">
    <title>
        Site M2L
    </title>
</head>

<header>
    <nav>
        <!--Pour afficher le logo et revenir à l'accueil -->
        <div class = "logo">
            <a href="index.php"><img src="img/logo.png" width ='75' height = '64' /></a>
            <h1>Site Projet</h1>
        </div>

        <ul>
            <li><a href = "index.php">Accueil</a></li>
            <li><a href = "logout.php">Déconnexion</a></li>
            </a>
        </ul>

    </nav>
</header>


<body> 

    <section class="page-content">
        <!--<header>
            <h1 class="titreprincipal">FAQ</h1>
        </header>-->
        <img src="img/FAQ.png" alt="imageFAQ" width="400px" style="margin-top: 10px;">
        
	<?php 
        try{
            $db = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_NAME.'', DB_USERNAME, DB_PASSWORD);
        }        
        catch(Exception $e){
        die('Erreur : '.$e->getMessage());
        }
        if(isset($_POST["add"])) {
        $add = $_POST['add'];
        $id = $_SESSION["id"];
        $sql = "INSERT INTO faq (libelleQuestion, idUtilisateur) VALUES(:add, :id)";
        $supp = $db->prepare($sql);
        $supp->execute(['add' => $add, 'id' => $id]);
        }
        ?>


        <h2>Ajouter question</h2>
        <form method="POST">
        <textarea name="add" cols="20" rows="2"></textarea>
        <button type="submit" class="Validbutton">Valider</button> 
        <button class="button">Annuler</button>
        </form>

        <table class="style-table">
        
            <tr>
                <th>ID</th>
                <th>Utilisateur</th>
                <th>Question</th>
                <th>Reponse</th>
            </tr>
            <?php
            if ($_SESSION["Type"] => 2) {
   
            try  // Permet de modifier et supprimer
            {
                $db = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_NAME.'', DB_USERNAME, DB_PASSWORD);
                $db->exec("set charset utf8mb4");
                $query = $db ->prepare('SELECT idQuestion, pseudo, libelleQuestion,reponseApportee FROM faq, utilisateur WHERE faq.idUtilisateur=utilisateur.idUtilisateur');
                $query -> execute();
                $site = $query->fetchAll();
                foreach ($site as $key => $values) {
                    echo("<tr class=alternance ><td>".$site[$key]['idQuestion']."</td><td>".$site[$key]['pseudo']."</td>");
                    echo("<td>".$site[$key]['libelleQuestion']."</td>");
                    echo("<td>".$site[$key]['reponseApportee']."</td>");
                    echo("<td><a href=#popup2 class=button>"."Modifier"."</a><a class=SUPPbutton href=delete.php?idquestionSupp=".$site[$key]['idQuestion']."'>"."Supprimer"."</a></td></tr>");
                }
            } catch(PDOException $e)
            {
                echo "erreur : ".$e->getMessage();
                die;
            }
        } else {
            try
            {
                $db = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_NAME.'', DB_USERNAME, DB_PASSWORD);
                $db->exec("set charset utf8mb4");
                $query = $db ->prepare('SELECT idQuestion, pseudo, libelleQuestion,reponseApportee FROM faq, utilisateur WHERE faq.idUtilisateur=utilisateur.idUtilisateur');
                $query -> execute();
                $site = $query->fetchAll();
                foreach ($site as $key => $values) {
                    echo("<tr class=alternance ><td>".$site[$key]['idQuestion']."</td><td>".$site[$key]['pseudo']."</td>");
                    echo("<td>".$site[$key]['libelleQuestion']."</td>");
                    echo("<td>".$site[$key]['reponseApportee']."</td>");
                }
            } catch(PDOException $e)
            {
                echo "erreur : ".$e->getMessage();
                die;
            }
        }
            ?>

            </body>  
        </table>

    </section>

    <footer>
        <div id="colonne">
            <h3>Localisation</h3>
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2633.407534895309!2d6.212015076932612!3d48.697691071310835!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x479498337fd326ab%3A0x193970a28747751e!2sMaison%20R%C3%A9gionale%20des%20Sports!5e0!3m2!1sfr!2sfr!4v1675181707166!5m2!1sfr!2sfr" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>

        </div>

        <div id="colonne">
            <h3>Mes contact</h3>
            <p>
                <img src="img/mailLogo.png" width="12px">Mail : adresse@mail.com</a>
            </p>
            <p>
                <img src="img/LogoTelephone.png" width="10px">Numéro : 06 30 87 75 52
            </p>

        </div>
    </footer>

    <div class ="copyright">
        © M2L 2003 - 2023 : Tous droits réservés
    </div>

</body>
</div>
