<?php

    require_once('connexiondb.php');
    $idStagiaire =  isset($_GET['idStagiaire'])?$_GET['idStagiaire']:0;
    
    // $requet = "SELECT *  FROM stagiaire WHERE idStagiaire= $idStagiaire";
    // $resultat = $pdo->query($requet);
    // $stagiaire = $resultat->fetch();

    // $idStagiaire = $stagiaire['idStagiaire'];
    // $nom = $stagiaire['nom'];
    // $prenom = $stagiaire['prenom'];
    // $civilite = $stagiaire['civilite'];
    // $idFiliere = $stagiaire['idFiliere'];

    $requetFiliere = "SELECT * FROM filiere ";
    $resultatFiliere = $pdo->query($requetFiliere);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editer stagiaire</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <?php include("menu.php"); ?>

        <div class="container">    
            <div class="panel panel-primary margetop">
                <div class="panel-heading">Entrer les informations des stagiaire: <?php echo $idFiliere ?>;</div>
                <div class="panel-body">
                    <form method="post" action="insertStagiaires.php" class="form">
                        <div class="form-group">
                            <label for="prenom">Prénom :</label> 
                            <input type="text" name="prenom" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="nom">Nom :</label> 
                            <input type="text" name="nom" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="civilite">Civilité :</label> 
                            <select name="civilite" id="civilite" class="form-control">
                                <option value="F"?>Féminin</option>
                                <option value="M" >Masculin</option>
                            </select>
                        </div>
                        <div class="form-group">
                        <label for="filiere">Filière :</label> 
                        <select name="filiere" class="form-control" id="filiere">
                                <?php while($filiere  = $resultatFiliere->fetch()){ ?>
                                        <option value="<?php echo  $filiere['idFiliere'] ?>"> <?php echo $filiere['nomFiliere'] ?> </option>
                               <?php } ?>
                        </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" > <span class="glyphicon glyphicon-save"></span> Enregister </button>
                        </div>      
                    </form>
                </div>
                
            </div>
        </div>   
</body>
</html>