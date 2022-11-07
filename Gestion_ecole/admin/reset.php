<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <link rel="stylesheet" href="public/css/Style.css" />

    <style>
        body{
            height: 100vh;
            background-image: radial-gradient(circle farthest-corner at -3.1% -4.3%, rgba(
            57,255,186,1) 0%, rgba(21,38,82,1) 90% );
        }
        .btn-secondary{
            width: 80px;
        }
        #forgot-box{            background: rgba(0, 0, 50, 0.5);width: 40%;height: 50%;
            
            position: absolute;left: 550px;}
    </style>
</head>
<body>
<main class="contanier  m-auto " style="max-width:920px; margin-top:50px !important; text-align: center; ">

<?php 

if(!isset($_GET['code'])){
    echo '<div class="row justify-content-center wrapper" id="forgot-box">
            <div class="col-lg-12">
            <div class="row">
            <div class="col-lg-5 d-flex flex-column justify-content-center">
              <h1 class="text-center font-weight-bold">Réinitialiser le mot de passe!</h1>
              <hr class="my-2" />
              <a href="login.php" class="btn btn-outline-light btn-lg font-weight-bolder myLinkBtn align-self-center" id="back-link">Revenir</a>
              </div>
                <div class="col-lg-7 p-7">
                <h1 class="text-center font-weight-bold text-primary">Mot de passe oublié?</h1>
                <hr class="my-2" />
                <p class="lead text-center text-secondary">Entrez l\'adresse e-mail enregistrée</p>
                <form action="" method="post" class="px-2" id="forgot-form">
                  <div id="forgotAlert"></div>
                    <div class="input-group input-group-lg form-group">
                        <input type="email" name="email" class="form-control rounded-0" placeholder="E-Mail" required />
                    </div>
                   <div class="form-group">
                  <input type="submit" id="forgot-btn" name="resetPassword" value="Réinitialiser" class="btn btn-primary btn-lg btn-block myBtn mt-2 w-100" />
                 </div>
                 <br>
                </form>
              </div>
         </div>
       </div>
     </div>';
}else if(isset($_GET['code']) && isset($_GET['email'])){
    echo '<div class="row justify-content-center wrapper" id="forgot-box">
    <div class="col-lg-12 my-auto">
    <div class="d-flex">
    <div class="col-lg-5 d-flex flex-column justify-content-center myColor p-3">
      <h2 class="text-center font-weight-bold text-white">Reset the Password to the Email</h2>
      </div>
      <div class="col-lg-9 my-auto">           
          <form action="" method="post"  id="forgot-form">
          <div class="col-lg-5 d-flex flex-column justify-content-center myColor p-4">
            <div id="forgotAlert"></div>
            
              <div class="input-group input-group-lg form-group">
              
              <div><h4 class="text-primary mt-3 me-2">New Password : </h4></div>
              <div><input class="form-control mt-2" type="text" name="password" required/> </div>
              
              </div>
              <div class="d-flex">
              <button type"submit" class="btn btn-warning mt-3" name="newPassword">Password Reset</button>

             <a class="btn btn-secondary mt-3 ms-2" type="submit" name="retour" href="login.php">Back</a>
             </div>
             <br>
          </form>
 </div>


      </div>
 </div>
</div>
</div>';
}
?>


<?php 
if(isset($_POST['resetPassword']) ){
    $username = "root";
    $password = "";
    $database = new PDO("mysql:host=localhost; dbname=gestion_ecole;",$username,$password);    
    $checkEmail = $database->prepare("SELECT EMAIL,SECURITY_CODE FROM utilisateurs WHERE EMAIL = :email");
    $checkEmail->bindParam("email",$_POST['email']);
    $checkEmail->execute();

    if( $checkEmail->rowCount() > 0){
        require_once 'mail.php';
        $user = $checkEmail->fetchObject();
        $mail->addAddress($_POST['email']);
        $mail->Subject = "réinitialisation de mot de passe";
        $mail->Body = 'lien de réinitialisation de mot de passe  <br>
        ' . '<a href="http://localhost/fichiers/first_pro/admin/reset.php?email='.$_POST['email']. 
        '&code='.$user->SECURITY_CODE. '">http://localhost/fichiers/first_pro/admin/reset.php?email='.$_POST['email']. 
        '&code='.$user->SECURITY_CODE.'</a>';        
        $mail->setFrom("ikhlef.mu@gmail.com", "MUSTAPHA IKHLEF");
        $mail->send();
        echo '
        <div class="alert alert-success"> summer password reset link send </div>';
    }else{
        echo '
        <div class="alert alert-danger">This email is not registered with us</div> 
        ';
    }
}
?>

<?php 
 $username = "root";
 $password = "";
 $database = new PDO("mysql:host=localhost; dbname=gestion_ecole;",$username,$password);    
if(isset($_POST['newPassword'])){
    
   $updatePassword = $database->prepare("UPDATE utilisateurs SET PASSWORD 
   = :password WHERE EMAIL = :email");
   $updatePassword->bindParam("password",$_POST['password']);
   $updatePassword->bindParam("email",$_GET['email']);
   
   if($updatePassword->execute()){
    echo '
    <div class="alert alert-success mt-3"> Password reset successfully </div> 
    ';
   }else{
    echo '
    <div class="alert alert-danger mt-3"> Password Reset Failed </div>
    ';
   }
}

?>

</main>
</body>
</html>
<?php require_once ('includes/scripts.php') ?>