<?php
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
</head>
<body>
    <?php
        echo "Question d'origine : ";
        
        echo "<tr><td>".$question['idQuestion'].') '."</td>";
        echo "<td>".$question['libelleQuestion']."</td></tr>";
        
        echo "<br><br>";
        echo "Nouvelle Question :";
        echo "<br>";
        echo "<form method='post'>";     
        echo "<input type='hidden' name='idQuestionModif' value='$numquestion' />";  
        echo "<input type='text' name='ModifQuestionLibelle' />";  
        echo "<br><br>";                              
        echo "<input type='submit' name='send' value='OK'>"; 
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

</body>
</html>