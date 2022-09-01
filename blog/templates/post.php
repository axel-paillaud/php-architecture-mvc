<?php $title = "Le blog de l'AVBN"; ?>

<?php ob_start(); ?>
<h1>Le super blog de l'AVBN !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['french_comment_date'] ?></em>
    </h3>

    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
</div>

<h2>Commentaires</h2>

<form action="index.php?send" method="post">
    <label>Votre commentaire</label>
    <br/>
    <textarea autocomplete="off" name="comment" placeholder="Veuillez svp rester respectueux envers les autres"></textarea>
    <br/><br/>
    <label>Auteur</label>
    <br/>
    <input type="text" autocomplete="off" name="author" placeholder="Nom et prénom">
    <br/><br/>
    <button type="submit">Envoyer</button>
</form>

<?php foreach ($comments as $comment) : ?>
<p>
    <strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['french_comment_date'] ?>
</p>
<p>
    <?= nl2br(htmlspecialchars($comment['comment'])) ?>
</p>
<?php endforeach; ?>

<?php $content = ob_get_clean(); ?>
<?php require('layout.php'); ?>