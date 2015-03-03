<div class="row">
  <div class="small-6 large-centered columns">
  <h5 class="form-title">Edition Informations basique</h5>
<?php if($this->Session->check('Message.flash')){ ?>
	<div data-alert class="alert-box success radius">
	  <?php echo $this->Session->flash();?>
	  <a href="#" class="close">&times;</a>
	</div>
<?php }?>
	<form enctype="multipart/form-data" method="post">
		<div class="row">
			<div class="large-12 columns">
				<label>Nom</label>
				<input type="text" placeholder="Votre nom" name="lastname" value="<?php echo $bio['Bio']['lastname'];?>" autofocus/>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<label>Pr&eacute;nom</label>
				<input type="text" placeholder="Votre Prénom" value="<?php echo $bio['Bio']['firstname'];?>" name="firstname" />
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<label>Date de Naissance</label>
				<input type="date" value="<?php echo $bio['Bio']['birth'];?>" name="birth"/>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<label>Ville</label>
				<input type="text" placeholder="Votre Ville" value="<?php echo $bio['Bio']['location'];?>" name="location" />
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<label>A propos</label>
				<textarea name="about"><?php echo $bio['Bio']['about'];?></textarea>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<label>CV</label>
				<input type="file" name="cv">
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<label>Photo de profil</label>
				<input type="file" name="photo">
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