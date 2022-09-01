<?php

require_once('src/controllers/homepage.php');
require_once('src/controllers/post.php');
require_once('src/controllers/comment.php');

if (isset($_GET['action']) && $_GET['action'] !== '') {
    //If we want to see and/or post a comment
    if ($_GET['action'] === 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {

            $identifier = $_GET['id'];

            post($identifier);

        } else {
            echo 'Erreur : aucun identifiant de billet envoyé';

            die;
        }
        //Si on post un commentaire
    } elseif ($_GET['action'] === 'addComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $identifier = $_GET['id'];

            addComment($identifier, $_POST);
        } else {
            echo 'Erreur : aucun identifiant de billet envoyé';

            die;
        }
    }
    else {
        echo "Erreur 404 : la page que vous recherchez n'existe pas.";
    }
} else {
    homepage();
}