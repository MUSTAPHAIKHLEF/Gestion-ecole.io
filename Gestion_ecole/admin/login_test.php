<?php
 include('security.php');
include ('includes/header.php'); 
include ('includes/navbar.php'); 

?>
  <style>
#hero {  
  width: 100%;
  height: 70vh;
  background: url("img/Etudiants.jpg") top center; height: 65%;
  background-size: cover;
  background-position: center;
}
.container{
  color: lightsalmon;
  position: absolute; left: 300px; top: 0px;
}

  </style>
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>BIENVENUE DANS VOTRE ECOLE</h1>
    </div>
<section id="hero" class="d-flex justify-content-center align-items-center">

  </section><!-- End Hero -->

                    <div class="row">
                        <div class="col-xl-3 col-md-6 mb-2">
                            <div class="card border-left-primary shadow h-100 py-0">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Registered Admins
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                             <?php
                                                require 'connexion.php';

                                                $query = "SELECT N_CNIE FROM utilisateurs ORDER BY id";  
                                                $query_run = mysqli_query($connection, $query);
                                                $row = mysqli_num_rows($query_run);
                                                echo '<h4> Admins:</br> '.$row.'</h4>';
                                            ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-2">
                            <div class="card border-left-primary shadow h-100 py-0">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registered Personnels</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                require 'connexion.php';

                                                $query = "SELECT N_CNIE FROM gestion_personnels ORDER BY id";  
                                                $query_run = mysqli_query($connection, $query);
                                                $row = mysqli_num_rows($query_run);
                                                echo '<h4>Personnels:</br> '.$row.'</h4>';
                                            ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-2">
                            <div class="card border-left-primary shadow h-100 py-0">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registered Affectations</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                require 'connexion.php';

                                                $query = "SELECT N_CNIE FROM affectations ORDER BY N_CNIE";  
                                                $query_run = mysqli_query($connection, $query);
                                                $row = mysqli_num_rows($query_run);
                                                echo '<h4>Affectation:</br> '.$row.'</h4>';
                                            ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-id-card fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-2">
                            <div class="card border-left-primary shadow h-100 py-0">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registered Absences</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                require 'connexion.php';

                                                $query = "SELECT N_CNIE FROM absences ORDER BY N_CNIE";  
                                                $query_run = mysqli_query($connection, $query);
                                                $row = mysqli_num_rows($query_run);
                                                echo '<h4>Absences:</br> '.$row.'</h4>';
                                            ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-user-slash fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

<?php require_once ('includes/scripts.php') ?>



