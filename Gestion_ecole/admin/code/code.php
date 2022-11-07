<?php
 require '../connexion.php';
 include('../security.php');


 if(isset($_POST['check_submit_btn']))
 {
    $email = $_POST['email_id'];

    $email_query = "SELECT * FROM utilisateurs WHERE EMAIL='$email'";
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


if(isset($_POST['registerbtn']))
{
    $id = $_POST['edit_id'];
    $ncnie = $_POST['ncnie'];
    $name = $_POST['name'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $usertype = $_POST['usertype'];
    
    $image = $_FILES["image"]['name'];
    
    // $email_query = "SELECT * FROM utilisateurs WHERE EMAIL='$email'";
    // $email_query = mysqli_query($connection, $email_query);
         
    //      $img_type = array('image/jpg','image/jpeg','image/png');
    //      $valid_img = in_array( $_FILES["image"]['type'], $img_type);
       
    //      if($valid_img)
    //      {
    if(file_exists("img/" . $_FILES["image"]["name"]))
    {
        $store = $_FILES["image"]["name"];
        $_SESSION['status']= "Image Already exists. '.$store.'";
        header('Location: ../register.php');
    }
    else
    {
        if($password === $cpassword)
        {
            $query = "INSERT INTO utilisateurs (IMAGES,N_CNIE,NOM,PRENOM,EMAIL,PASSWORD,ROLE) 
            VALUES ('$image','$ncnie','$name','$prenom','$email','$password','$usertype')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                move_uploaded_file($_FILES["image"]["tmp_name"], "img/".$_FILES["image"]["name"]);
                $_SESSION['success'] = "Admin Profile Added";
                header('Location: ../register.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                header('Location: ../register.php');
            }

        }
  }
}


if(isset($_POST['update']))

{
    $id = $_POST['edit_id'];
    $edit_ncnie = $_POST['ncnie'];
    $edit_name = $_POST['edit_name'];
    $edit_prenom = $_POST['edit_prenom'];
    $edit_email = $_POST['edit_email'];
    $edit_password = $_POST['edit_password'];
    $edit_usertype = $_POST['edit_usertype'];
    
    $new_image = $_POST["faculty_image"];

        $query = "UPDATE utilisateurs SET N_CNIE='$edit_ncnie', NOM='$edit_name', PRENOM='$edit_prenom', 
        EMAIL='$edit_email', PASSWORD='$edit_password', ROLE='$edit_usertype', IMAGES='$new_image' 
        WHERE ID='$id'";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            move_uploaded_file($_POST["faculty_image"], "img/".$_POST["faculty_image"]);
            $_SESSION['success'] = "Data is Update";
            header('Location: ../register.php');
        }
        else
        {
            $_SESSION['status'] = "Data is Not update";
            header('Location:../register.php');
        }
    }


 if(isset($_POST['delete']))
  {
        $ncnie = $_POST['delete_ncnie'];
        
        $query = "DELETE FROM utilisateurs WHERE N_CNIE='$ncnie' ";
        $query_run = mysqli_query($connection, $query);
        
        if($query_run)
       {
           $_SESSION['success'] = "Your Data is Deleted";
           $_SESSION['status_code'] = "success";
           header('Location: ../register.php');
        }   
        else
        {
           $_SESSION['status'] = "Your Data is NOT Deleted";
           $_SESSION['status_code'] = "error";
           header('Location: ../register.php');
        }
    
    }
?>

<?php
require_once "../includes/scripts.php";
if(isset($_POST['inserer'])){
    $username = "root";
    $password = "";
    $database = new PDO("mysql:host=localhost; dbname=gestion_ecole;",$username,$password); 
    $ncine = $_POST['ncnie'];
    $checkCNIE = $database->prepare("SELECT * FROM gestion_personnels WHERE N_CNIE='$ncine'");
    $checkCNIE->bindParam("N_CNIE", $ncine);
    if($checkCNIE->rowCount()>0){
        echo'<div class="alert alert-danger" role="alert"> This is a compte user </div>';
    }else{
        $image = $_FILES["image"]['name'];
        $name=$_POST['name'];
        $prenom=$_POST['prenom'];
        $email=$_POST['email'];
        $adresse=$_POST['adresse'];
        $ncine=$_POST['ncnie'];
        $fonction=$_POST['fonction'];
        $date_naissance=$_POST['date_naissance'];
        $lieu_de_naissance=$_POST['lieu_de_naissance'];
        $sexe=$_POST['sexe'];
        $telephone=$_POST['telephone'];
        $situation_famille=$_POST['situation_famille']; 
        $adduser=$database->prepare("INSERT INTO gestion_personnels(IMAGES,NOM,PRENOM,EMAIL,ADRESSE,N_CNIE,FONCTION,DATE_NAISSANCE,
        LIEU_DE_NAISSANCE,SEXE,TELEPHONE,SITUATION_FAMILLE)VALUES(:IMAGES,:NOM,:PRENOM,:EMAIL,:ADRESSE,:N_CNIE,:FONCTION,:DATE_NAISSANCE,:LIEU_DE_NAISSANCE,:SEXE,
         :TELEPHONE,:SITUATION_FAMILLE)");
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
           header('Location: ../gestion.php');
        }else{
            echo'<div class="alert alert-info" role="alert"> errur no propose </div>';
    }             
   }
  }
?>