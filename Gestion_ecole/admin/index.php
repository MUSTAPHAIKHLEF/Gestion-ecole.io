<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gestion_ecole</title>
</head>
<body>
    
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
                                                TOTAL DES ADMINISTRATION ENREGISTRE
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                             <?php
                                                // require 'connexion.php';

                                                // $query = "SELECT N_CNIE FROM utilisateurs ORDER BY id";  
                                                // $query_run = mysqli_query($connection, $query);
                                                // $row = mysqli_num_rows($query_run);
                                                // echo '<h4> Admins:</br> '.$row.'</h4>';
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
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">TOTAL DES PERSONNELS ENREGISTRE</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                // require 'connexion.php';

                                                // $query = "SELECT N_CNIE FROM gestion_personnels ORDER BY id";  
                                                // $query_run = mysqli_query($connection, $query);
                                                // $row = mysqli_num_rows($query_run);
                                                // echo '<h4>Personnels:</br> '.$row.'</h4>';
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
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">TOTAL DES AFFECTATIONS ENREGISTRE</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                // require 'connexion.php';

                                                // $query = "SELECT N_CNIE FROM affectations ORDER BY N_CNIE";  
                                                // $query_run = mysqli_query($connection, $query);
                                                // $row = mysqli_num_rows($query_run);
                                                // echo '<h4>Affectation:</br> '.$row.'</h4>';
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
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">TOTAL DES ABSENCES ENREGISTRE</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                // require 'connexion.php';

                                                // $query = "SELECT N_CNIE FROM absences ORDER BY N_CNIE";  
                                                // $query_run = mysqli_query($connection, $query);
                                                // $row = mysqli_num_rows($query_run);
                                                // echo '<h4>Absences:</br> '.$row.'</h4>';
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


<?php
//  require_once ('includes/scripts.php') 
 ?>




</body>
</html>