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
      img{
        position: absolute; left: 225px;top: 85px;
      }
    h2 {
        width: 70%;
        text-align: center;
        position: absolute;
        left: 225px;
        top: 48px;
        border: 0.5px;
        background-color: lightgoldenrodyellow;
        border-radius:25px 25px 0px 0px;
    }

    .st {
        background-color: lightseagreen;
        border-radius: 25px 25px 0px 0px;
        padding-top: 150px;
        width: 70%;
        }
    .btn{
        width: 10px;
        height: 30px;
    }
    </style>
</head>

<body>
    <h2><strong>MODIFICATION DES DONNEES PERSONNELS</strong></h2>
    <?php
session_start();
if(isset($_SESSION['user'])){
if($_SESSION['user']->ROLE === "ADMIN"){

if(isset( $_SESSION['N_CNIE'])){
  
$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost; dbname=gestion_ecole;",$username,$password); 

$user = $database->prepare("SELECT * FROM gestion_personnels WHERE N_CNIE = :n_cnie");
$user->bindParam('n_cnie', $_SESSION['N_CNIE']);
$user->execute();
$user = $user->fetchObject();

echo '<form class="st container mt-5" method="POST" enctype="multipart/form-data">
<table><tr>
    <tr>
      <td dir="ltr"><img src="../img/'.$user->IMAGES.'" width="150px" height="150px" alt="image"></td>                

      <td><input class="form-control" type="file" id="images" name="images" value="../img/'.$user->IMAGES.'"  /></td>
    </tr>
    <tr>
       <td><label class="form-label">NOM :</td>
       <td><input class="form-control" type="text" name="name" value="'.$user->NOM.'" required /></td>
       <td><label class="form-label ms-5">PRENOM :</label></td>
       <td><input class="form-control ms-5" type="text" name="prenom" value="'.$user->PRENOM.'" required /></td>
    </tr>
    <tr>
       <td><label class="form-label">N_CNIE :</label></td>
       <td><input class="form-control" type="text" name="n_cnie" value="'.$user->N_CNIE.'" required /></td>
       <td><label class="form-label ms-5">EMAIL :</label></td>
       <td><input class="form-control ms-5" type="text" name="email" value="'.$user->EMAIL.'" required /></td>
    </tr>
    <tr>
       <td><label class="form-label">ADRESSE :</label></td>
       <td><input class="form-control" type="text" name="adresse" value="'.$user->ADRESSE.'" required /></td>
       <td><label class="form-label ms-5">FONCTION :</label></td>
       <td><select class="form-select ms-5" name="fonction">
       <option>'.$user->FONCTION.'</option>
       <option>DIRECTEUR</option>
       <option>EMPLOYER</option>
       <option>PROFFESSEUR</option>
       <option>R.H</option>
     </select></td>
        </tr>
        <tr>
        <td><label  class="form-label">DATE_NAISSANCE :</label></td>
        <td><input class="form-control" type="date" name="date_N" value="'.$user->DATE_NAISSANCE.'" required /></td>
        <td><label class="form-label ms-5">LIEU_DE_NAISSANCE :</label></td>
        <td><input class="form-control ms-5" type="text" name="lieu_N" value="'.$user->LIEU_DE_NAISSANCE.'" required /></td>
        </tr>
        <tr>
        <td><label class="form-label">SEXE :</td>
        <td><select class="form-select" name="sexe">
        <option>'.$user->SEXE.'</option>
        <option>M</option>
        <option>F</option>
        </select></td>
        <td><label class="form-label ms-5">TELEPHONE :</td>
        <td><input class="form-control ms-5" type="text" name="telephone" value="'.$user->TELEPHONE.'" /></td>
        </tr>
        <tr>
        <td><label class="form-label">SITUATION_FAMILLE :</td>
        <td><select class="form-select" name="situation_f">
        <option>'.$user->SITUATION_FAMILLE.'</option>
        <option>MARIE</option>
        <option>CELEBATAIRE</option>
        <option>DIVORCE</option>
        <option>REMARIE </option>
      </select></td>
        </tr>';
        echo '<tr>
        <td><button class="bnt btn-warning w-50 mt-1" type="submit" name="update" value="'.$user->N_CNIE.'">
        <i class="fas fa-fw fa-user-edit"></button></td>
        <td><a class="btn btn-success w-50 mt-1" href="modifier_pers.php"><i class="fa fa-undo-alt"></a></td>
        <td><a class="btn btn-danger w-50" name="quitter" href="../gestion.php"><i class="fas fa-fw fa-undo-alt"></i></a></td>
        </tr>
</form>';
}
if(isset($_POST['update'])){  
$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost; dbname=gestion_ecole;",$username,$password); 

        $image = $_FILES['images']['name'];
        $name=$_POST['name'];
        $prenom=$_POST['prenom'];
        $email=$_POST['email'];
        $adresse=$_POST['adresse'];
        $ncine=$_POST['n_cnie'];
        $fonction=$_POST['fonction'];
        $date_naissance=$_POST['date_N'];
        $lieu_de_naissance=$_POST['lieu_N'];
        $sexe=$_POST['sexe'];
        $telephone=$_POST['telephone'];
        $situation_famille=$_POST['situation_f']; 
        $adduser = $database->prepare("UPDATE gestion_personnels SET IMAGES= :IMAGES, NOM = :NOM , PRENOM= :PRENOM ,N_CNIE = :N_CNIE ,
        EMAIL = :EMAIL ,ADRESSE = :ADRESSE , FONCTION = :FONCTION,DATE_NAISSANCE = :DATE_NAISSANCE, LIEU_DE_NAISSANCE = :LIEU_DE_NAISSANCE , SEXE = :SEXE, 
        TELEPHONE = :TELEPHONE, SITUATION_FAMILLE = :SITUATION_FAMILLE WHERE N_CNIE = :N_CNIE");
        $adduser->bindParam("IMAGES",$image);
        $adduser->bindParam("NOM",$name);
        $adduser->bindParam("PRENOM",$prenom);
        $adduser->bindParam("EMAIL",$email);
        $adduser->bindParam("ADRESSE",$adresse);
        $adduser->bindParam("N_CNIE",$ncine);
        $adduser->bindParam("FONCTION",$fonction);
        $adduser->bindParam("DATE_NAISSANCE",$date_naissance);
        $adduser->bindParam("LIEU_DE_NAISSANCE",$lieu_de_naissance);
        $adduser->bindParam("SEXE",$sexe);
        $adduser->bindParam("TELEPHONE",$telephone);
        $adduser->bindParam("SITUATION_FAMILLE",$situation_famille);
              if($adduser->execute()){
            $_SESSION['success'] = '<div class="alert alert-success" role="alert"> operation success </div>';
            $_SESSION['status_code'] = "success";
            }else{
            $_SESSION['status'] = '<div class="alert alert-info" role="alert"> errur no propose </div>';
            $_SESSION['status_code'] = "error";
           }
         }
      }
    }

// }else{
//   header("location:http://localhost/fichiers/admin/login.php",true);
//   die("");
// }
// }else{
//   header("location:http://localhost/fichiers/admin/login.php",true);
//   die(""); 
// }

// if(isset($_GET['logout'])){
//     session_unset();
//     session_destroy();
//     header("location:http://localhost/fichiers/admin/login.php",true);
//     }
?>
</body>
</html>

<?php
include('../includes/scripts.php'); 
?>