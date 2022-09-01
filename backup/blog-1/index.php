<?php

require_once('src/controllers/homepage.php');
require_once('src/controllers/post.php');
require_once('src/controllers/comment.php');

if (isset($_GET['action']) && $_GET['action'] !== '') {
    //If we want to see and/or post a comment
    if ($_GET['action'] === 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {

            $identifier = $_GET['id'];

            //if we post a comment
            if (isset($_POST['author']) && isset($_POST['comment'])) {
                if (!empty($_POST['comment']) && !empty($_POST['author'])) {

                    $author = htmlspecialchars($_POST['author']);
                    $comment = htmlspecialchars($_POST['comment']);

                    addComment($author, $comment, $identifier);

                } else {
                    echo 'Erreur : Un des deux champs est vide';

                    die;
                }
            }

            post($identifier);
        } else {
            echo 'Erreur : aucun identifiant de billet envoyé';

            die;
        }
        //If we post a comment
    } else {
        echo "Erreur 404 : la page que vous recherchez n'existe pas.";
    }
} else {
    homepage();
}