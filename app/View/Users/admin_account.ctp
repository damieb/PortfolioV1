<div class="row">
  <div class="small-6 large-centered columns">
  <h5 class="form-title">Edition Identifiants</h5>
<?php if($this->Session->check('Message.flash')){ ?>
	<div data-alert class="alert-box success radius">
	  <?php echo $this->Session->flash();?>
	  <a href="#" class="close">&times;</a>
	</div>
<?php } ?>
	<form method="post">
		<div class="row">
			<div class="large-12 columns">
				<label>Identifiant</label>
				<input type="text" placeholder="Votre identifiant" name="username" value="<?php echo $this->Session->read('Auth.User.username');?>" autofocus/>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<label>Mot de passe</label>
				<input type="password" name="password" placeholder="Votre mot de passe"/>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<button class="button expand [radius round]">Modifier</button>
			</div>
		</div>
	</form>
  </div>
</div>