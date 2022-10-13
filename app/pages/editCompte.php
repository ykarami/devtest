<?php
    require_once("identifier.php");
    require_once('connexiondb.php');
    ini_set('display_errors', 'on');

    $idUtilisateur = isset($_GET['id'])?$_GET['id']:"";

    $requet= "SELECT * FROM utilisateur WHERE idUtilisateur=$idUtilisateur ";

    $resultat = $pdo->query($requet);
    $utilisateur = $resultat->fetch();
    $idU = $utilisateur['idUtilisateur'];
    $login = $utilisateur['login'];
    $email = $utilisateur['email'];

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nouvelle filièere</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <?php include("menu.php"); ?>

        <div class="container col-lg-6 col-lg-offset-3">    
            <div class="panel panel-primary margetop">
                <div class="panel-heading">Entrer les informations de l'utilisateur :</div>
                <div class="panel-body">
                    <form method="post" action="updateCompte.php" class="form">
                    <div class="form-group">
                            <label for="idF">ID Utilisateur :</label> &nbsp<?php echo $idU ?>
                            <input type="hidden" name="id" class="form-control" value="<?php echo $idU ?>">
                        </div>
                        <div class="form-group ">
                            <label for="login">Login:</label> 
                            <input type="text" name="login" class="form-control" value=" <?php echo $login  ?>" id="login">
                        </div>
                        <div class="form-group ">
                            <label for="email">email :</label> 
                            <input type="text" name="email" class="form-control" value=" <?php echo $email  ?>" id="email">
                        </div>

                        <div class="form-group col-xs-5">
                            <button type="submit" class="btn btn-success" > <span class="glyphicon glyphicon-save"></span> Enregister</button>
                        </div>      
                    </form>
                </div>
                
            </div>
        </div>   
</body>
</html>