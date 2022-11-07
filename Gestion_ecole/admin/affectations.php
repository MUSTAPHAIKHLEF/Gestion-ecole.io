<?php 
session_start();
require_once("connexion.php");
require_once ('includes/header.php'); 
require_once ('includes/navbar.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>my first site web</title>
<head>
</head>
<body>

<h2 align="center" style="color: lightslategrey;">LES AFFECTATION DES PERSONNELS</h2>
<form class="d-flex col-md-1">
    <a class="btn btn-danger me-2" name="quitter" href="index.php"><i class="fas fa-fw fa-undo-alt"></i></a>
    <a class="btn btn-primary me-2" name="inserer" href="user/insert_affect.php"><i class="fas fa-fw fa-user-plus"></i></a>
    <a class="btn btn-success me-2" name="update" href="user/modifier_affect.php"><i class="fas fa-fw fa-user-edit"></i></a>		
</form>

<div class="card-body">

<div class="table-responsive">
    <?php
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,'gestion_ecole');
    $query = "SELECT  T1.PRENOM, T1.NOM ,T2.* FROM  gestion_personnels T1 ,affectations T2  WHERE T1.N_CNIE = T2.N_CNIE";
    $query_run = mysqli_query($connection,$query) or die (mysqli_error($connection));  
?>

<form class="for" width="100%" method="POST" action="code/code_pers.php" >
      <table class="table table-success table-striped"  id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
          <th>NOM</th>
          <th>PRENOM</th>
          <th>N_CNIE</th>
          <th>DATE_ENTREE</th>
          <th>DATE_SORTIE</th>
          <th>ECOLE_AFFE</th>
          <th>REF_AFFE</th>
          <th>DATE_REF</th>
          </tr>
        </thead>
         <tbody>
         <?php while($row = mysqli_fetch_object($query_run)) { ?> 
          <tr align="left">
          <td><?php echo $row->NOM ?></td>
          <td><?php echo $row->PRENOM ?></td>
          <td><?php echo $row->N_CNIE ?></td>
          <td> <?php echo $row->DATE_ENTREE ?></td>
          <td><?php echo $row->DATE_SORTIE ?></td>
          <td><?php echo $row-> ECOLE_AFFECTATION ?></td>
          <td><?php echo $row->REF_AFFECTATION ?></td>
          <td><?php echo $row->DATE_REF ?></td>
          </tr>
          <?php }  ?>
         </tbody>
          </table>
      </form>
   </body>
</html>

<?php  include ('includes/scripts.php'); ?>