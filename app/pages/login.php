<?php 
    session_start();

    if(isset($_SESSION['erreurLogin']))
        $erreur = $_SESSION['erreurLogin'];
    else{
        $erreur = "";
        }    
    session_destroy();    


?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Se connecter</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

        <div class="container col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3">    
            <div class="panel panel-primary margetop">
                <div class="panel-heading">Se connecter<?php echo $idFiliere ?></div>
                <div class="panel-body">
                    <form method="post" action="seConnecter.php" class="form">
                        <?php if(!empty($erreur)){ ?>
                            <div class="alert alert-danger">
                                <?php  echo $erreur ?>
                            </div>
                        <?php } ?>
                        <div class="form-group">
                            <label for="login">Login :</label> 
                            <input type="text" name="login" class="form-control"id="login" >
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe :</label> 
                            <input type="password" name="password" class="form-control"  id="password">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" > <span class="glyphicon glyphicon-log-in"></span> Connexion </button>
                        </div>      
                    </form>
                </div>
                
            </div>
        </div>   
</body>
</html>