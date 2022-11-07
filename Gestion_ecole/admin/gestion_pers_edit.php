<?php

require_once ('security.php');
 require_once ('includes/header.php');
 require_once ('includes/navbar.php'); 
?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> EDIT Admin Profile </h6>
        </div>
        <div class="card-body">

        <?php
            require 'connexion.php';

                if(isset($_POST['edit_pers']))
            {
                $ncnie = $_POST['edit_ncnie'];
                
                $query = "SELECT * FROM gestion_personnels WHERE N_CNIE='$ncnie' ";
                $query_run = mysqli_query($connection, $query);

                foreach($query_run as $row)
                {
                  ?>
                <form action="code/code_pers.php" method="POST">

                <div class="form-group">
                  <label>IMAGE :</label>
                  <input type="file" name="image" class="form-control" value="<?php echo $row['IMAGE']; ?>">
                </div>

                  <div class="form-group">
                  <label>N_CNIE :</label>
                  <input type="text" name="ncnie" class="form-control" value="<?php echo $row['N_CNIE']; ?>">
                </div>
                <div class="form-group">
                  <label>NOM :</label>
                  <input type="text" name="name" class="form-control" value="<?php echo $row['NOM']; ?>">
                </div>
                <div class="form-group">
                  <label>PRENOM :</label>
                  <input type="text" name="prenom" class="form-control" value="<?php echo $row['PRENOM']; ?>">
                </div>
                <div class="form-group">
                  <label>EMAIL :</label>
                  <input type="email" name="email" class="form-control checking_email" value="<?php echo $row['EMAIL']; ?>" >
                  <small class="error_email" style="color: red;"></small>
                </div>

                <div class="form-group">
                  <label>ADRESSE :</label>
                  <input type="text" name="adresse" class="form-control" value="<?php echo $row['ADRESSE']; ?>">
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
                  <input type="date" name="date_N" class="form-control" value="<?php echo $row['DATE_NAISSANCE']; ?>">
                </div>

                <div class="form-group">
                  <label>LIEU DE NAISSANCE :</label>
                  <input type="text" name="lieu_N" class="form-control" value="<?php echo $row['LIEU_DE_NAISSANCE']; ?>">
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
                  <input type="text" name="telephone" class="form-control" value="<?php echo $row['TELEPHONE']; ?>">
                </div>

                <div class="form-group">
                  <label>SITUATION FAMILLE :</label>
                  <select name="situation_f" class="form-control">
                      <option value="<?php echo $row['TELEPHONE']; ?>"></option>
                      <option>Marier</option>
                      <option>Celebataire</option>
                      <option>Devorcer</option>
                      <option>Remarier</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>ROLE :</label>
                   <select name="usertype" class="form-control">
                     <option value="admin">ADMIN</option>
                     <option value="user">USER</option>
                   </select>
                   </div>
                <a href="gestion.php" class="btn btn-danger">CANCEL</a>
                <button type="submit" name="user/update_pers" class="btn btn-primary" >UPDATE</button>

                </form>


                <?php
                }
            }
         ?>

        </div>
    </div>
</div>

</div>

<?php require_once ('includes/scripts.php') ?>
<?php require_once ('includes/footer.php') ?>