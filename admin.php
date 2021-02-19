<?php
include 'connectdb.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Landing Page</title>
</head>
<body> 

<div class= updateprez>
<form action="admin.php" method="post">
      <h1>Update de la PREZ</h1>
      <input type="number" name="id" required placeholder="ID..">
      <input type="text" name="prez" required placeholder="Prez..">
      <input type="submit" name="update" value="Go!">
    </form>

<?php

// Update de la prez
if(isset($_POST['update'])) {
    $prez = $_POST['prez'];
    $id = $_POST['id'];
 
    try{
     $pdo = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
     $requete = "UPDATE `presentation` SET
     `prez` = :prez
     WHERE `id` = :id"; 
     $prepare = $pdo->prepare($requete);
     $prepare->execute(array(
         ":prez" => $prez,
         ":id" => $id
     ));
     $res = $prepare->rowCount();
 
     if($res == 1){
        echo "<p> Mis à jour! </p>";
     }
 
 }
 catch (PDOException $e){
     exit("❌🙀❌ OOPS :\n" . $e->getMessage());
 }
 }
?>
</div>

<div class=create reseau>
<!-- CREATE -->
 <form action="admin.php" method="post">
      <h1>Créer lien</h1>
      <input type="text" name="lienDuReseau" required placeholder="Liens..">
      <input type="submit" name="create" value="Go!">
    </form>

<?php
if (isset($_POST['create'])) {
    $lienDuReseau = $_POST['lienDuReseau'];
    try {
      $pdo = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
      $requete = "INSERT INTO `lien` (`lienDuReseau`)
                  VALUES (:lienDuReseau);";
      $prepare = $pdo->prepare($requete);
      $prepare->execute(array(
        ':lienDuReseau' => $lienDuReseau
      ));
      $res = $prepare->rowCount();
  
      if ($res == 1) {
        echo "<p>Le lienDuReseau a été ajouté à la DB !</p>";
           
      }
    } catch (PDOException $e) {
      exit("❌🙀❌ OOPS :\n" . $e->getMessage());
      
    }
  }
?>
</div>

<!-- // Update du lien -->
    <div class= updateLien>
<form action="admin.php" method="post">
      <h1>Update du lien</h1>
      <input type="number" name="id" required placeholder="ID..">
      <input type="text" name="lienDuReseau" required placeholder="Lien..">
      <input type="submit" name="update" value="Go!">
    </form>

<?php
if(isset($_POST['update'])) {
    $lienDuReseau = $_POST['lienDuReseau'];
    $id = $_POST['id'];
 
    try{
     $pdo = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
     $requete = "UPDATE `lien` SET
     `lienDuReseau` = :lienDuReseau
     WHERE `id` = :id"; 
     $prepare = $pdo->prepare($requete);
     $prepare->execute(array(
         ":lienDuReseau" => $lienDuReseau,
         ":id" => $id
     ));
     $res = $prepare->rowCount();
 
     if($res == 1){
        echo "<p> Lien mis à jour </p>";
     }
 
 }
 catch (PDOException $e){
     exit("❌🙀❌ OOPS :\n" . $e->getMessage());
 }
 }
?>
</div>

<div class=deleteLien>

<!-- DELETE LIEN-->
<form action="admin.php" method="post">
      <h1>Delete le lien</h1>
      <input type="number" name="id" required placeholder="ID..">
      <input type="submit" name="delete" value="Go!">
    </form>

<?php
    if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    try {
        $pdo = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
        $requete = "DELETE FROM `lien` WHERE `id` = :id;";
        $prepare = $pdo->prepare($requete);
        $prepare->execute(array(
            ':id' => $id
        ));
        echo "<p>Le film a bien été dégagé</p>";
    } catch (PDOException $e) {
        exit("❌🙀❌ OOPS :\n" . $e->getMessage());
    }
}
?>

<!-- // Update du TITLE -->
<div class= updateTitle>
<form action="admin.php" method="post">
      <h1>Update du TITLE</h1>
      <input type="number" name="id" required placeholder="ID..">
      <input type="text" name="title" required placeholder="Title..">
      <input type="submit" name="updateTitle" value="Go!">
    </form>

<?php


if(isset($_POST['updateTitle'])) {
    $title = $_POST['title'];
    $id = $_POST['id'];
 
    try{
     $pdo = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
     $requete = "UPDATE `titre` SET
     `title` = :title
     WHERE `id` = :id"; 
     $prepare = $pdo->prepare($requete);
     $prepare->execute(array(
         ":title" => $title,
         ":id" => $id
     ));
     $res = $prepare->rowCount();
 
     if($res == 1){
        echo "<p> Mis à jour! </p>";
     }
 
 }
 catch (PDOException $e){
     exit("❌🙀❌ OOPS :\n" . $e->getMessage());
 }
 }
?>
</div>



</div>


<div class=updateMeta>
<!-- // Update de la META -->
<div class= UpdateMeta>
<form action="admin.php" method="post">
      <h1>Update de la META</h1>
      <input type="number" name="id" required placeholder="ID..">
      <input type="text" name="NewMeta" required placeholder="META.">
      <input type="submit" name="updateMeta" value="Go!">
    </form>

<?php


if(isset($_POST['updateMeta'])) {
    $NewMeta = $_POST['NewMeta'];
    $id = $_POST['id'];
 
    try{
     $pdo = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
     $requete = "UPDATE `meta` SET
     `NewMeta` = :NewMeta
     WHERE `id` = :id"; 
     $prepare = $pdo->prepare($requete);
     $prepare->execute(array(
         ":NewMeta" => $NewMeta,
         ":id" => $id
     ));
     $res = $prepare->rowCount();
 
     if($res == 1){
        echo "<p> Mis à jour! </p>";
     }
 
 }
 catch (PDOException $e){
     exit("❌🙀❌ OOPS :\n" . $e->getMessage());
 }
 }
?>
</div>



<!-- // Update du background-->
<div class= UpdateBackground>
<form action="admin.php" method="post">
      <h1>Update du background</h1>
      <input type="number" name="id" required placeholder="ID..">
      <input colortext="text" name="background" required placeholder="Code couleur.">
      <input type="submit" name="updateBackground" value="Go!">
    </form>

<?php


if(isset($_POST['updateBackground'])) {
    $background = $_POST['background'];
    $id = $_POST['id'];
 
    try{
     $pdo = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
     $requete = "UPDATE `backgroundColor` SET
     `background` = :background
     WHERE `id` = :id"; 
     $prepare = $pdo->prepare($requete);
     $prepare->execute(array(
         ":background" => $background,
         ":id" => $id
     ));
     $res = $prepare->rowCount();
 
     if($res == 1){
        echo "<p> Mis à jour! </p>";
     }
 
 }
 catch (PDOException $e){
     exit("❌🙀❌ OOPS :\n" . $e->getMessage());
 }
 }
?>
</div>

<!-- // Update de la couleur-->
<div class= UpdateCouleur>
<form action="admin.php" method="post">
      <h1>Update de la couleur</h1>
      <input type="number" name="id" required placeholder="ID..">
      <input colortext="text" name="couleur" required placeholder="Code couleur.">
      <input type="submit" name="updateCouleur" value="Go!">
    </form>

<?php


if(isset($_POST['updateCouleur'])) {
    $couleur = $_POST['couleur'];
    $id = $_POST['id'];
 
    try{
     $pdo = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
     $requete = "UPDATE `backgroundColor` SET
     `couleur` = :couleur
     WHERE `id` = :id"; 
     $prepare = $pdo->prepare($requete);
     $prepare->execute(array(
         ":couleur" => $couleur,
         ":id" => $id
     ));
     $res = $prepare->rowCount();
 
     if($res == 1){
        echo "<p> Mis à jour! </p>";
     }
 
 }
 catch (PDOException $e){
     exit("❌🙀❌ OOPS :\n" . $e->getMessage());
 }
 }
?>
</div>
<form action="index.php" method="post">
      <input type="submit" name="GO" value="Go!">
</form>
   
</body>
</html>