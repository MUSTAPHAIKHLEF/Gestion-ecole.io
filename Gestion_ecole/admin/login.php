<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Login, Registration & Forgot Form Design</title>
    <style>
              .st{
           background: url(img/Formation_ENSG.jpg);
           background-size: cover;
           background-position: center;
          }
      .container{
            max-width: 700px;
            float: none;
            margin: 150px;
        }
        #register-box{
            background: rgba(0, 0, 50, 0.5);width: 50%;height: 90%;
            position: absolute;left: 550px;top: 10px;
        }
        #login-box{
            background: rgba(0, 0, 50, 0.5);width: 40%;height: 50%;
            
            position: absolute;left: 550px;
        }
        #rt{
            background-color:transparent !important;
        }
    </style>  
  </head>
  <body class="st">
    <div class="container">
      <!-- Login Form Start -->
      <div class="row justify-content-center wrapper" id="login-box">
        <div class="col-lg-12 my-auto myShadow">
          <div class="row">
            <div class="col-lg-7">
              <h1 class="text-center font-weight-bold text-primary">S'identifier</h1>
              <hr class="my-3" />
              <?php

                    // if(isset($_SESSION['status']) && $_SESSION['status'] !='') 
                    // {
                    //     echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
                    //     unset($_SESSION['status']);
                    // }
                    ?>
              <form action="code/logincode.php" method="post" class="px-3" id="login-form">
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><i class="far fa-envelope fa-lg fa-fw"></i></span>
                  </div>
                  <input type="email" name="email" class="form-control rounded-0" placeholder="E-Mail" required />
                </div>
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><i class="fas fa-key fa-lg fa-fw"></i></span>
                  </div>
                  <input type="password" id="password" name="password" class="form-control rounded-0" minlength="3" placeholder="Password" required autocomplete="off" />
                </div>
                <div class="form-group clearfix">
                  <div class="forgot float-left">
                    <a href="reset.php" id="forgot-link">Mot de passe oublié?</a>
                  </div>
                </div>
                <div class="form-group">
                  <input type="submit" name="login_btn" value="Connecter" id="login-btn" class="btn btn-primary btn-lg btn-block myBtn" />
                </div>
              </form>
            </div>
            <div class="col-lg-5 d-flex flex-column justify-content-center myColor p-4">
              <h1 class="text-center font-weight-bold text-white">Inscrivez-vous ici</h1>
              <hr class="my-3 bg-light myHr" />
              <button class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 myLinkBtn" id="register-link">S'inscrire</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Login Form End -->
      <!-- Registration Form Start -->
      <div class="row justify-content-center wrapper" id="register-box" style="display: none;">
        <div class="col-lg-12 my-auto myShadow">
          <div class="row">
            <div class="col-lg-5 d-flex flex-column justify-content-center myColor p-4">
              <h1 class="text-center font-weight-bold text-white">Content de te revoir!</h1>
              <hr class="my-4 bg-light myHr" />
              <button class="btn btn-outline-light btn-lg font-weight-bolder mt-4 align-self-center myLinkBtn" id="login-link">Se connecter</button>
            </div>
            <div class="col-lg-7 p-4">
              <h1 class="text-center font-weight-bold text-primary">Créer un compte</h1>
              <hr class="my-3" />
              <form action="code/logincode.php" method="post" class="px-3" id="register-form">
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0">
                      <i class="far fa-user fa-lg fa-fw"></i></span>
                  </div>
                  <input type="text" id="name" name="name" class="form-control rounded-0" placeholder="Nom..." required />
                </div>
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0">
                      <i class="far fa-user fa-lg fa-fw"></i></span>
                  </div>
                  <input type="text" id="prenom" name="prenom" class="form-control rounded-0" placeholder="Prenom...." required />
                </div>
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0">
                      <i class="far fa-id-card fa-lg fa-fw"></i></span>
                  </div>
                  <input type="text" id="ncnie" name="ncnie" class="form-control rounded-0" placeholder="N_CNIE" required />
                </div>
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><i class="far fa-envelope fa-lg fa-fw"></i></span>
                  </div>
                  <input type="email" id="email" name="email" class="form-control rounded-0" placeholder="E-Mail" required />
                </div>
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><i class="fas fa-key fa-lg fa-fw"></i></span>
                  </div>
                  <input type="password" id="password" name="password" class="form-control rounded-0" minlength="5" placeholder="Mot de passe" required />
                </div>
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0">
                      <i class="fas fa-key fa-lg fa-fw"></i></span>
                  </div>
                  <input type="password" id="confirmpassword" name="confirmpassword" class="form-control rounded-0" minlength="5" placeholder="Confirmer Mot de passe" required />
                 </div>
                   
                 <input type="hidden" name="usertype" class="form-control" value="USER" />
                <!-- <div class="form-group">
                  <div id="passError" class="text-danger font-weight-bolder"></div>
                </div> -->
                <div class="form-group">
                  <input type="submit" id="register-btn" name="register_btn" value="S'inscrire" class="btn btn-primary btn-lg btn-block myBtn" />
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Registration Form End -->
      <!-- Forgot Password Form Start -->


    </div>
  </body>
</html>

    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
$(function () {
  $("#register-link").click(function () {
    $("#login-box").hide();
    $("#register-box").show();
  });
  $("#login-link").click(function () {
    $("#login-box").show();
    $("#register-box").hide();
  });
  $("#forgot-link").click(function () {
    $("#login-box").hide();
    $("#forgot-box").show();
  });
  $("#login-link").click(function () {
    $("#login-box").show();
    $("#forgot-box").hide();
  });
});
</script> -->
<?php
// include('includes/scripts.php'); 
?>