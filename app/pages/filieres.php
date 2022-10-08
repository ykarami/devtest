<?php
        require_once("connexiondb.php");
                
        $nomF = isset($_GET['nomF'])?$_GET['nomF']:"";
        $niveau = isset($_GET['niveau'])?$_GET['niveau']:"all";
        

        $size = isset($_GET['size'])?$_GET['size']:10;
        $page = isset($_GET['page'])?$_GET['page']:1;
        $offset = ($page-1)*$size;

        if($niveau=="all"){
            $requete= "SELECT * FROM filiere WHERE nomFiliere like '%$nomF%' limit $size offset $offset ";
            $requeteCount = "SELECT count(*) countF FROM filiere WHERE nomFiliere like '%$nomF%' ";
        }else{
            $requete= "SELECT * FROM filiere WHERE nomFiliere like '%$nomF%' AND niveau='$niveau' limit $size offset $offset ";
            $requeteCount = "SELECT count(*) countF FROM filiere WHERE nomFiliere like '%$nomF%' AND niveau='$niveau'";
        }

        $resultatF = $pdo->query($requete);
        $resultatCount = $pdo->query($requeteCount);
        $tabCount = $resultatCount->fetch();
        $nbrF = $tabCount['countF'];
        $reste = $nbrF%$size;
        if($reste==0){
            $nbrPage = $nbrF/$size;
        }else{
            $nbrPage = floor($nbrF/$size)+1;
        }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestion des filièere</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"> 
    <link rel="stylesheet" type="text/css" href="../css/style.css">     
</head>
<body>
    <?php include("menu.php"); ?>

        <div class="container">    
            <div class="panel panel-default margetop">
                <div class="panel-heading">Rechercher des filieres</div>
                <div class="panel-body">
                    <form method="get" action="filieres.php"class="form-inline">
                        <div class="form-group">
                            <input type="text" name="nomF" placeholder="Tapez le nom de filiere" class="form-control" value="<?php echo $nomF ?>">
                        </div>
                        <label for="niveau">Niveau :</label> 
                        <select name="niveau" class="form-control" id="niveau">
                            <option value="all" <?php if($niveau=="all") echo "selected" ?> >Tous les niveaux</option>
                            <option value="M" <?php if($niveau=="M") echo "selected" ?>>Master</option>
                            <option value="L" <?php if($niveau=="L") echo "selected" ?>>Licence</option>
                            <option value="TS" <?php if($niveau=="TS") echo "selected" ?>>Technicien Spécialisé</option>
                            <option value="T" <?php if($niveau=="T") echo "selected" ?>>Technicien</option>
                        </select>
                        <button type="submit" class="btn btn-success" > <span class="glyphicon glyphicon-search"></span> Chercher...</button>
                        &nbsp &nbsp
                        <a href="newFiliere.php"><span class="glyphicon glyphicon-plus"> </span> Nouvelle filiere</a>
                    </form>
                </div>
            </div>
            <div class="panel panel-primary margetop">
                <div class="panel-heading">Liste des filieres : (<?php echo $nbrF ?>) filieres</div>      
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th>id Filiere</th><th>Nom Filiere</th><th>Niveau</th><th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while($filiere=$resultatF->fetch()){?>
                            <tr>
                                <td><?php echo $filiere['idFiliere'] ?></td>
                                <td><?php echo $filiere['nomFiliere']?></td>
                                <td><?php echo $filiere['niveau']?></td>

                                <td>
                                    <a href="editFiliere.php?idFiliere=<?php echo $filiere['idFiliere']?>">
                                        <span class="glyphicon glyphicon-edit"> </span>
                                    </a>
                                     &nbsp 
                                     <a onclick="return confirm(' etes vous sur de suprimer')" href="deleteFiliere.php?idF=<?php echo $filiere['idFiliere'] ?>" >
                                        <span class="glyphicon glyphicon-trash"> </span>
                                     </a>
                                </td>
                            </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                    <div >
                        <ul class="pagination">
                        <?php  for($i=1; $i<=$nbrPage;$i++){ ?>
                            
                             
                            <li class="<?php if($i==$page) echo 'active' ?>"><a href="filieres.php?page=<?php echo $i;?>&nomF=<?php echo $nomF ?>&niveau=<?php echo $niveau ?>">  <?php echo $i; ?> </a></li>
			<?php } ?>  

                        </ul>
                          
                    </div>
                </div>   
            </div>
        </div>   

</body>
</html>
