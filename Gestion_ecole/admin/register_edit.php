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

                if(isset($_POST['edit']))
            {
                $id = $_POST['edit_id'];
                
                $query = "SELECT * FROM utilisateurs WHERE ID='$id'";
                $query_run = mysqli_query($connection, $query);
                
                foreach($query_run as $row)
                {
                  ?>
                <form action="code/code.php" method="POST">

                <input type="hidden" name="edit_id" value="<?php echo $row['ID']; ?>" /> 

                <div class="form-group">
                  <label for="">IMAGE :</label>
                  <img src="<?php echo "img/".$row['IMAGES']; ?>" width="100px">
                  <input type="file" name="faculty_image" id="faculty_image" class="form-control mt-2" value="<?php echo $row['IMAGES']; ?>">
                </div>

                <div class="form-group">
                  <label>N_CNIE :</label>
                  <input type="text" name="ncnie" class="form-control" value="<?php echo $row['N_CNIE']; ?>" placeholder="N_CNIE">
                </div>
                <div class="form-group">
                  <label>NOM :</label>
                  <input type="text" name="edit_name" class="form-control" value="<?php echo $row['NOM']; ?>" placeholder="name">
                </div>
                <div class="form-group">
                  <label>PRENOM :</label>
                  <input type="text" name="edit_prenom" class="form-control" value="<?php echo $row['PRENOM']; ?>" placeholder="prenom">
                </div>
                <div class="form-group">
                  <label>EMAIL :</label>
                  <input type="email" name="edit_email" class="form-control" value="<?php echo $row['EMAIL']; ?>" placeholder="votre email">
                </div>
                <div class="form-group">
                  <label>PASSWORD :</label>
                  <input type="password" name="edit_password" class="form-control" value="<?php echo $row['PASSWORD']; ?>" placeholder="mot de passe">
                </div>
                <div class="form-group">
                  <label>ROLE :</label>
                   <select name="edit_usertype" class="form-control">
                     <option value="ADMIN">ADMIN</option>
                     <option value="USER">USER</option>
                   </select>
                   </div>
                <a href="register.php" class="btn btn-danger">CANCEL</a>
                <button type="submit" name="update" class="btn btn-primary" >UPDATE</button>

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