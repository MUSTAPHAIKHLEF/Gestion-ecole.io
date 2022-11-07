<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    .st{background: rgba(63,32, 50, 0.5);width: 100%;height: 100%; }
    .sea{position: absolute;left: 330px; top: 50px;}
    a{border: 3px solid black;}
    section{position: absolute;top: 100px; width: 100%; border: 2px ;}
    em{position: absolute; left: 250px; top: 8px; text-decoration-line: underline; color: red;}
    label{font-size: larger; color: lightblue;}
  </style>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="../public/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <title>my first site web</title>
<head>
</head>
<body class="st">
  <div class="t">
<label align="center"><h2 ><em>INSERTION LES ABSENTES </em></h2></label>
<form method="POST">
<div class="sea d-flex">
<div class=""><input class="form-control" type="text"  name="ncnie" placeholder="Enter CINE for Search"></div>
  <div class=""><button class="btn btn-warning ms-2"  type="submit" name="search">Search Data</button></div>
</div>
</form>
<?php
require_once("../connexion.php");

      $ncni = "";
      $nom = "";
      $prenom = "";
    if(isset($_POST['search'])){
        $ncine = $_POST['ncnie'];
        $sql = "SELECT N_CNIE, PRENOM, NOM FROM gestion_personnels WHERE N_CNIE='$ncine' ";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $ncni=$row["N_CNIE"];
                $nom = $row["NOM"];
                $prenom = $row["PRENOM"];
    $sql = "SELECT N_CNIE, PRENOM, NOM  FROM  gestion_personnels ";
    // $query = "SELECT PRENOM,NOM  FROM  gestion_personnels";;
    $query_run = mysqli_query($connection,$sql) or die (mysqli_error($connection)); 
	$row = $query_run->fetch_assoc();
    $ncine = "";
    }
  }
}
?>
<form method="POST">
<section id="FGT"> 
<!--<fieldset class="scheduler-border" style="background-color: gray;">
    <legend class="scheduler-border" style="background-color: red;">Identifications</legend> -->
    <div class="container mt-3">  
  <div class="mb-3 row"><label class="col-sm-2 col-form-label">NOM :</label>
    <div class="col-sm-4">	<input class="form-control" type="text"  name="name" value="<?php echo $nom; ?>">
  </div></div>
  
  <div class="mb-3 row"> <label class="col-sm-2 col-form-label">PRENOM :</label>
		<div class="col-sm-4"><input class="form-control" type="text"  name="prenom" value="<?php echo $prenom; ?>">
  </div></div>
  
  <div class="mb-3 row"><label class="col-sm-2 col-form-label">N°CNIE :</label>
  <div class="col-sm-4"><input class="form-control" type="text"  name="n_cnie" value="<?php echo $ncni; ?>">
  </div></div>

  <div class="mb-3 row">   <label class="col-sm-2 col-form-label">DATE D'ABSENCE</label>
        <div class="col-sm-4">  <input class="form-control" type="date" name="date_abs" >
  </div></div>
  
  <div class="mb-3 row"> <label class="col-sm-2 col-form-label">MOUTIF</label>
      <div class="col-sm-4"><input class="form-control" type="text" name="moutif" >
  </div></div> 
  <div>
    <button class=" bnt btn-primary mt-1"  type="submit" name="inserer">INSERER</button>
    <button class=" bnt btn-dark mt-1" type="submit" name="annuler" href="insert_abs.php">ANNULER</button>
    <a  class=" bnt btn-success mt-1" type="submit" name="quitter" href="../absences.php">QUITTER</a>
  </div>
  </div>
    <!-- </fieldset>-->
</section> 
</form>
</div>
</body>
</html>
<?php 
$conn = mysqli_connect("localhost","root","","gestion_ecole");

if(isset($_POST['inserer'])){
    $ncni=$_POST['n_cnie'];
    $date_abs=$_POST['date_abs'];
		$moutif_abs=$_POST['moutif'];
    $sql2="INSERT INTO absences (N_CNIE,DATE_ABSENCE,MOUTIF)VALUES('$ncni','$date_abs', '$moutif_abs')";
    $result=mysqli_query($conn,$sql2);
    echo '<div class="alert alert-primary" role="alert">l\'operation est success</div>';
}
?>


<?php  include ('../includes/scripts.php'); ?>