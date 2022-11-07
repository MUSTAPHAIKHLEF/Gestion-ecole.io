<?php 
require_once ('../includes/header.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/Style.css" />
    <style>
        body{
        height: 100vh;
        background-image: radial-gradient(circle farthest-corner at -3.1% -4.3%, rgba(
        37,245,115) 0%, rgba(18,55,82) 50% );
    }
    .sear{padding-top: 200px;}
    </style>
    <title>Document</title>
</head>
<body>
<main class="container " style="text-align: right; direction: rtl; max-width:760px;  margin:auto;" >
<?php 
$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost; dbname=gestion_ecole;",$username,$password); 

session_start();
if(isset($_SESSION['user'])){
if($_SESSION['user']->ROLE === "ADMIN"){
echo '<form class="sear mt-5">
<div class="d-flex">
<input type="text" class="form-control searchTerm" name="search" placeholder="N_CNIE">
<button class="btn btn-warning" type="submit" name="searchBtn" ><i class="fa fa-search"></i></button>
<a class="btn btn-dark me-2"  href="modifier_abs.php"><i class="fa fa-window-close"></i></a>
<a class="btn btn-success me-2" href="../absences.php"><i class="fa fa-undo-alt"></i></a>
</div>
</form>';
 if(isset($_GET['searchBtn'])){ 
    $searchResult = $database->prepare("SELECT * FROM gestion_personnels t1, absences t2 WHERE t1.N_CNIE=t2.N_CNIE AND t1.N_CNIE LIKE :n_cnie");
      $searchValue = "%" . $_GET['search'] . "%";
    $searchResult->bindParam("n_cnie",$searchValue);
    $searchResult->execute();
    echo '<table dir="ltr" class="table mt-3">';
    echo  "<tr>";
    echo  "<th>NOM</th>";
    echo  "<th>PRENOM</th>";
    echo  "<th>N_CNIE</th>";
    echo  "<th>DATE_ABSENCE</th>";
    echo  "<th>MOUTIF</th>";
    echo "<th scope='row'>Action</th>";
    echo  "</tr>";
    foreach($searchResult as $result){
        echo  "<tr>";
        echo "<td> ".$result['NOM'] ."</td>";
        echo "<td> ".$result['PRENOM'] ."</td>";
        echo "<td> ".$result['N_CNIE'] ."</td>";
        echo "<td> ".$result['DATE_ABSENCE'] ."</td>";
        echo "<td> ".$result['MOUTIF'] ."</td>";
        echo '<td colspan="2" class="table-active"><form>
        <button class="btn btn-danger" type="submit" name="remove" value="'.$result['N_CNIE'].'"><i class="fas fa-fw fa-trash-alt"></i></button>
        <button class="btn btn-success" type="submit" name="edit" value="'.$result['N_CNIE'].'"><i class="fas fa-fw fa-user-edit"></i></button>
        </form></td>';

        echo  "<tr>";
    }
    echo '</table>';
    }
    if(isset($_GET['remove'])){    
        $removeUser = $database->prepare("DELETE FROM gestion_personnels WHERE N_CNIE=:n_cnie");
        $removeUser->bindParam("n_cnie",$_GET['remove']);
        $removeUser->execute();
 
        $removeUser = $database->prepare("DELETE FROM absences WHERE N_CNIE=:n_cnie");
        $removeUser->bindParam("n_cnie",$_GET['remove']);
        if($removeUser->execute()){
        echo '<div class="alert alert-success mt-3" > Utilisateur supprimé avec succès</div>';
        header("refresh:2; url=modifier_abs.php");
       }else{
        echo var_dump($removeUser);
      }
      
      }    
       if(isset($_GET['edit'])){
       $_SESSION['N_CNIE'] = $_GET['edit'];
       header("location:Update_abs.php");
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