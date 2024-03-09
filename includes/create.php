<!-- Header -->
<?php include "../header.php";
$cat = "SELECT id_partenaire FROM partenaire";

$listcat = mysqli_query($conn, $cat) or die(mysqli_error($conn));
$rows = mysqli_fetch_all($listcat, MYSQLI_ASSOC);
?>

<?php

if (isset($_POST['create'])) {
  $prestation = $_POST['prestation'];
  $prix = $_POST['prix'];
  $startDate = $_POST['startDate'];
  $endDate = $_POST['endDate'];
  $id_partenaire = $_POST['id_partenaire'];
  $commentaire = $_POST['commentaire'];

  // SQL query to insert user data into the users table
  $query = "INSERT INTO users(prestation, prix, startDate,endDate,id_partenaire,commentaire) VALUES('{$prestation}','{$prix}','{$startDate}','{$endDate}','{$id_partenaire}','{$commentaire}')";
  $add_user = mysqli_query($conn, $query);


  // displaying proper message for the user to see whether the query executed perfectly or not 
  if (!$add_user) {
    echo "something went wrong " . mysqli_error($conn);
  } else {
    echo "<script type='text/javascript'>alert('User added successfully!')</script>";
  }
}
?>
<img src="logo.jpg" alt="logo" height="120px" width="120px">

<h1 class="text-center">Add <span style="color: rgb(251 179 77);">User Details</span></h1>
<div class="container">
  <form action="" method="post">
    <div class="form-group">
      <label for="prestation" class="form-label">Prestation</label>
      <input type="text" name="prestation" class="form-control">
    </div>

    <div class="form-group">
      <label for="prix" class="form-label">Prix</label>
      <input type="text" name="prix" class="form-control">
    </div>

    <div class="form-group">
      <label for="startDate" class="form-label">Date de debut</label>
      <input type="text" name="startDate" class="form-control">
    </div>
    <div class="form-group">
      <label for="endDate" class="form-label">Date de fin</label>
      <input type="text" name="endDate" class="form-control">
    </div>
    <div class="form-group">
      <label for="id_partenaire" class="form-label">Partenaire</label><br>
      <select name="id_partenaire" id="">
        <option value="-1">Select Partner</option>
        <?php foreach ($rows as $row) { ?>
          <option value="<?= $row['id_partenaire'] ?>"><?= $row['id_partenaire'] ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label for="commentaire" class="form-label">Commentaire</label>
      <input type="text" name="commentaire" class="form-control">
    </div>

    <div class="form-group">
      <input type="submit" id="bouton" name="create" class="btn btn-primary mt-2" value="submit">
    </div>
  </form>
</div>

<!-- a BACK button to go to the home page -->
<div class="container text-center mt-5">
  <a href="home.php" class="btn btn-warning mt-5"> Back </a>
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

  </div>
</div>