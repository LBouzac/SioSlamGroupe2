<?php 
    require_once "config.php";
    session_start();

    if(isset($_SESSION["pseudo"]))
        unset($_SESSION["pseudo"]);
    if(isset($_SESSION["mdp"]))
        unset($_SESSION["mdp"]);

    $identifiantsInvalid = FALSE;

    if(isset($_POST["utilisateur"]) && $_POST["mdp"]){
        $user = $_POST["utilisateur"];  
        $pass = $_POST["mdp"];
        $pdo = new PDO('mysql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_NAME.'', DB_USERNAME, DB_PASSWORD);
        $sql = "SELECT utilisateur.idUtilisateur, utilisateur.pseudo FROM utilisateur WHERE utilisateur.pseudo = :user AND utilisateur.motDePasse = :pass";
        $sth = $pdo->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $sth->execute(['user' => $user, 'pass' => $pass]);
        $usersFound = $sth->fetchAll();
        if(sizeof($usersFound) == 1)
        {
            $user = $usersFound[0];
            $id = $user["idUtilisateur"];
            $pseudo = $user["pseudo"];

            $_SESSION["pseudo"] = $pseudo;
            $_SESSION["mdp"] = $pass;   
            header("Location: list.php");
        }
        else
        {
            $identifiantsInvalid = TRUE;
        }    
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>login</title>
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
    <h1 class = "titreprincipal">Bienvenue sur le site !</h1>

    <div class ="bgimg">
        <img src ="img/M2L_bat.webp" width ='1400' height = '620'></a>
    </div>

    <section class="infocase">

        <h2>Connexion :</h2>
        <div class="invalid-id">
        <?php 
        if($identifiantsInvalid == TRUE) {
        echo('<p>Identifiants ou mot de passe invalides !</p>'); 
        } 
        ?>
        </div>
        <p>
            Utilisateur :
        </p>

        <form method="POST">
            <input name="utilisateur" id="userconnexion" type="text" value="" />
        <p>Mot de passe :</p>

            <input name="mdp" id="passwordconnexion" type="password" size="16" />


        <br><br>

            <input type="submit" value="Se connecter" class="boutonacces">          </form>


        <br><br>

        <a href = "forgotpassword.php">
            <button class = "boutonoubli">
                Mot de Passe oublié ?
            </button>
        </a>
        
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
</html>
