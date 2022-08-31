<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le blog de l'AVBN: xxx</title>
    <link href="style.css" rel="stylesheet" />
</head>
<body>
    <h1>Le super blog de l'AVBN !</h1>
    <p><a href="index.php">Retour à la liste des billets</a></p>

    <div class="news">
        <h3>
            <?= htmlspecialchars($post['title']) ?>
            <em>le <?= $post['french_creation_date'] ?></em>
        </h3>

        <p>
            <?= nl2br(htmlspecialchars($post['content'])) ?>
        </p>
    </div>

    <h2>Commentaires</h2>

    <?php foreach ($comments as $comment) : ?>
    <p>
        <strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['french_creation_date'] ?>
    </p>
    <p>
        <?= nl2br(htmlspecialchars($comment['comment'])) ?>
    </p>
    <?php endforeach; ?>
</body>
</html>