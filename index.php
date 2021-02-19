<?php
include "connectdb.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php
// READ
 try {
      $pdo = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
      $requete = "SELECT * FROM `meta`";
      $prepare = $pdo->prepare($requete);
      $prepare->execute();
      $res = $prepare->rowCount();
      $resultat = $prepare -> fetchAll();
     echo (' ' . htmlentities($resultat[0]['NewMeta'], ENT_QUOTES) . '');
   
  
  } catch (PDOException $e) {
      exit("❌🙀❌ OOPS :\n" . $e->getMessage());
  } 


?>">
   

    <link rel="stylesheet" href="style.css">
    <title>
<?php
// READ
 try {
      $pdo = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
      $requete = "SELECT * FROM `titre`";
      $prepare = $pdo->prepare($requete);
      $prepare->execute();
      $res = $prepare->rowCount();
      $resultat = $prepare -> fetchAll();
     echo (' ' . htmlentities($resultat[0]['title'], ENT_QUOTES) . '');
   
  
  } catch (PDOException $e) {
      exit("❌🙀❌ OOPS :\n" . $e->getMessage());
  } 


?>
</title>



</head>
<body> 



<div class="prez">
<?php
// READ
 try {
      $pdo = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
      $requete = "SELECT * FROM `presentation`";
      $prepare = $pdo->prepare($requete);
      $prepare->execute();
      $res = $prepare->rowCount();
      $resultat = $prepare -> fetchAll();
     echo (' ' . htmlentities($resultat[0]['prez'], ENT_QUOTES) . '</p>');
   
  
  } catch (PDOException $e) {
      exit("❌🙀❌ OOPS :\n" . $e->getMessage());
  } 


?>
</div>

<div class="reseau">
<?php
// READ
try {
    $pdo = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
    $requete = "SELECT * FROM `lien`";
    $prepare = $pdo->prepare($requete);
    $prepare->execute();
    $res = $prepare->rowCount();
    $resultat = $prepare -> fetchAll();
   echo ('<p> Retrouvez moi sur ' . htmlentities($resultat[0]['lienDuReseau'], ENT_QUOTES) . '<br/>
           Mais aussi sur ' . htmlentities($resultat[1]['lienDuReseau'], ENT_QUOTES) . '<br/>
           Et sur ' . htmlentities($resultat[2]['lienDuReseau'], ENT_QUOTES) . '</p>');

 

} catch (PDOException $e) {
    exit("❌🙀❌ OOPS :\n" . $e->getMessage());
} 

?>

</div>

<form action="login.php" method="post">
      <input type="submit" name="GO" value="Go!">


<?php

// le background color
try {
    $pdo = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
    $requete = "SELECT * FROM `backgroundColor`";
    $prepare = $pdo->prepare($requete);
    $prepare->execute();
    $res = $prepare->rowCount();
    $resultat = $prepare -> fetchAll();
   echo (' <style> body{background-color:' . htmlentities($resultat[0]['background'], ENT_QUOTES) . '}</style>');
   echo (' <style> body{color:' . htmlentities($resultat[1]['couleur'], ENT_QUOTES) . '}</style>');
 


} catch (PDOException $e) {
    exit("❌🙀❌ OOPS :\n" . $e->getMessage());
} 


?>




</body>
</html>