<?php
    // require_once("identifier.php");
    // require_once('connexiondb.php');
    // ini_set('display_errors', 'on');

    // $idUtilisateur = isset($_GET['id'])?$_GET['id']:"";

    // $requet= "SELECT * FROM utilisateur WHERE idUtilisateur=$idUtilisateur ";

    // $resultat = $pdo->query($requet);
    // $utilisateur = $resultat->fetch();
    // $idU = $utilisateur['idUtilisateur'];
    // $login = $utilisateur['login'];
    // $email = $utilisateur['email'];

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Changer mot de passe</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/fontawesome.min.css">

    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <?php include("menu.php"); ?>

        <div class="container col-lg-4 col-lg-offset-4">    
            <div class="panel panel-primary margetop">
                <div class="panel-heading">Volez changer votre mot de passe :</div>
                <div class="panel-body">
                    <form method="post" action="updateCompte.php" class="form">
                        <div class="form-group">
                            <label for="oldPwd">Ancien mot de passe :</label>
                            <input type="password" name="oldPwd" class="form-control" id="oldPwd"><span class="glyphicon glyphicon-eye-open"></span>
                        </div>
                        <div class="form-group">
                            <label for="newPwd">Nouveau mot de passe :</label>
                            <input type="password" name="newPwd" class="form-control" id="newPwd">
                        </div>
                        <div class="form-group">
                            <label for="rePwd">Repeter mot de passe :</label>
                            <input type="password" name="rePwd" class="form-control" id="rePwd">
                        </div>
                        <div class="form-group ">
                            <button type="submit" class="btn btn-success" > <span class="glyphicon glyphicon-save"></span> Enregister</button>
                        </div>      
                    </form>
                </div>
                
            </div>
        </div>   
</body>
</html>