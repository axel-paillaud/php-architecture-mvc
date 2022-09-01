<?php

function addComment(string $author, string $comment, int $id) {
    $database = dbConnect();
    $statement = $database->prepare(
        "INSERT INTO comments VALUES 
        (NULL, :id, :author, :comment, CURRENT_TIMESTAMP)"
    );

    $statement->execute([
        'id' => $id,
        'author' => $author,
        'comment' => $comment,
    ]);
}

