<!-- Header -->
<?php include '../header.php' ?>
<img src="logo.jpg" alt="logo" height="120px" width="120px">

<h1 class="text-center">User <span style="color: rgb(251 179 77);">Details</span></h1>
<div class="container">
  <table class="table table-striped table-bordered table-hover">
    <thead class="table-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Service</th>
        <th scope="col">prix</th>
        <th scope="col"> Date de debut</th>
        <th scope="col"> Date de fin</th>
        <th scope="col"> Partenaire</th>
        <th scope="col"> Commentaire</th>

      </tr>
    </thead>
    <tbody>
      <tr>

        <?php
        //  first we check using 'isset() function if the variable is set or not'
        //Processing form data when form is submitted
        if (isset($_GET['user_id'])) {
          $userid = $_GET['user_id'];

          // SQL query to fetch the data where id=$userid & storing data in view_user 
          $query = "SELECT * FROM users WHERE id = {$userid} ";
          $view_users = mysqli_query($conn, $query);

          while ($row = mysqli_fetch_assoc($view_users)) {
            $userid = $row['id'];
            $prestation = $row['prestation'];
            $prix = $row['prix'];
            $startDate = $row['startDate'];
            $endDate = $row['endDate'];
            $id_partenaire = $row['id_partenaire'];
            $commentaire = $row['commentaire'];

            echo "<tr >";
            echo " <td >{$userid}</td>";
            echo " <td > {$prestation}</td>";
            echo " <td > {$prix}</td>";
            echo " <td >{$startDate} </td>";
            echo " <td >{$endDate} </td>";
            echo " <td >{$id_partenaire} </td>";
            echo " <td >{$commentaire} </td>";

            echo " </tr> ";
          }
        }
        ?>
      </tr>
    </tbody>
  </table>
</div>

<!-- a BACK Button to go to pervious page -->
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