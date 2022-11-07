<?php 
session_start();
require_once("connexion.php");
require_once ('includes/header.php'); 
require_once ('includes/navbar.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>my first site web</title>
<head>
</head>
<body>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter Des Personnes</h5>
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
                  <label>NOM :</label>
                  <input type="text" name="name" class="form-control" placeholder="name ....">
                </div>
                <div class="form-group">
                  <label>PRENOM :</label>
                  <input type="text" name="prenom" class="form-control" placeholder="prenom ....">
                </div>
                <div class="form-group">
                  <label>N_CNIE :</label>
                  <input type="text" name="ncnie" class="form-control" placeholder="N_CNIE ....">
                </div>
                <div class="form-group">
                  <label>EMAIL :</label>
                  <input type="email" name="email" class="form-control checking_email" placeholder="votre email ....">
                  <small class="error_email" style="color: red;"></small>
                </div>
                <div class="form-group">
                  <label>ADRESSE :</label>
                  <input type="text" name="adresse" class="form-control" placeholder="adresse...">
                </div>
                <div class="form-group">
                  <label>FONCTION:</label>
                  <select class="form-select" name="fonction">
                            <option>CHOISISSEZ </option>
                            <option>PROFFESSEUR</option>
                            <option>DIRECTEUR</option>
                            <option>EMPLOYE</option>
                            <option>R.H</option>
                  </select>  
                </div>
                <div class="form-group">
                  <label>DATE DE NAISSANCE :</label>
                  <input class="form-control"  type="date" name="date_naissance"></input>
                </div>
                <div class="form-group">
                  <label>LIEU DE NAISSANCE :</label>
                  <input class="form-control" type="text" name="lieu_de_naissance"></input>
                </div>
                <div class="form-group">
                  <label>SEXE :</label>
                  <select class="form-select" name="sexe" required>
                      <option>M</option>
                      <option>F</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>TELEPHONE :</label>
                  <input class="form-control" type="text" name="telephone" placeholder="votre numéro ...."></input>
                </div>
                <div class="form-group">
                  <label>SITUATION FAMILLIALE :</label>
                  <select name="situation_famille" class="form-select">
                      <option>MARIE(E)</option>
                      <option>CELEBATAIRE(E)</option>
                      <option>DIVORCE(E)</option>
                      <option>REMARIE(E)</option>
			        	  </select>
                </div>
                  <input type="hidden" name="usertype" class="form-control" value="admin" />   
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button class="btn btn-primary"  type="submit" name="inserer">Save</button>
        </div>
      </form>

            </div>
        </div>
    </div>
    <h2 align="center" style="color: lightslategrey;">LES RENSIGNEMENTS PERSONNELS</h2>
 <form class="d-flex col-md-1">
      <button type="button" class="btn btn-primary me-2" data-toggle="modal" data-target="#addadminprofile">
          <i class="fas fa-fw fa-user-plus"></i>
      </button>	
      <a name="update" class="btn btn-success me-2" href="user/modifier_pers.php"><i class="fas fa-fw fa-user-edit"></i></a>	
      <a class="btn btn-danger me-2" name="quitter" href="index.php"><i class="fas fa-fw fa-undo-alt"></i></a>
</form>

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
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,'gestion_ecole');
    $query = "SELECT * FROM  gestion_personnels";
    $query_run = mysqli_query($connection,$query) or die (mysqli_error($connection));
    if(mysqli_num_rows($query_run) > 0)
      {
          ?>
<form class="for" width="100%" method="POST" action="code/code_pers.php" enctype="multipart/form-data">
    <table class="table table-warning table-striped" id="dataTable" width="100%" cellspacing="0">
      <thead>
      <tr >
      <th>IMAGE</th>
      <th>CNIE</th>
      <th>NOM</th>
      <th>PRENOM</th>      
      <th>EMAIL</th>
      <th>ADRESSE</th>
      <th>FONCTION</th>
      <th>D.NAISSANCE</th>
      <th>L.NAISSANCE</th>
      <th>S</th>
      <th>TEL</th>
      <th>S.F</th>
      </tr>
      </thead>
      <tbody>

      <?php
               while($row = mysqli_fetch_assoc($query_run))
               {                
                ?>

     <tr align="left">
        <td><?php echo '<img src="img/'.$row['IMAGES'].'" width="50px" height="50px" alt="image">' ?></td>                 
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
</body>
</html>

<?php  include ('includes/scripts.php'); ?>