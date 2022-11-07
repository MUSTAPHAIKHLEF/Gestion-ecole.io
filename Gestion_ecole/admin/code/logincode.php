<?php
 include('../security.php');
include('../connexion.php');

$database=new PDO('mysql:host=localhost;dbname=gestion_ecole','root','');
if(isset($_POST['login_btn']))
{
    $email_login = $_POST['email'];
    $login = $database->prepare("SELECT * FROM utilisateurs WHERE EMAIL = :email AND PASSWORD = :password");
    $login->bindParam("password",$_POST['password']);
    $login->bindParam("email",$_POST['email']);
    $login->execute();
    if($login->rowCount() === 1){
        $user=$login->fetchObject();
      if($user->ACTIVATED === "1"){
            session_start();
            $_SESSION['user']=$user;
    
        if($user->ROLE ==="USER"){
            $_SESSION['NOM'] = $email_login;
            header('Location: ../index.php');
    
        }else if($user->ROLE==="ADMIN"){
            $_SESSION['NOM'] = $email_login;
            header('Location: ../index.php');
            
      }
    
    }else{
        $_SESSION['status'] = '<div class="alert alert-warning"> 
                Please activate your account first, we have sent
                Verification code for your account to your e-mail
          </div>';
        header('Location: ../login.php');
    }
    
    }else{
        $_SESSION['status'] = '<div class="alert alert-danger">Email / Password is Invalid </div>';
        header('Location: ../login.php');
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
    $checkCNIE = $database->prepare("SELECT * FROM utilisateur WHERE N_CNIE='$ncine'");
    $checkCNIE->bindParam("N_CNIE", $ncine);
    if($checkCNIE->rowCount()>0){
        echo'<div class="alert alert-danger" role="alert"> This is a compte user </div>';
    }else{
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
        $adduser=$database->prepare("INSERT INTO gestion_personnels(NOM,PRENOM,EMAIL,ADRESSE,N_CNIE,FONCTION,DATE_NAISSANCE,
        LIEU_DE_NAISSANCE,SEXE,TELEPHONE,SITUATION_FAMILLE)VALUES(:NOM,:PRENOM,:EMAIL,:ADRESSE,:N_CNIE,:FONCTION,:DATE_NAISSANCE,:LIEU_DE_NAISSANCE,:SEXE,
         :TELEPHONE,:SITUATION_FAMILLE)");
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
include('../includes/scripts.php');

if(isset($_POST['register_btn']))
{
    
    $ncnie = $_POST['ncnie'];
    $name = $_POST['name'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $usertype = $_POST['usertype'];

    $email_query = "SELECT * FROM utilisateurs WHERE EMAIL='$email'";
    $email_query = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query) > 0)
    {
        $_SESSION['status'] = "Email Already Taken, please try another one.";
        $_SESSION['status_code'] = "error";
        header('Location: ../login.php');  
    }else{
        if($password === $cpassword)
        {
            $query = "INSERT INTO utilisateurs (N_CNIE,NOM,PRENOM,EMAIL,PASSWORD,ROLE) 
            VALUES ('$ncnie','$name','$prenom','$email','$password','$usertype')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {                
                $_SESSION['status'] = "<div bgcolor='primary'>Admin Profile Added</div>";
                $_SESSION['status_code'] = "success";
                header('Location: ../login.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: ../login.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: ../login.php');  
        }
      }
    }
?>