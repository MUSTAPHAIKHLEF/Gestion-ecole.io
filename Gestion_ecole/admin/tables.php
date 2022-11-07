

<?php
include('security.php');
include ('includes/header.php'); 
include ('includes/navbar.php'); 
?>
              
    <div class="container-fluid">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">RENSEIGNEMENTS PERSONNELS</h6>
            </div>
                        <div class="card-body">
                            <div class="table-responsive">

                            <?php
                              require 'connexion.php';

                              $query = "SELECT * FROM gestion_personnels";
                              $query_run = mysqli_query($connection, $query);

                            ?>

                            <table class="table table-success table-striped" id="dataTable" width="100%" cellspacing="0" width="70%">
                          <thead>
                           <tr>
                           <th>IMAGE</th>
                          <th>NOM</th>
                          <th>PRENOM</th>
                          <th>CNIE</th>
                          <th>EMAIL</th>
                          <th>ADRESSE</th>
                          <th>FONCTION</th>
                          <th>DATE DE NAISSANCE</th>
                          <th>LIEU DE NAISSANCE</th>
                          <th>SEXE</th>
                          <th>TEL</th>
                          <th>S.F</th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php
                                if(mysqli_num_rows($query_run) > 0)
                                {
                                  while($row = mysqli_fetch_assoc($query_run))
                                  {                      
                           ?> 
                          <tr align="left">
                          <td><?php echo '<img src="img/'.$row['IMAGES'].'" width="50px" height="50px" alt="image">' ?></td>                 
                          <td><?php echo $row['NOM'] ?></td>
                          <td><?php echo $row['PRENOM'] ?></td>
                          <td><?php echo $row['N_CNIE'] ?></td>
                          <td> <?php echo $row['EMAIL']?></td>
                          <td><?php echo $row['ADRESSE'] ?></td>
                          <td><?php echo $row['FONCTION']?></td>
                          <td><?php echo $row['DATE_NAISSANCE'] ?></td>
                          <td><?php echo $row['LIEU_DE_NAISSANCE'] ?></td>
                          <td><?php echo $row['SEXE'] ?></td>
                          <td><?php echo $row['TELEPHONE'] ?></td>
                          <td><?php echo $row['SITUATION_FAMILLE'] ?></td>
                          </tr>
                          <?php                
                              }
                            }
                            else{
                              echo 'no found';
                            }
                            ?>
                          </tbody>
                          </table>
                      </form>
                  </div>
                </div>
          </div>
    </div>    
    <?php
    include ('includes/scripts.php'); 
    include ('includes/footer.php');    
    ?>