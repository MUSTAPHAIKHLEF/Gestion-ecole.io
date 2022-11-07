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
            background-color: lightseagreen;
            border-radius: 25px 25px 0px 0px;
            padding-top: 115px;
            width: 70%;
            }
            h3{width: 70%;
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
                height: 38px;
            }  
    </style>
</head>
<body>
<h3><strong>MODIFICATION DES ABSENCES</strong></h3>
<?php
$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost; dbname=gestion_ecole;",$username,$password); 

session_start();
if(isset($_SESSION['user'])){
if($_SESSION['user']->ROLE === "ADMIN"){

if(isset( $_SESSION['N_CNIE'])){
$user = $database->prepare("SELECT * FROM gestion_personnels t1, absences t2 WHERE t1.N_CNIE = t2.N_CNIE AND t1.N_CNIE = :n_cnie");
$user->bindParam('n_cnie', $_SESSION['N_CNIE']);
$user->execute();
$user = $user->fetchObject();

echo '<form class="st container mt-5" method="POST">
<table><tr>
<tr>
<td><label class="form-label">N_CNIE :</label></td>
<td><input class="form-control " type="text" name="n_cnie" value="'.$user->N_CNIE.'" required /></td>

  <td><label class="form-label ms-3">DATE_ABSENCE :</label></td>
  <td><input class="form-control " type="date" name="date_abs" value="'.$user->DATE_ABSENCE.'" required /></td>
 
  <td><label class="form-label ms-3">MOUTIF:</label></td>
  <td><input class="form-control " type="text" name="moutif" value="'.$user->MOUTIF.'" required /></td>
  </tr></table>';

echo '<div>
<button class="bnt btn-warning mt-3" type="submit" name="update" value="'.$user->N_CNIE.'"><i class="fa fa-user-edit"></i></button>
<a class="btn btn-success" href="modifier_abs.php"><i class="fa fa-undo-alt"></i></a>
<a class="btn btn-danger" href="../absences.php"><i class="fa fa-power-off"></i></a>
</div>

</form>';
}

if(isset($_POST['update'])){
$updateUser = $database->prepare("UPDATE absences SET N_CNIE = :n_cnie ,DATE_ABSENCE = :date_abs ,MOUTIF = :moutif 
 WHERE N_CNIE = :n_cnie");
 $updateUser->bindParam('n_cnie', $_SESSION['N_CNIE']);
 $updateUser->bindParam("n_cnie",$_POST['n_cnie']);
 $updateUser->bindParam("date_abs",$_POST['date_abs']);
 $updateUser->bindParam("moutif",$_POST['moutif']);

 if($updateUser->execute()){
    echo'<div class="alert alert-success" role="alert"> operation success </div>';
 }else{
    echo'<div class="alert alert-danger" role="alert"> pas d\'acces </div>';
 }
 header("location:Update_abs.php");


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
