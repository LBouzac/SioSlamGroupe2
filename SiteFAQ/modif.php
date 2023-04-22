<?php
    session_start();

    include "config.php";
        
    try
    {
        $db = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_NAME.';charset=utf8mb4', DB_USERNAME, DB_PASSWORD);
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
        
    if(isset($_GET['idQuestionModif']))
    {
        $numquestion = $_GET['idQuestionModif'];
        $sqlQuestionCible = "SELECT idQuestion, libelleQuestion FROM faq WHERE idQuestion = :question";

        $req=$db->prepare($sqlQuestionCible);
        $req->execute(["question" => $numquestion]); 
        $question = $req->fetch();
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modif</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
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
            </ul>
        </nav>
    </header>

    <h1 class = "titreprincipal">Modification d'une question</h1>

    <div class ="bgimg">
        <img src ="img/M2L_bat.webp"></a>
    </div>

    <section class="infocase">

        <h2>Modification de la question :</h2>

        <?php
            echo "<strong>Question d'origine : </strong><br>";
        
            echo "<tr><td>".$question['idQuestion'].') '."</td>";
            echo "<td>".$question['libelleQuestion']."</td></tr>";
        
            echo "<br><br>";
            echo "Nouvelle Question :";
            echo "<br>";
            echo "<form method='post'>";     
            echo "<input type='hidden' name='idQuestionModif' value='$numquestion' />";  
            //echo "<input type='text' name='ModifQuestionLibelle' />";  
            echo "<textarea name='ModifQuestionLibelle' id='add' cols='40' rows='7' required></textarea>";
            echo "<br><br>"; 
            echo "<div class='alignementbouton'>";         
            echo "<button class='boutonacces'><a href ='list.php'>Annuler</a></button>";                
            echo "<input class='boutonacces' type='submit' name='send' value='OK'>"; 
            echo "</div>";
            echo "</form>";  
                                         
            echo "<br><br>"; 

            if(isset($_POST['ModifQuestionLibelle']))
            {
                $questionmodif = $_POST['ModifQuestionLibelle'];
            
                $sqlmodif = "UPDATE faq SET libelleQuestion=:questionmodif WHERE idQuestion = :numquestion";
            
                $req = $db->prepare($sqlmodif);
                $req->execute([
                    ":questionmodif" => $questionmodif,
                    ":numquestion" => $numquestion
                ]);
                header("Location: list.php");
            }
        ?> 
    </section>

    <footer>
        <div id="colonne">
            <h3>Localisation</h3>
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2633.407534895309!2d6.212015076932612!3d48.697691071310835!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x479498337fd326ab%3A0x193970a28747751e!2sMaison%20R%C3%A9gionale%20des%20Sports!5e0!3m2!1sfr!2sfr!4v1675181707166!5m2!1sfr!2sfr" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>

        </div>

        <div id="colonne2">
            <h3>Contact :</h3>
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
</html>
