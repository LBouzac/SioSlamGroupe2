<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <link rel="icon" type="img/png" href="img/logo.png">
    <title>index</title>
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


<body id = "accueilbody">
    
    <h1 class = "titreprincipal">Bienvenue sur le site !</h1>

    <div class ="bgimg">
        <img src ="img/M2L_bat.webp">
    </div>


    <section class = "infocase">

        <h2>Vous avez un compte ?</h2> 
    
        <a href = "login.php">
            <button class = "boutonacces">
                Se connecter
            </button>
        </a>
        
        <h2>Vous n'avez pas compte ?</h2>

        <a href = "register.php"> 
            <button class = "boutonacces">
                S'inscrire
            </button>
        </a>

        <br><br> 
        
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
