<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/css/style.css">
    <title>Star wars chat</title>
</head>
<body>
<section class="header">
<div class="nav">
<?php if (isset($_SESSION['currentUser'])) : ?>
<a href="<?= route('signout') ?>" class="signout">Déconnectez vous</a>
<?php else : ?>
<a href="<?= route('signin') ?>" class="signin">Connectez vous</a>
<a href="<?= route('signup') ?>" class="signup">Inscrivez vous</a>
<?php endif; ?>

</div>
</section>