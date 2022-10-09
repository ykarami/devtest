<?php

    require_once('connexiondb.php');
    $idStagiaire =  isset($_GET['idStagiaire'])?$_GET['idStagiaire']:0;
    
    $requet = "SELECT *  FROM stagiaire WHERE idStagiaire= $idStagiaire";
    $resultat = $pdo->query($requet);
    $stagiaire = $resultat->fetch();

    $idStagiaire = $stagiaire['idStagiaire'];
    $nom = $stagiaire['nom'];
    $prenom = $stagiaire['prenom'];
    $civilite = $stagiaire['civilite'];
    $idFiliere = $stagiaire['idFiliere'];

    

    $requetFiliere = "SELECT * FROM filiere LIMIT 8 ";
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
                <div class="panel-heading">Entrer les informations dez stagiaire: </div>
                <div class="panel-body">
                    <form method="post" action="updateStagiaire.php" class="form">
                        <div class="form-group">
                            <label for="idF">ID Stagiaire :</label> &nbsp<?php echo $idStagiaire ?>
                            <input type="hidden" name="idS" class="form-control" value="<?php echo $idStagiaire ?>">
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prénom :</label> 
                            <input type="text" name="prenom" class="form-control" value="<?php echo $prenom ?>">
                        </div>
                        <div class="form-group">
                            <label for="nom">Nom :</label> 
                            <input type="text" name="nom" class="form-control" value="<?php echo $nom ?>">
                        </div>
                        <div class="form-group">
                            <label for="civilite">civilité :</label> 
                            <select name="civilite" id="civilite" class="form-control">
                                <option value="F" <?php if($civilite=='F') echo "selected"?>>Féminin</option>
                                <option value="M" <?php if($civilite=='M') echo "selected"?> >Masculin</option>
                            </select>
                        </div>
                        <div class="form-group">
                        <label for="filiere">Filière :</label> 
                        <select name="filiere" class="form-control" id="filiere">
                                <?php while($filiere  = $resultatFiliere->fetch()){ ?>
                                        <option value="<?php echo  $filiere['idFiliere'] ?> "<?php if($filiere['idFiliere']==$idFiliere) echo "selected" ?> > <?php echo $filiere['nomFiliere'] ?> </option>
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