<div class="row">
  <div class="small-4 large-centered columns">
  <h5 class="form-title">Connexion administration</h5>
<?php if($this->Session->check('Message.flash')){ ?>
	<div data-alert class="alert-box warning radius">
	  <?php echo $this->Session->flash();?>
	  <a href="#" class="close">&times;</a>
	</div>
<?php } ?>
	<form method="post">
		<div class="row">
			<div class="large-12 columns">
				<label>Identifiant</label>
				<input type="text" name="data[User][username]" placeholder="Votre identifiant" autofocus/>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<label>Mot de passe</label>
				<input type="password" name="data[User][password]" placeholder="Votre mot de passe" />
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<button class="button expand [radius round]">Se connecter</button>
			</div>
		</div>
	</form>
  </div>
</div>