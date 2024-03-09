<!-- Header -->
<?php include "../header.php" ?>

<?php

if (isset($_POST['create'])) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $numero = $_POST['numero'];
    $born = $_POST['born'];
    $adresse = $_POST['adresse'];

    // SQL query to insert user data into the users table
    $query = "INSERT INTO partenaire(nom, email, numero,born,adresse) VALUES('{$nom}','{$email}','{$numero}','{$born}','{$adresse}')";
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

<h1 class="text-center">Add <span style="color: rgb(251 179 77);">Partner</span></h1>
<div class="container">
    <form action="" method="post">
        <div class="form-group">
            <label for="nom" class="form-label">Nom et prenom</label>
            <input type="text" name="nom" class="form-control">
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="numero" class="form-label">Numero de telephone</label>
            <input type="text" name="numero" class="form-control">
        </div>
        <div class="form-group">
            <label for="born" class="form-label">Date et lieu de naissance</label>
            <input type="text" name="born" class="form-control">
        </div>
        <div class="form-group">
            <label for="typ" class="form-label">Adresse</label>
            <input type="text" name="adresse" class="form-control">

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

        <!-- Footer -->