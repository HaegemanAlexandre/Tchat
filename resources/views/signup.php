<?= view('header') ?>

<h1>Inscription</h1>



<?php if(!empty($errors)): 
    foreach($errors as $error) : ?>
        <p><?= $error ?></p>
<?php endforeach; endif; ?>



<form method="post" action="<?= route('signup'); ?>">
<label for="login">Pseudo :</label>
<input type="text" name="login" id="login">
<label for="pass">Mot de passe :</label>
<input type="pass" name="pass" id="pass">
<label for="passconfirm">Confirmer le mot de passe :</label>
<input type="passconfirm" name="passconfirm" id="passconfirm">
<input type="submit" value="inscription">
</form>

<?= view('footer') ?>