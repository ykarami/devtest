<?php
    require_once('connexiondb.php');
    ini_set('display_errors', 'on');

    $idUtilisateur = isset($_GET['idUtilisateur'])?$_GET['idUtilisateur']:"";

    $requet= "SELECT * FROM utilisateur WHERE idUtilisateur='$idUtilisateur' ";

    $resultat = $pdo->query($requet);
    $utilisateur = $resultat->fetch();
    $idU = $utilisateur['idUtilisateur'];
    $login = $utilisateur['login'];
    $email = $utilisateur['email'];
    $role = $utilisateur['role'];
    $etat = $utilisateur['etat'];


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

        <div class="container">    
            <div class="panel panel-primary margetop">
                <div class="panel-heading">Entrer les informations de l'utilisateur :</div>
                <div class="panel-body">
                    <form method="post" action="updateUtilisateur.php" class="form">
                    <div class="form-group">
                            <label for="idF">ID Utilisateur :</label> &nbsp<?php echo $idU ?>
                            <input type="hidden" name="idS" class="form-control" value="<?php echo $idU ?>">
                        </div>
                        <div class="form-group col-xs-5">
                            <label for="login">Login:</label> 
                            <input type="text" name="login" class="form-control" value=" <?php echo $login  ?>" id="login">
                        </div>
                        <div class="form-group col-xs-5">
                            <label for="email">email :</label> 
                            <input type="text" name="email" class="form-control" value=" <?php echo $email  ?>" id="email">
                        </div>
                        <div class="form-group col-xs-5">
                            <label for="role">Role :</label> 
                            <select name="role" id="role" class="form-control">
                                <option value="ADMIN" <?php if($role=="ADMIN") echo "SELECTED"?>> ADMIN</option>
                                <option value="VISITEUR"<?php if($role=="VISITEUR") echo "SELECTED"?>>VISITEUR</option>
                            </select>
                        </div>
                        <div class="form-group col-xs-5">
                            <label for="etat">Etat :</label> 
                            <select name="etat" id="etat" class="form-control">
                                <option value="1" <?php if($etat==1) echo "SELECTED"?>>Active</option>
                                <option value="0" <?php if($etat==0) echo "SELECTED"?>>Inactive</option>
                            </select>
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