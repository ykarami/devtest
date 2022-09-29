<?php

    require_once('connexiondb.php');
    $idFiliere =  isset($_GET['idFiliere'])?$_GET['idFiliere']:"";
    
    $requet = "SELECT idFiliere, NomFiliere, niveau  FROM filiere WHERE idFiliere= $idFiliere";
    $resultat = $pdo->query($requet);
    $filiere = $resultat->fetch();

    $nomF = $filiere['NomFiliere'];
    $niveau = $filiere['niveau'];


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editer filièere</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <?php include("menu.php"); ?>

        <div class="container">    
            <div class="panel panel-primary margetop">
                <div class="panel-heading">Entrer les informations de la filiere :</div>
                <div class="panel-body">
                    <form method="post" action="updateFiliere.php" class="form">
                        <div class="form-group">
                            <label for="idF">ID Fieliere :</label> &nbsp<?php echo $idFiliere ?>
                            <input type="hidden" name="idF" class="form-control" value="<?php echo $idFiliere ?>">
                        </div>
                        <div class="form-group">
                            <label for="nomF">Nom de la fieliere :</label> 
                            <input type="text" name="nomF" class="form-control" value="<?php echo $nomF ?>">
                        </div>
                        <div class="form-group">
                        <label for="niveau">Niveau :</label> 
                        <select name="niveau" class="form-control" id="niveau">
                                <option value="M" <?php if($niveau=="M") echo "selected"?>>Master</option>
                                <option value="L" <?php if($niveau=="L") echo "selected"?>>Licence</option>
                                <option value="TS" <?php if($niveau=="TS") echo "selected"?>>Technicien Spécialisé</option>
                                <option value="T" <?php if($niveau=="T") echo "selected"?>>Technicien</option>
                        </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" > <span class="glyphicon glyphicon-save"></span> Enregister</button>
                        </div>      
                    </form>
                </div>
                
            </div>
        </div>   
</body>
</html>