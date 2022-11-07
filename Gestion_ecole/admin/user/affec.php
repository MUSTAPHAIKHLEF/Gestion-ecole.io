<?php 
session_start();
require_once ('../includes/header.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="../vendor/css/Style.css" />
    <title>Document</title>
    <style>
        body{
        height: 100vh;
        background-image: radial-gradient(circle farthest-corner at -3.1% -4.3%, rgba(
        37,245,115) 0%, rgba(18,55,82) 50% );
    }
    .sear{padding-top: 200px;}
    </style>

</head>
<body>
  <div class="modal fade" id="addadminupdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="code/code.php" method="POST" enctype="multipart/form-data">
    
          <div class="modal-body">
    
                  <div class="form-group">
                    <label>NOM :</label>
                    <input type="text" name="name" class="form-control" placeholder="name ....">
                  </div>
                  <div class="form-group">
                    <label>PRENOM :</label>
                    <input type="text" name="prenom" class="form-control" placeholder="prenom ....">
                  </div>
                  <div class="form-group">
                    <label>N_CNIE :</label>
                    <input type="text" name="ncnie" class="form-control" placeholder="N_CNIE ....">
                  </div>
                  <div class="form-group">
                    <label>EMAIL :</label>
                    <input type="email" name="email" class="form-control checking_email" placeholder="votre email ....">
                    <small class="error_email" style="color: red;"></small>
                  </div>
                  <div class="form-group">
                    <label>ADRESSE :</label>
                    <input type="text" name="adresse" class="form-control" placeholder="adresse...">
                  </div>
                  <div class="form-group">
                    <label>FONCTION:</label>
                    <select class="form-select" name="fonction">
                              <option>CHOISISSEZ </option>
                              <option>PROFFESSEUR</option>
                              <option>DIRECTEUR</option>
                              <option>EMPLOYE</option>
                              <option>R.H</option>
                    </select>  
                  </div>
                  <div class="form-group">
                    <label>DATE DE NAISSANCE :</label>
                    <input class="form-control"  type="date" name="date_naissance"></input>
                  </div>
                  <div class="form-group">
                    <label>LIEU DE NAISSANCE :</label>
                    <input class="form-control" type="text" name="lieu_de_naissance"></input>
                  </div>
                  <div class="form-group">
                    <label>SEXE :</label>
                    <select class="form-select" name="sexe" required>
                        <option>M</option>
                        <option>F</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>TELEPHONE :</label>
                    <input class="form-control" type="text" name="telephone" placeholder="votre numéro ...."></input>
                  </div>
                  <div class="form-group">
                    <label>SITUATION FAMILLIALE :</label>
                    <select name="situation_famille" class="form-select">
                        <option>MARIER</option>
                        <option>CELEBATAIRE</option>
                        <option>DIVORCER</option>
                        <option>REMARIER</option>
                            </select>
                  </div>
                    <input type="hidden" name="usertype" class="form-control" value="admin" />   
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button class="btn btn-primary"  type="submit" name="inserer">Save</button>
          </div>
        </form>
    
              </div>
          </div>
      </div>
<main class="container " style="text-align: right; direction: rtl; max-width:760px;  margin:auto;" >
<?php 
$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost; dbname=gestion_ecole;",$username,$password); 
if(isset($_SESSION['user'])){
if($_SESSION['user']->ROLE === "USER"){
echo '<form class="sear mt-5">
<div class="d-flex">
<input type="text" class="form-control searchTerm" name="search" placeholder="What are you looking for?">
<button class="btn btn-warning" type="submit" name="searchBtn" ><i class="fa fa-search"></i></button>
<a class="btn btn-dark me-2" href="modifier_pers.php">Annuller</a>
<a class="btn btn-success me-2" href="../gestion.php"><i class="fa fa-undo-alt"></i></a>
</div>
</form>
';
if(isset($_GET['searchBtn'])){ 
    
    $searchResult = $database->prepare("SELECT * FROM gestion_personnels WHERE NOM LIKE :name OR PRENOM LIKE :prenom OR N_CNIE LIKE :n_cnie");
    $searchValue = "%" . $_GET['search'] . "%";
    $searchResult->bindParam("name",$searchValue);
    $searchResult->bindParam("prenom",$searchValue);
    $searchResult->bindParam("n_cnie",$searchValue);
    $searchResult->execute();
    echo '<table dir="ltr" class="table mt-3">';
    echo  "<tr>";
    echo "<th> NOM</th>";
    echo "<th> PRENOM</th>";
    echo "<th> N_CNIE</th>";
    echo "<th> DELETE</th>";
    echo "<th> UPDATE</th>";
    echo  "<tr>";
    foreach($searchResult AS $result){
        echo  "<tr>";
        echo "<td> ".$result['NOM'] ."</td>";
        echo "<td> ".$result['PRENOM'] ."</td>";
        echo "<td> ".$result['N_CNIE'] ."</td>";
        echo '<td><form>
        <button class="btn btn-outline-danger" type="submit" name="remove" value="'.$result['N_CNIE'].'"><i class="fas fa-fw fa-trash-alt"></i></button>
            </form></td>';

        echo '<td><form>
        <button type="button" class="btn btn-primary me-2" data-toggle="modal" data-target="#addadminupdate"  value="'.$result['N_CNIE'].'"><i class="fas fa-fw fa-user-edit"></i></button>
        </form></td>';

        echo  "<tr>";
    }
    echo '</table>';
    }
if(isset($_GET['remove'])){       
       $removeUser = $database->prepare("DELETE FROM gestion_personnels WHERE N_CNIE=:n_cnie");
       $removeUser->bindParam("n_cnie",$_GET['remove']);
       $removeUser->execute();

       $removeUser = $database->prepare("DELETE FROM affectations WHERE N_CNIE=:n_cnie");
       $removeUser->bindParam("n_cnie",$_GET['remove']);
       $removeUser->execute();

       $removeUser = $database->prepare("DELETE FROM absences WHERE N_CNIE=:n_cnie");
       $removeUser->bindParam("n_cnie",$_GET['remove']);
       if($removeUser->execute()){
       echo '<div class="alert alert-success mt-3" > Utilisateur supprimé avec succès</div>';
       header("refresh:2; url=modifier_pers.php");
       }       
       }       
       if(isset($_GET['edit'])){
       session_start();
       $_SESSION['N_CNIE'] = $_GET['edit'];
       header("location:Update_pers.php");
       }
       
       }else{
           session_unset();
           session_destroy();
           header("location:http://localhost/fichiers/first_pro/admin/login.php",true);
       }
       }else{
           session_unset();
           session_destroy();
           header("location:http://localhost/fichiers/first_pro/admin/login.php",true);
       }
       
       ?>
</body>
</html>
<?php  include ('../includes/scripts.php'); ?>	