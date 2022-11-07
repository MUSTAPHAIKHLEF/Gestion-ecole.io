<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <link rel="stylesheet" href="../public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/Style.css" />

    <title>Document</title>
    <style>
            .st {
            background-color: lightcyan;
            border-radius: 25px 25px 0px 0px;
            padding-top: 115px;
            width: 70%;
            }
            h2{width: 70%;
            text-align: center;
            position: absolute;
            left: 225px;
            top: 48px;
            border: 0.5px;
            background-color: lightgoldenrodyellow;
            border-radius: 25px;
            }

            .btn-warning{
                width: 40px;
                height: 36px;
            }        
    </style>
</head>
<body>
<h2><strong>MODIFICATION DES AFFECTATIONS</strong></h2>
<?php
$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost; dbname=gestion_ecole;",$username,$password); 

session_start();
if(isset($_SESSION['user'])){
if($_SESSION['user']->ROLE === "ADMIN"){

if(isset( $_SESSION['N_CNIE'])){
$user = $database->prepare("SELECT * FROM affectations WHERE N_CNIE = :n_cnie");
$user->bindParam('n_cnie', $_SESSION['N_CNIE']);
$user->execute();
$user = $user->fetchObject();

echo '<form class="st container mt-5" method="POST">
<table>
<tr>
<td><label class="form-label">N_CNIE :</label></td>
<td><input class="form-control " type="text" name="n_cnie" value="'.$user->N_CNIE.'" required /></td>
<td><label class="form-label ms-5">DATE_ENTREE :</label></td>
<td><input class="form-control ms-5" type="text" name="date_e" value="'.$user->DATE_ENTREE.'" required /></td>
</tr>
<tr>
  <td><label class="form-label">DATE_SORTIE :</label></td>
  <td><input class="form-control " type="text" name="date_s" value="'.$user->DATE_SORTIE.'" required /></td>
  <td><label class="form-label ms-5">ECOLE_AFFE :</label></td>
  <td><input class="form-control ms-5" type="text" name="ecole_a" value="'.$user->ECOLE_AFFECTATION.'" required /></td>
  </tr>
  <tr>
  <td><label class="form-label">REF_AFFE:</label></td>
  <td><input class="form-control " type="text" name="ref_a" value="'.$user->REF_AFFECTATION.'" required /></td>
  <td><label class="form-label ms-5">DATE_REF :</label></td>
  <td><input class="form-control ms-5" type="text" name="date_ref" value="'.$user->DATE_REF.'" required /></td>
  </tr></table>';

echo '<div>
<button class=" bnt btn-warning mt-4 mb-2" type="submit" name="update" value="'.$user->N_CNIE.'"><i class="fa fa-user-edit"></i></button>
<a class=" btn btn-success mb-1" href="modifier_affect.php"><i class="fa fa-undo-alt"></i></a>
<a class=" btn btn-danger mb-1" href="../affectations.php"><i class="fa fa-power-off"></i></a>
</div>

</form>';
}

if(isset($_POST['update'])){
$updateUser = $database->prepare("UPDATE affectations SET N_CNIE = :n_cnie ,DATE_ENTREE = :date_e ,DATE_SORTIE = :date_s ,
 ECOLE_AFFECTATION = :ecole_a, REF_AFFECTATION = :ref_a, DATE_REF = :date_ref WHERE N_CNIE = :n_cnie");
 $updateUser->bindParam('n_cnie', $_SESSION['N_CNIE']);
 $updateUser->bindParam("n_cnie",$_POST['n_cnie']);
 $updateUser->bindParam("date_e",$_POST['date_e']);
 $updateUser->bindParam("date_s",$_POST['date_s']);
 $updateUser->bindParam("ecole_a",$_POST['ecole_a']);
 $updateUser->bindParam("ref_a",$_POST['ref_a']);
 $updateUser->bindParam("date_ref",$_POST['date_ref']); 
 if($updateUser->execute()){
    echo'<div class="alert alert-success" role="alert"> operation success </div>';
 }else{
    echo'<div class="alert alert-danger" role="alert"> pas d\'acces </div>';
 }
 header("location:Update_affect.php");


}

    // echo "<form> <button class='bnt btn-danger w-50 mt-1' type='submit' name='logout'> Se déconnecter </button></form>";
}else{
    header("location:http://localhost/fichiers/first_pro/admin/login.php",true);
    die("");
}
}else{
    header("location:http://localhost/fichiers/first_pro/admin/login.php",true);
    die(""); 
}

if(isset($_GET['logout'])){
    session_unset();
    session_destroy();
    header("location:http://localhost/fichiers/first_pro/admin/login.php",true);
}
?> 

</body>
</html>
<?php  include ('../includes/scripts.php'); ?>