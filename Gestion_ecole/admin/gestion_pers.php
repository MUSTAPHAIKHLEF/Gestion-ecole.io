<?php
 session_start();
 require_once ('includes/header.php');
 require_once ('includes/navbar.php'); 
?>




<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code/code_pers.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">

                <div class="form-group">
                  <label>IMAGE :</label>
                  <input type="file" name="image" class="form-control">
                </div>

                  <div class="form-group">
                  <label>N_CNIE :</label>
                  <input type="text" name="ncnie" class="form-control" placeholder="N_CNIE">
                </div>
                <div class="form-group">
                  <label>NOM :</label>
                  <input type="text" name="name" class="form-control" placeholder="name">
                </div>
                <div class="form-group">
                  <label>PRENOM :</label>
                  <input type="text" name="prenom" class="form-control" placeholder="prenom">
                </div>
                <div class="form-group">
                  <label>EMAIL :</label>
                  <input type="email" name="email" class="form-control checking_email" placeholder="votre email">
                  <small class="error_email" style="color: red;"></small>
                </div>

                <div class="form-group">
                  <label>ADRESSE :</label>
                  <input type="text" name="adresse" class="form-control">
                </div>

                <div class="form-group">
                  <label>FONCTION :</label>
                  <select name="fonction" class="form-control">
                      <option>Directeur</option>
                      <option>Employer</option>
                      <option>Formateur</option>
                      <option>R.H</option>
                  </select> 
                </div>

                <div class="form-group">
                  <label>DATE DE NAISSANCE :</label>
                  <input type="date" name="date_N" class="form-control">
                </div>

                <div class="form-group">
                  <label>LIEU DE NAISSANCE :</label>
                  <input type="text" name="lieu_N" class="form-control">
                </div>

                <div class="form-group">
                  <label>SEXE :</label>
                  <select name="sexe" class="form-control">
                      <option>M</option>
                      <option>F</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>TELEPHONE :</label>
                  <input type="text" name="telephone" class="form-control">
                </div>

                <div class="form-group">
                  <label>SITUATION FAMILLE :</label>
                  <select name="situation_f" class="form-control">
                      <option>Marier</option>
                      <option>Celebataire</option>
                      <option>Devorcer</option>
                      <option>Remarier</option>
                  </select>
                </div>

                  <input type="hidden" name="usertype" class="form-control" value="admin" />   
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn_pers" class="btn btn-primary">Save</button>
        </div>
      </form>

            </div>
        </div>
    </div>

    <div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile"> 
                <i class="fas fa-fw fa-user-plus"></i>
                </button>
            </h6>
    </div>
    <div class="card-body">

    <div class="table-responsive">

      <?php
      require 'connexion.php';

      $query = "SELECT * FROM gestion_personnels";
      $query_run = mysqli_query($connection, $query);

      ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>IMAGE</th>
                    <th>N_CINE</th>
                    <th>NOM</th>
                    <th>PRENOM</th>
                    <th>EMAIL</th>
                    <th>ADRESSE</th>
                    <th>FONCTION</th>
                    <th>DATE DE NAISSANCE</th>
                    <th>LIEU DE NAISSANCE</th>
                    <th>SEXE</th>
                    <th>TELEPHONE</th>
                    <th>SITUATION FAMILLE</th>
                    <th>ROLE</th>
                    <th>EDIT</th>
                    <th>SUUPRIMER</th>
                </tr>
            </thead>
            <tbody>
            <?php
             if(mysqli_num_rows($query_run) > 0)
             {
               while($row = mysqli_fetch_assoc($query_run))
               {              
                
                ?>
                <tr>
                    <td><?php echo '<img src="img/'.$row['IMAGE'].'" width="50px;" height="50px;" alt="image">' ?></td>                    
                    <td><?php echo $row['N_CNIE'];  ?></td>
                    <td><?php echo $row['NOM']; ?></td>
                    <td><?php echo $row['PRENOM']; ?></td>
                    <td><?php echo $row['EMAIL']; ?></td>
                    <td><?php echo $row['ADRESSE']; ?></td>
                    <td><?php echo $row['FONCTION']; ?></td>
                    <td><?php echo $row['DATE_NAISSANCE']; ?></td>
                    <td><?php echo $row['LIEU_DE_NAISSANCE']; ?></td>
                    <td><?php echo $row['SEXE']; ?></td>
                    <td><?php echo $row['TELEPHONE']; ?></td>
                    <td><?php echo $row['SITUATION_FAMILLE']; ?></td>
                    <td><?php echo $row['ROLE'];  ?></td>
                    <td>
                      <form action="gestion_pers_edit.php" method="POST">
                        <input type="hidden" name="edit_ncnie" value="<?php echo $row['N_CNIE']; ?>">
                        <button type="submit" class="btn btn-success" name="edit_pers">EDIT</button>
                      </form>
                    </td>
                    <td>
                      <form action="code/code_pers.php" method="POST">
                      <input type="hidden" name="delete_ncnie" value="<?php echo $row['N_CNIE']; ?>">
                      <button type="submit" name="delete_pers" class="btn btn-danger">DELETE</button>
                      </form>
                    </td>
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
    </div>
 </div>
</div>

</div>

<?php require_once ('includes/scripts.php') ?>
<?php require_once ('includes/footer.php') ?>



