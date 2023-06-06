<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST['password']) and $_POST['username'] !== '' and
        isset($_POST['password']) and $_POST['password'] !== ''
    ) {
        $name = strtoupper($_POST['username']);
        $mdp = strtoupper($_POST['password']);
        include_once 'connexion.php';

        try {
            $req = $con->prepare("SELECT * FROM identite WHERE username = ? AND mdp = ?");
            $req->execute(array($name, $mdp));

            if ($req->rowCount() > 0) {
                $rep = $req->fetch(PDO::FETCH_ASSOC);
                if ($rep['username'] == $name and $rep['mdp'] == $mdp) {

                    $_SESSION['utilisateur'] = $rep;
                    $_SESSION['etatconnexion'] = true;
                    header('Location: profile.php');
                }
            } else {
                $_SESSION['erromsg'] = 'Username ou mot de passe incorrect!!';
                header('Location: index.php');
            }
        } catch (PDOException $e) {
            die("Error" . $e->getMessage());
        }
    } else {
        $_SESSION['errorindex'] = 'Veuillez remplir tous les champs svp!';
        header('Location: index.php');
    }
} else {
    header('location: index.php');
}
