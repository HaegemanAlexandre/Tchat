<?= view('header') ?>
<h1>Connexion</h1>

<?php if (isset($_SESSION['success'])) : ?>
    <p><?= $_SESSION['success'];?></p>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>
<form action="<?= route('signin'); ?>" method="POST">
<label for="login">Pseudo :</label>
<input type="text" name="login" id="login">
<label for="pass">Mot de passe :</label>
<input type="pass" name="pass" id="pass">
<input type="submit" value="connexion">
</form>

<?= view('footer') ?>