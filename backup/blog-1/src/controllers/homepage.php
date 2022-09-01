<?php

require_once('src/model/model.php');

function homepage() {
    $posts = getPosts();

    require('templates/homepage.php');
}