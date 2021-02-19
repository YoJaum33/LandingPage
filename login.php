
    <?php
    require('connectdb.php');
    session_start();
// SESSION VERIF
    if (isset($_POST['login'])){

        $login = htmlentities($_REQUEST['login'],ENT_QUOTES);
        $_SESSION['login'] = $login;
        $password = htmlentities($_REQUEST['password'],ENT_QUOTES);

        try{
            $pdo = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
            $requete = "SELECT * FROM `users` WHERE `login` = '$login' AND `password` ='".hash('sha1', $password)."'";
            $prepare = $pdo->prepare($requete);
            $prepare->execute();
            $res = $prepare->rowCount();
            if (($res) == 1) {
                $user = $prepare->fetchAll();
                $_SESSION["login"] = $user[0]['login'];
                $_SESSION["id"] = $user[0]['id'];
                // vérifier si l'utilisateur existe
                if ($_SESSION["login"] == 'yoann') {
                    header('location: admin.php');
                }

            }
            else{
                $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
            }
        }
        catch (PDOException $e){
            exit("❌🙀❌ OOPS :\n" . $e->getMessage());
        }
    }
    ?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
    </head>
    <body>

    <form action="" method="post">
  Login : <input type="text" name="login"/><br/>
  Mot de passe : <input type="password" name="password"/><br/>
  <input type="submit" value="se connecter"/>
</form>


    </body>
    </html>