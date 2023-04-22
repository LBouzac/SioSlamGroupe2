<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <link rel="icon" type="img/png" href="img/logo.png">
    <title>register</title>
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
            <li><a href = "login.php">Connexion</a></li>
            </a>
        </ul>
    
    </nav>
</header>

<body>
    <h1 class = "titreprincipal">Inscription</h1>

    <div class ="bgimg">
        <img src ="img/M2L_bat.webp"></a>
    </div>

    <section class = "infocase">

        <h2>Inscription :</h2>
          
        <form method="POST">
        <br>Utilisateur : 
        <input name="utilisateur" id="userinscription" type="text"/>
        
        <br>
        <label for="mail">
            <br>Adresse e-mail : 
        </label>
   
        <input name="mail" id="mailinscription" type="text"/>
        <br>
        
        <label for="password">
            <br>Mot De Passe : 
        </label>

        <input name="mdpAconfirmer" id="passwordAconfirmerinscription" type="password"/>
        <br>

        <label for="password">
            <br>Confirmation Mot De Passe : 
        </label>

        <input name="mdp" id="passwordinscription" type="password"/> <!-- Le mdp est confirmé-->
        <br><br>
        
        <select name="TypeUtilisateur" id="TypeUtilisateur">
            <option value="1">Simple Utilisateur</option>
            <option value="2">Admin</option>  <!-- SuperAdmin est attribué manuellement-->
        </select>

        <select name="TypeSport" id="TypeSport">
            <option value="1">VolleyBall</option>
            <option value="2">Basketball</option>+    
            <option value="3">Footbal</option>
            <option value="4">Handball</option>
        </select>

        <br><br>
        
        <?php
            require_once "config.php";
            session_start();
            /*INSERT INTO utilisateur (idUtilisateur, pseudo, motDePasse, e_mail, idType, idLigue) VALUES (9, "test", "test", "email@test.com", 3, 3);*/
            try 
            {
                if(isset($_POST["utilisateur"]) && $_POST["mdp"] && $_POST["mail"] && $_POST["TypeUtilisateur"] && $_POST["TypeSport"])
                {
                    $user = $_POST["utilisateur"];  
                    $pass = $_POST["mdp"];
                    $mdpAconfirm = $_POST["mdpAconfirmer"];

                    if($pass == $mdpAconfirm)
                    {
                        $email = $_POST["mail"];
                        $idType = (int)$_POST["TypeUtilisateur"];
                        //die("idtype: ". $idType);
                        $idLigue = (int)$_POST["TypeSport"];
                    
                        $pdo = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_NAME.'', DB_USERNAME, DB_PASSWORD);
                        $sql = 'INSERT INTO utilisateur (pseudo, motDePasse, e_mail, idType, idLigue) VALUES (:user, :pass, :email, :idType, :idLigue);';
                    
                        //$sql = "SELECT utilisateur.idUtilisateur, utilisateur.pseudo FROM utilisateur WHERE utilisateur.pseudo = :user AND utilisateur.motDePasse = :pass";
                    
                        $sth = $pdo->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
                        $sth->execute(['user' => $user, 'pass' => $pass, 'email' => $email, 'idType' => $idType, 'idLigue' => $idLigue]);
                        $sth->fetchAll();
                        header("Location: register_check.php");
                    }
                    else
                    {
                        echo "<p>Les mots de passes ne correspondent pas </p>";
                    }
                }
            }
            catch(Exception $error) 
            {
                echo "<p>Erreur Nom Utilisateur / E-mail déjà existant</p>";
            }
        ?>

        <a href = "index.php">
            <button class = "boutonacces">
                Annuler
            </button>
        </a>

        &nbsp; &nbsp;

        <a href = "register_check.php">
            <button class = "boutonacces">
                Confirmer
            </button>
        </a>
        </form>  
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
