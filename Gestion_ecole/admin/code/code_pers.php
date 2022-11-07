<?php
 require '../connexion.php';
 include('../security.php');


 if(isset($_POST['check_submit_btn']))
 {
    $email = $_POST['email_id'];

    $email_query = "SELECT * FROM gestion_personnels WHERE EMAIL='$email'";
    $email_query = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query) > 0)
    {
       echo "Email Already Exists, please try another one.";
    }
    else
    {
        echo "It's avallable";
 }
}


if(isset($_POST['registerbtn_pers']))
{
    $ncnie = $_POST['ncnie'];
    $name = $_POST['name'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $adresse = $_POST['adresse'];
    $fonction = $_POST['fonction'];
    $date_N = $_POST['date_N'];
    $lieu_N = $_POST['lieu_N'];
    $sexe = $_POST['sexe'];
    $telephone = $_POST['telephone'];
    $situation_f = $_POST['situation_f'];
    $usertype = $_POST['usertype'];


    $email_query = "SELECT * FROM gestion_personnels WHERE EMAIL='$email'";
    $email_query = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query) > 0)
    {
        $_SESSION['status'] = "Email Already Taken, please try another one.";
        $_SESSION['status_code'] = "error";
        header('Location:../gestion.php'); 
    }
    else
    {

            $query = "INSERT INTO gestion_personnels (N_CNIE,NOM,PRENOM,EMAIL,ADRESSE,FONCTION,DATE_NAISSANCE,LIEU_DE_NAISSANCE,SEXE,TELEPHONE,SITUATION_FAMILLE,ROLE) 
            VALUES ('$ncnie','$name','$prenom','$email','$adresse','$fonction','$date_N','$lieu_N','$sexe','$telephone','$situation_f','$usertype')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location:../gestion.php'); 
            }
        
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location:../gestion.php'); 
            }        
        }
    }
        else 
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location:../gestion.php'); 
        }


if(isset($_POST['update_pers']))

{   
    $ncnie = $_POST['ncnie'];
    $name = $_POST['name'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $adresse = $_POST['adresse'];
    $fonction = $_POST['fonction'];
    $date_N = $_POST['date_N'];
    $lieu_N = $_POST['lieu_N'];
    $sexe = $_POST['sexe'];
    $telephone = $_POST['telephone'];
    $situation_f = $_POST['situation_f'];
    $usertype = $_POST['usertype'];

        $query = "UPDATE gestion_personnels SET N_CNIE='$ncnie', NOM='$name', PRENOM='$prenom', 
        EMAIL='$email',ADRESSE='$adresse', FONCTION='$fonction', DATE_NAISSANCE='$date_N', LIEU_DE_NAISSANCE='$lieu_N',
        SEXE='$sexe', TELEPHONE='$telephone', SITUATION_FAMILLE='$situation_f', ROLE='$usertype' WHERE N_CNIE='$ncnie' ";
        $query_run = mysqli_query($connection, $query);

         if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Your Data is Update";
                $_SESSION['status_code'] = "success";
                header('Location:../gestion.php'); 
            }
            else
            {
                $_SESSION['status'] = "Your Data is NOT Update";
                $_SESSION['status_code'] = "error";
                header('Location:../gestion.php'); 
            }
        }






        if(isset($_POST['delete_pers']))
        {
              $ncnie = $_POST['delete_ncnie'];
              
              $query = "DELETE FROM gestion_personnels WHERE N_CNIE='$ncnie' ";
              $query_run = mysqli_query($connection, $query);

              $query = "DELETE FROM affectations WHERE N_CNIE='$ncnie' ";
              $query_run = mysqli_query($connection, $query);

              $query = "DELETE FROM absences WHERE N_CNIE='$ncnie' ";
              $query_run = mysqli_query($connection, $query);
              
              if($query_run)
              {
                  // echo "Saved";
                  $_SESSION['status'] = "Your Data is Delted";
                  $_SESSION['status_code'] = "success";
                  header('Location:../gestion.php'); 
                }
              else
              {
                  $_SESSION['status'] = "Your Data is NOT Delted";
                  $_SESSION['status_code'] = "error";
                  header('Location:../gestion.php'); 
                }
          }
  
?>

<?php 
$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost; dbname=gestion_ecole;",$username,$password); 
if(isset($_POST['enregistrer'])){
    $ncine = $_POST['ncine'];
    $checkCNIE = $database->prepare("SELECT * FROM gestion_personnels WHERE N_CNIE='$ncine'");
    $ncine=$_POST['ncine'];
    $checkCNIE->bindParam("N_CNIE", $ncine);
    $checkCNIE->execute();
    if($checkCNIE->rowCount()>0){
        $name=$_POST['name'];
        $prenom=$_POST['prenom'];
        $email=$_POST['email'];
        $adresse=$_POST['adresse'];
        $ncine=$_POST['ncine'];
        $fonction=$_POST['fonction'];
        $date_naissance=$_POST['date_naissance'];
        $lieu_de_naissance=$_POST['lieu_de_naissance'];
        $sexe=$_POST['sexe'];
        $telephone=$_POST['telephone'];
        $situation_famille=$_POST['situation_famille'];
    }else{
       echo'<div class="alert alert-danger" role="alert"> This is a compte user </div>';
        $adduser=$database->prepare("INSERT INTO gestion_personnels(NOM,PRENOM,EMAIL,ADRESSE,N_CNIE,FONCTION,DATE_NAISSANCE,
        LIEU_DE_NAISSANCE,SEXE,TELEPHONE,SITUATION_FAMILLE)VALUES(:NOM,:PRENOM,:EMAIL,:ADRESSE,:N_CNIE,:FONCTION,:DATE_NAISSANCE,
        :LIEU_DE_NAISSANCE,:SEXE,:TELEPHONE,:SITUATION_FAMILLE)");
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
            echo'<div class="alert alert-success" role="alert"> operation success </div>';
        }else{
            echo'<div class="alert alert-info" role="alert"> errur no propose </div>';
    }             
   }
  }
?>
<?php 
if(isset($_POST['update'])){
  $updateuser = $database->prepare("UPDATE gestion_personnels SET SET N_CNIE='$ncine',NOM='$name', PRENOM='$prenom',EMAIL='$email',
  ADRESSE='$adresse',FONCTION='$fonction',DATE_NAISSANCE='$date_naissance', LIEU_DE_NAISSANCE='$lieu_de_naissance',SEXE='$sexe',
  TELEPHONE='$telephone',SITUATION_FAMILLE='$situation_famille',WHERE N_CNIE='$ncine'");
 if($adduser->execute()){
  echo'<div class="alert alert-success" role="alert"> operation success </div>';
}else{
  echo'<div class="alert alert-info" role="alert"> errur no propose </div>';
   }             
}
?>

<?php 
if(isset($_POST['inserer'])){
    $username = "root";
    $password = "";
    $database = new PDO("mysql:host=localhost; dbname=gestion_ecole;",$username,$password); 
    $ncine = $_POST['ncine'];
    $checkCNIE = $database->prepare("SELECT N_CNIE,NOM,PRENOM FROM gestion_personnels T1 WHERE T1.N_CNIE=T2.N_CNIE");
    // $checkCNIE = $database->prepare("SELECT * FROM absences N_CNIE='$ncine");
    $ncine=$_POST['ncine'];
    $checkCNIE->bindParam("N_CNIE", $ncine);
    $checkCNIE->execute();
    if($checkCNIE->rowCount()>0){
        echo'<div class="alert alert-danger" role="alert"> CINE déja créer </div>';
    }else{
		$ncine=$_POST['N_CNIE'];
    $date_abs=$_POST['DATE_ABSENCE'];
		$moutif_abs=$_POST['MOUTIF'];
    $adduser=$database->prepare("INSERT INTO absences T2 (DATE_ABSENCE,MOUTIF) VALUES(:DATE_ABSENCE,:MOUTIF) 
    where  (select N_CNIE,NOM,PRENOM FROM gestion_personnels T1 where T1.N_CNIE=T2.N_CNIE ") ;		
    $adduser->bindParam("DATE_ABSENCE",$date_abs);
		$adduser->bindParam("MOUTIF",$moutif_abs);
        if($adduser->execute()){
            echo'<div class="alert alert-success" role="alert"> operation success </div>';
        }else{
            echo'<div class="alert alert-info" role="alert"> errur no propose </div>';
    }             
}}
?>

<!-- gestion des affectations -->
<?php 
if(isset($_POST['enregistrer'])){
  $username = "root";
    $password = "";
    $database = new PDO("mysql:host=localhost; dbname=gestion_ecole;",$username,$password); 
    $ncine = $_POST['ncine'];
    $checkCNIE = $database->prepare("SELECT * FROM affectations N_CNIE='$ncine'");
    $ncine=$_POST['ncine'];
    $checkCNIE->bindParam("N_CNIE", $ncine);
    $checkCNIE->execute();
    if($checkCNIE->rowCount()>0){
        echo'<div class="alert alert-danger" role="alert"> CINE déja créer </div>';
    }else{
		$ncine=$_POST['ncine'];
		$dat_E=$_POST['date_e'];
		$date_S=$_POST['date_s'];
		$ecole_A=$_POST['ecole_a'];
		$ref=$_POST['ref_a'];
		$date_ref=$_POST['date_ref'];
        $adduser=$database->prepare("INSERT INTO affectations(N_CNIE,DATE_ENTREE,DATE_SORTIE,ECOLE_AFFECTATION,REF_AFFECTATION,DATE_REF)
         VALUES(:N_CNIE,:DATE_ENTREE,:DATE_SORTIE,:ECOLE_AFFECTATION,:REF_AFFECTATION,:DATE_REF)");
        $adduser->bindParam("N_CNIE",$ncine);
		$adduser->bindParam("DATE_ENTREE",$dat_E);
		$adduser->bindParam("DATE_SORTIE",$date_S);
		$adduser->bindParam("ECOLE_AFFECTATION",$ecole_A);
		$adduser->bindParam("REF_AFFECTATION",$ref);
		$adduser->bindParam("DATE_REF",$date_ref);
    
        if($adduser->execute()){
            echo'<div align="center"> operation success </div>';
        }else{
            echo'<div class="alert alert-info" role="alert"> erreur no propose </div>';
    }             
   }
  }
?>
