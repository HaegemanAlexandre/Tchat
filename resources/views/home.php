<?= view('header') ?>

<section class="chatbox">
    <h3>Chat</h3>
</section>
<section class="writebox">

<div class="wrappermessage">

</div>

<form class="writeform" method="POST" action="">
<div class="send">
<input type="text" name="writebox" id="writebox">
<input type="submit" value="Envoyer" id="sendbox">
</div>
</form>
</section>

 <?= view('footer') ?>
