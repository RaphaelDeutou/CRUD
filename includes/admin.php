<!-- Header -->
<?php include "../header.php" ?>


<?php
$email = "";
$password = "";
$message = "";

//connexion � la base de donn�es




if (!empty($_POST)) {
    //r�cup�ration des donn�es saisies dans le formulaire
    $email = $_POST["username"];
    $password = md5($_POST["password"]);
    //controle: on s'assure que tous les champs ont �t� remplis
    if (empty($email) || empty($password)) {
        $message = "Veuillez saisir vos parametres de connexion";
    } else //si ok on part verifier dans la base que l'utilisateur existe
    {


        //pour executer une requete on utilise mysqli_query avec 2 param�tres :
        //le resultat de la connexion � la B.D qui est contenu dans $con
        // et la requete propre �crite en SQL encadr�e des doubles c�tes
        $req = mysqli_query($conn, "select username, password from categorie where username='$email' && password = '$password'");

        //pour compter le nombre ligne que renvoie une requete on utilise mysqli_num_rows
        //avec en param�tre la requ�te dont on veut savoir le nombre de ligne
        $nbre_ligne = mysqli_num_rows($req);

        //si l'utilisateur est dans la base alors on va trouver une ligne avec ses informations

        if ($nbre_ligne == 1) {
            //ex�cution de la requ�te
            $req = mysqli_query($conn, "select username, password from categorie where username='$email' && password = '$password'");

            //mysqli_fetch_object me permet de recup�rer chaque information contenu dans une colonne de la table
            //je dois mettre cette information dans une variable que j'ai choisi d'appeler ici $ro
            if ($ro = mysqli_fetch_object($req)) {
                //si l'utilisateur est dans la table
                //on sauvegarde ses informations dans les variables de session
                //a gauche la variable de session et � droite la donn�e qui vient de la base mysql
                //N.B: le signe -> est le tiret de 6 (-) suivi de la balise fermante >
                // il n y a pas d'espace en le signe -> et le nom de la colonne de la table
                //exemple juste $ro->nom
                //exemple faux $ro -> nom ou $ro-> nom

                $_SESSION['username'] = $ro->username;
                $_SESSION['password'] = $ro->password;

                header('location:home.php');

            }
        } else {
            $message = "Erreur : mauvais email ou mot de passe incorrecte";
        }
    }
}

?>


<!-- body -->

<head>
    <link rel="stylesheet" href="style.css">
</head>
<div class="block">
    <div class="under-block">
        <img src="logo.jpg" alt="logo" height="120px" width="120px">
        <div class="container mt-5">
            <div class="big-block">
                <form action="" method="POST">
                    <h1 class="text-center"> Veuillez vous <span style="color: rgb(251 179 77);">connecter</span></h1>

                    <label><b>Nom d'utilisateur</b></label>
                    <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

                    <label><b>Mot de passe</b></label>
                    <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                    <input type="submit" id='submit' value='LOGIN'>
                    <tr>
                        <td colspan="2"><?php echo $message; ?></td>
                    </tr>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<style>
    form {
        width: 100%;
        padding: 30px;
    }

    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    input[type=submit] {
        background-color: rgb(251 179 77);
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    input[type=submit]:hover {
        background-color: white;
        color: rgb(251 179 77);
        border: 1px solid rgb(251 179 77);
    }
</style>