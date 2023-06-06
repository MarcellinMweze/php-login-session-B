<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST['nom']) and $_POST['nom'] != '' and
        isset($_POST['email']) and $_POST['email'] != '' and
        isset($_POST['username']) and $_POST['username'] != '' and
        isset($_POST['password']) and $_POST['password'] != ''

    ) {

        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        include_once "connexion.php";

        $req = ("INSERT INTO identite VALUES(NULL,'$nom','$email','$username','$password')");
        $req = $con->query($req);
        $rep = $req->fetchAll();
        if ($req) {

            $_SESSION['envoireussi'] = 'Votre compte a été créé, connectez-vous maintenant!';
            header('Location: index.php');
        }
    } else {
        $_SESSION['compterror'] = "Veuillez compléter tous les champs SVP!";
        header('Location: compte.php');
    }
} else {
    header('Location: index.php');
}
