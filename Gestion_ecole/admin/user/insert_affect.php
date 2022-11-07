<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link href="../public/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<title>my first site web</title>
<head>
<style>
  body{background: rgba(0, 0, 50, 0.5);width: 50%;height: 90%;
  position: absolute; left :300px; top: 50px;}
  label{font-size: large; color: lightblue;}
  .st{padding-left: 40px;}
  .sea{width: 60px; height: 38px;}
  .sr{padding-left: 60px;}
  
</style>
</head>
<body>
<center>
<form method="POST" class="sr">
<div class="d-flex">
  <div class="col-md-12 mt-3"><input class="form-control" type="text"  name="ncnie" placeholder="Enter CINE for Search"></div>
  <div><button class="sea bnt btn-warning mt-3"  type="submit" name="search">Search</button></div>
</div>
</form>
<?php
require_once("../connexion.php");
    $ncni = "";
    $nom = "";
    $prenom = "";
    if(isset($_POST['search'])){
        $ncine = $_POST['ncnie'];
        $sql = "SELECT N_CNIE, PRENOM, NOM FROM gestion_personnels WHERE N_CNIE='$ncine'";
        $result = $connection->query($sql);
        
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $ncni=$row["N_CNIE"];
                $nom = $row["NOM"];
                $prenom = $row["PRENOM"];
    $sql = "SELECT N_CNIE, PRENOM, NOM  FROM  gestion_personnels WHERE N_CNIE='$ncine' ";
    // $query = "SELECT PRENOM,NOM  FROM  gestion_personnels";;
    $query_run = mysqli_query($connection,$sql) or die (mysqli_error($connection)); 
	$row = $query_run->fetch_assoc();
    $ncine = "";
    }
  }
}
?>
<section>
<form  method="POST" class="st mt-3">
  <table>
      <tr>
        <td><label class="form-label">NOM : </label></td>
        <td class="col-md-7"><input class="form-control" type="text" name="name" value="<?php echo $nom; ?>"/></td>
        </tr>
        <tr>
        <td><label class="form-label">PRENOM :</label></></td>
        <td><input class="form-control" type="text" name="prenom" value="<?php echo $prenom; ?>"/> </td>
        </tr>
        <tr>
        <td><label class="form-label">N°CNIE :</label></td>
        <td><input class="form-control" type="text" name="n_cnie" value="<?php echo $ncni; ?>"/> </td>
        </tr>
        <tr>
        <td><label class="form-label">DATE D'ENTREE :</label></td>
        <td><input class="form-control" type="date" name="date_e" required> </td>
        </tr>
        <tr>
        <td><label class="form-label">DATE DE SORTIE :</label></td>
        <td><input class="form-control" type="date" name="date_s" required></td>
        </tr>
        <tr>
        <td><label class="form-label">ECOLE D'AFF :</label></td>
        <td><input class="form-control" type="text" name="ecole_a" required></td> 
        </tr>
        <tr>
        <td><label class="form-label">REFERENCE :</label></td>
        <td><input class="form-control" type="text" name="ref_a" required></td>
        </tr>
        <tr>
        <td><label class="form-label me-3">DATE DE REFERENCE :</label></td>
        <td><input class="form-control" type="date" name="date_ref" required></td>
        </tr>  
        <tr class="d-flex mt-3 tt">
          <td><button class=" btn btn-warning"  type="submit" name="inserer">INSERER</button></td>
          <td><a class="btn btn-secondary ms-2" type="submit" name="annuler" href="insert_affect.php">ANNULER</a></td>
          <td><a  class=" btn btn-success ms-2" type="submit" name="quitter" href="../affectations.php">QUITTER</a></td>
        </tr>
  </table>
    <!-- </fieldset> -->
<!-- </section> -->
</form>
</section>
</body>
</html>
<?php
$conn = mysqli_connect("localhost","root","","gestion_ecole");
if(isset($_POST['inserer'])){
  $ncni=$_POST['n_cnie'];
  $dat_E=$_POST['date_e'];
	$date_S=$_POST['date_s'];
	$ecole_A=$_POST['ecole_a'];
	$ref=$_POST['ref_a'];
	$date_ref=$_POST['date_ref'];
        $sql = "INSERT INTO affectations(N_CNIE,DATE_ENTREE,DATE_SORTIE,ECOLE_AFFECTATION,
        REF_AFFECTATION,DATE_REF)VALUES('$ncni', '$dat_E', '$date_S', '$ecole_A', '$ref', '$date_ref')";
        $result=mysqli_query($conn,$sql);  
            echo'<div class="alert alert-success" role="alert"> operation success </div>';
        }             
?>

<?php  include ('../includes/scripts.php'); ?>