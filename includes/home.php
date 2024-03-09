<!-- Header -->
<?php include "../header.php" ?>

<div class="container">
  <img src="logo.jpg" alt="logo" height="120px" width="120px">

  <h1 class="text-center">Prestation de <span style="color: rgb(251 179 77);">Digital Factory</span></h1>
  <a href="create.php" class='btn btn-outline-dark mb-2'> <i class="bi bi-person-plus"></i> Create New Service</a>

  <table class="table table-striped table-bordered table-hover">
    <thead class="table-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Service</th>
        <th scope="col">Prix</th>
        <th scope="col"> Date de debut</th>
        <th scope="col"> Date de fin</th>
        <th scope="col"> Partenaire </th>
        <th scope="col"> Commentaire</th>

        <th scope="col" colspan="3" class="text-center">CRUD Operations</th>
      </tr>
    </thead>
    <tbody>
      <tr>

        <?php
        $query = "SELECT * FROM users";               // SQL query to fetch all table data
        $view_users = mysqli_query($conn, $query);    // sending the query to the database

        //  displaying all the data retrieved from the database using while loop
        while ($row = mysqli_fetch_assoc($view_users)) {
          $id = $row['id'];
          $prestation = $row['prestation'];
          $prix = $row['prix'];
          $startDate = $row['startDate'];
          $endDate = $row['endDate'];
          $id_partenaire = $row['id_partenaire'];
          $commentaire = $row['commentaire'];


          echo "<tr >";
          echo " <th scope='row' >{$id}</th>";
          echo " <td > {$prestation}</td>";
          echo " <td > {$prix}</td>";
          echo " <td >{$startDate} </td>";
          echo " <td >{$endDate} </td>";
          echo " <td >{$id_partenaire} </td>";
          echo " <td >{$commentaire} </td>";

          echo " <td class='text-center'> <a href='view.php?user_id={$id}' class='btn btn-primary'> <i class='bi bi-eye'></i> View</a> </td>";

          echo " <td class='text-center' > <a href='update.php?edit&user_id={$id}' class='btn btn-secondary'><i class='bi bi-pencil'></i> EDIT</a> </td>";

          echo " <td  class='text-center'>  <a href='delete.php?delete={$id}' class='btn btn-danger'> <i class='bi bi-trash'></i> DELETE</a> </td>";
          echo " </tr> ";
        }
        ?>
      </tr>
    </tbody>
  </table>
</div>

<!-- a BACK button to go to the index page -->
<div class="container text-center mt-5">
  <a href="../index.php" class="btn btn-warning mt-5" id="bouton"> Back </a>
  <div>

    <!-- Footer -->
    <style>
      #bouton {
        color: white;
        background-color: rgb(251 179 77);
        ;
      }
    </style>