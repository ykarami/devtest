<?php   
        require_once("identifier.php");
        require_once("connexiondb.php");
        ini_set('display_errors', 'on');
        $filiere = isset($_GET['filiere'])?$_GET['filiere']:0;
        $nomPrenom = isset($_GET['nomPrenom'])?$_GET['nomPrenom']:"";
        

        $size = isset($_GET['size'])?$_GET['size']:10;
        $page = isset($_GET['page'])?$_GET['page']:1;
        $offset = ($page-1)*$size;


        $requetFiliere = "SELECT * FROM filiere  ";

        if($filiere==0){
            $requestStagiaire = "SELECT idStagiaire,nom,prenom,nomFiliere,civilite FROM filiere as f,stagiaire as s WHERE f.idFiliere=s.idFiliere 
                                AND(nom like '%$nomPrenom%' OR prenom LIKE '%$nomPrenom%') ORDER BY idStagiaire LIMIT $size offset $offset";
                                 
            $requestStagiaireCount = "SELECT COUNT(*) countS FROM stagiaire WHERE nom like '%$nomPrenom%' OR prenom like '%$nomPrenom%'";                       
        }else{
            $requestStagiaire = "SELECT idStagiaire,nom,prenom,nomFiliere,civilite FROM filiere as f,stagiaire as s WHERE f.idFiliere=s.idFiliere 
                                AND(nom like '%$nomPrenom%' OR prenom LIKE '%$nomPrenom%') AND f.idFiliere=$filiere ORDER BY idStagiaire limit $size offset $offset ";
    
            $requestStagiaireCount = "SELECT COUNT(*) countS FROM stagiaire WHERE (nom like '%$nomPrenom%' OR prenom like '%$nomPrenom%') AND idFiliere=$filiere ";                    
        }

        $resultatFiliere = $pdo->query($requetFiliere);

        $resultatStagiaire = $pdo->query($requestStagiaire);
        $resultatStagiaireCount = $pdo->query($requestStagiaireCount);

        $tabCount = $resultatStagiaireCount->fetch();
        $nbrS = $tabCount['countS'];
        $reste = $nbrS%$size;
        if($reste==0){
            $nbrPage = $nbrS/$size;
        }else{
            $nbrPage = floor($nbrS/$size)+1;
        }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestion des fili??ere</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"> 
    <link rel="stylesheet" type="text/css" href="../css/style.css">     
</head>
<body>
    <?php include("menu.php"); ?>

        <div class="container">    
            <div class="panel panel-default margetop">
                <div class="panel-heading">Rechercher des stagiares</div>
                <div class="panel-body">
                    <form method="get" action="stagiaires.php"class="form-inline">
                        <div class="form-group" >
                            <label for="filiere">Filiere : </label>
                            <select name="filiere" id="filiere" class="form-control">
                                <option value="0">Toutes les filieres </option>
                                <?php while($filiereL=$resultatFiliere->fetch()){  ?>
                                <option value="<?php echo $filiereL['idFiliere']?>" <?php if($filiereL['idFiliere']==$filiere) echo "selected"?> ><?php echo $filiereL['nomFiliere']?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="nomPrenom" placeholder="Tapez le nom et le pr??nom" class="form-control" value="<?php echo $nomPrenom ?>">
                        </div>
                        <button type="submit" class="btn btn-success" > <span class="glyphicon glyphicon-search"></span> Chercher...</button>
                        &nbsp &nbsp
                        <?php if($_SESSION['user']['role']=='ADMIN'){ ?>
                        <a href="newStagiaire.php"><span class="glyphicon glyphicon-plus"> </span> Nouveau stagiaire</a>

                        <?php } ?>
                    </form>
                </div>
            </div>
            <div class="panel panel-primary margetop">
                <div class="panel-heading">Liste des Stagiaires: (<?php echo $nbrS ?>)Stagiaires</div>     

                <div class="panel-body">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th>id Stagiaire</th><th>Pr??nom </th><th>Nom</th><th>Civilit??</th><th>Fili??re</th><?php if($_SESSION['user']['role']=='ADMIN'){ ?><th>Actions</th> <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while($stagiaire=$resultatStagiaire->fetch()){?>
                            <tr>
                                <td><?php echo $stagiaire['idStagiaire'] ?></td>
                                <td><?php echo $stagiaire['prenom']?></td>
                                <td><?php echo $stagiaire['nom']?></td>
                                <td><?php echo $stagiaire['civilite']?></td>
                                <td><?php echo $stagiaire['nomFiliere']?></td>
                                <?php if($_SESSION['user']['role']=='ADMIN'){  ?> 
                                <td>
                                    <a href="editStagiaire.php?idStagiaire=<?php echo $stagiaire['idStagiaire']?>">
                                        <span class="glyphicon glyphicon-edit"> </span>
                                    </a>
                                     &nbsp 
                                     <a onclick="return confirm(' etes vous sur de suprimer')" href="deleteStagiaires.php?idStagiaire=<?php echo $stagiaire['idStagiaire'] ?>" >
                                        <span class="glyphicon glyphicon-trash"> </span>
                                     </a>
                                </td>
                                <?php } ?>
                            </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                    <div >
                        <ul class="pagination">
                        <?php  for($i=1; $i<=$nbrPage;$i++){ ?> 
                            <li class="<?php if($i==$page) echo 'active' ?>"><a href="stagiaires.php?page=<?php echo $i;?>&filiere=<?php echo $filiere ?>&nomPrenom=<?php echo $nomPrenom ?>">  <?php echo $i; ?> </a></li>
			<?php } ?>  

                        </ul>
                          
                    </div>
                </div>   
            </div>
        </div>   

</body>
</html>
