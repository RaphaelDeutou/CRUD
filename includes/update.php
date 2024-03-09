<!-- Footer -->
<?php include "../header.php" ?>

<?php
// checking if the variable is set or not and if set adding the set data value to variable userid
if (isset($_GET['user_id'])) {
  $userid = $_GET['user_id'];
}
// SQL query to select all the data from the table where id = $userid
$query = "SELECT * FROM users WHERE id = $userid ";
$view_users = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($view_users)) {
  $iduser = $row['id'];
  $prestation = $row['prestation'];
  $prix = $row['prix'];
  $startDate = $row['startDate'];
  $endDate = $row['endDate'];
  $id_partenaire = $row['id_partenaire'];
  $commentaire = $row['commentaire'];
}

//Processing form data when form is submitted
if (isset($_POST['update'])) {
  $prestation = $_POST['prestation'];
  $prix = $_POST['prix'];
  $startDate = $_POST['startDate'];
  $endDate = $_POST['endDate'];
  $id_partenaire = $_POST['id_partenaire'];
  $commentaire = $_POST['commentaire'];


  // SQL query to update the data in user table where the id = $userid 
  $query = "UPDATE users SET  prestation = '{$prestation}', prix = '{$prix}' , startDate = '{$startDate}', endDate = '{$endDate}',id_partenaire = '{$id_partenaire}', commentaire = '{$commentaire}' WHERE id = $userid";
  $update_user = mysqli_query($conn, $query);
  echo "<script type='text/javascript'>alert('User data updated successfully!')</script>";
}
?>
<img src="logo.jpg" alt="logo" height="120px" width="120px">

<h1 class="text-center">Update <span style="color: rgb(251 179 77);">Service Details</span></h1>
<div class="container ">
  <form action="" method="post">
    <div class="form-group">
      <label for="prestation">Service</label>
        <input type="text" name="prestation" class="form-control" value="<?php echo $prestation  ?>">
    </div>

    <div class="form-group">
      <label for="prix">Prix</label>
      <input type="text" name="prix" class="form-control" value="<?php echo $prix  ?>">
    </div>

    <div class="form-group">
      <label for="startDate">Date de debut</label>
      <input type="text" name="startDate" class="form-control" value="<?php echo $startDate  ?>">
    </div>
    <div class="form-group">
      <label for="endDate">Date de fin</label>
      <input type="text" name="endDate" class="form-control" value="<?php echo $endDate  ?>">
    </div>
    <div class="form-group">
      <label for="id_partenaire">Partenaire</label>
      <input type="text" name="id_partenaire" class="form-control" value="<?php echo $id_partenaire  ?>">
    </div>
    <div class="form-group">
      <label for="commentaire">Commentaire</label>
      <input type="text" name="commentaire" class="form-control" value="<?php echo $commentaire  ?>">
    </div>

    <div class="form-group">
      <input type="submit" id="bouton" name="update" class="btn btn-primary mt-2" value="update">
    </div>
  </form>
</div>

<!-- a BACK button to go to the home page -->
<div class="container text-center mt-5">
  <a href="home.php" id="bouton" class="btn btn-warning mt-5"> Back </a>
  <div>
    <style>
      #bouton {
        color: white;
        background-color: rgb(251 179 77);
        border: none;
      }

      img {
        margin-left: 2rem;
      }
    </style>
    <!-- Footer -->