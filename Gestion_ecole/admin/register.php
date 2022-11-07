<?php
 session_start();
 require_once ('includes/header.php');
 require_once ('includes/navbar.php'); 
?>
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code/code.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">
                  <div class="form-group">
                  <label>IMAGE :</label>
                  <input type="file" name="image" id="image" class="form-file" required>
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
                  <label>PASSWORD :</label>
                  <input type="password" name="password" class="form-control" placeholder="mot de passe">
                </div>
                <div class="form-group">
                  <label>CONFIRMER VOTRE PASSWORD :</label>
                  <input type="password" name="confirmpassword" class="form-control" placeholder="mot de passe">
                </div>

                  <input type="hidden" name="usertype" class="form-control" value="ADMIN" />   
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
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
       <?php
        if(isset($_SESSION['success']) && $_SESSION['success'] != '')
        {
          echo '<h2 class="bg-primary text-white">'.$_SESSION['success'].'</h2>';
          unset($_SESSION['success']);
        }

        if(isset($_SESSION['status']) && $_SESSION['status'] != '')
        {
          echo '<h2 class="bg-danger text-white">'.$_SESSION['status'].'</h2>';
          unset($_SESSION['status']);
        }
       ?>
    <div class="table-responsive">

      <?php
      require 'connexion.php';

      $query = "SELECT * FROM utilisateurs";
      $query_run = mysqli_query($connection, $query);

      if(mysqli_num_rows($query_run) > 0)
      {
          ?>
        <table class="table table-warning table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>IMAGE</th>
                    <th>N_CINE</th>
                    <th>NOM</th>
                    <th>PRENOM</th>
                    <th>EMAIL</th>
                    <th>PASSWORD</th>
                    <th>ROLE</th>
                    <th>EDIT</th>
                    <th>SUUPRIMER</th>
                </tr>
            </thead>
            <tbody>
            <?php
               while($row = mysqli_fetch_assoc($query_run))
               {                
                ?>
                 <tr>
                    <td><?php echo $row['ID'];  ?></td> 
                    <td><?php echo '<img src="img/'.$row['IMAGES'].'" width="50px" height="50px" alt="image">' ?></td>                 
                    <td><?php echo $row['N_CNIE'];  ?></td>
                    <td><?php echo $row['NOM']; ?></td>
                    <td><?php echo $row['PRENOM']; ?></td>
                    <td><?php echo $row['EMAIL']; ?></td>
                    <td><?php echo $row['PASSWORD']; ?></td>
                    <td><?php echo $row['ROLE'];  ?></td>
                    <td>
                      <form action="register_edit.php" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $row['ID']; ?>">
                        <button type="submit" class="btn btn-success" name="edit">EDIT</button>
                      </form>
                    </td>
                    <td>
                      <form action="code/code.php" method="POST">
                        <input type="hidden" name="delete_ncnie" value="<?php echo $row['N_CNIE']; ?>">
                        <button type="submit" name="delete" class="btn btn-danger">DELETE</button>
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



