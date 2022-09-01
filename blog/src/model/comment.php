<?php

function getComments($identifier) : array {
    $database = commentDbConnect();
    $statement = $database->prepare(
        "SELECT comment_id, author, comment, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS 
        french_comment_date FROM comments WHERE post_id = ? ORDER BY comment_date DESC"
    );

    $statement->execute([$identifier]);

    $comments = [];
    while ($row = $statement->fetch()) {
        $comment = [
            'author' => $row['author'],
            'french_comment_date' => $row['french_comment_date'],
            'comment' => $row['comment'],
        ];
        $comments[] = $comment;
    }
    return $comments;
}

function createComment(string $id, string $author, string $comment) : bool {
    $database = commentDbConnect();
    $statement = $database->prepare(
        "INSERT INTO comments VALUES 
        (NULL, :id, :author, :comment, CURRENT_TIMESTAMP)"
    );

    $affectedLines = $statement->execute([
        'id' => $id,
        'author' => $author,
        'comment' => $comment,
    ]);

    return ($affectedLines > 0);
}

function commentDbConnect() {
    try {
        $database = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'shaun', 'cRadoc!54');
        return $database;
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}

