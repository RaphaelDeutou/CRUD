# CRUD PHP / MySQL

Application web basique en PHP mettant en œuvre les quatre opérations CRUD (Create, Read, Update, Delete) sur une base MySQL, avec un espace "partenaires" et une interface d'administration.

## Contenu

- `index.php` — page d'accueil / liste des enregistrements
- `includes/create.php`, `includes/update.php`, `includes/delete.php`, `includes/view.php` — opérations CRUD
- `includes/admin.php` — espace administration
- `includes/verification.php` — validation des données
- `Database File/php_crud.sql` — schéma et données de la base

## Lancer en local

1. Importer `Database File/php_crud.sql` dans une base MySQL nommée `crud`
2. Démarrer un serveur PHP (Apache/XAMPP) avec `index.php` comme point d'entrée
3. Adapter les identifiants de connexion dans `db.php` si besoin (par défaut : `root` sans mot de passe, en local)

## Statut

Projet d'apprentissage pour pratiquer les opérations CRUD en PHP natif.
