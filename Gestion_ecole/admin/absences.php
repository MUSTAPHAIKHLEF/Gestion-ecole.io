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
<h2 align="center" style="color: lightslategrey;">LES ABSENCES DES PERSONNELS</h2>
<form class="d-flex col-md-2">
      <a class="btn btn-danger me-2" name="quitter" href="index.php"><i class="fas fa-fw fa-undo-alt"></i></a>
      <a class="btn btn-success me-2" name="update" href="user/modifier_abs.php"><i class="fas fa-fw fa-user-edit"></i></a>
      <a class="btn btn-primary me-2" name="inserer" href="user/insert_abs.php"><i class="fas fa-fw fa-user-plus"></i></a>	
</form>
<?php
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,'gestion_ecole');
    $query = "SELECT  T1.PRENOM, T1.NOM ,T2.* FROM  gestion_personnels T1 ,absences T2  WHERE T1.N_CNIE = T2.N_CNIE";
    $query_run = mysqli_query($connection,$query) or die (mysqli_error($connection));  
?>

<form class="mt-3" width="100%" method="POST" action="code/code_pers.php" >
<table class="table table-warning table-striped"  id="dataTable" width="100%" cellspacing="0">
 <thead>
 <tr>
     <th>NOM</th>
     <th>PRENOM</th>
     <th>N_CNIE</th>
     <th>DATE_ABSENCE</th>
     <th>MOUTIF</th>
    </tr>
 </thead>
  <tbody>
  <?php while($row = mysqli_fetch_object($query_run)) { ?> 

  <tr>
     <td><?php echo $row->NOM ?></td>
     <td><?php echo $row->PRENOM ?></td>
     <td><?php echo $row->N_CNIE ?></td>
     <td> <?php echo $row->DATE_ABSENCE ?></td>
     <td><?php echo $row->MOUTIF ?></td>
  </tr>
  <?php }  ?>
  </tbody>  
  </table>
</form>
</body>
</html>
<?php  include ('includes/scripts.php'); ?>