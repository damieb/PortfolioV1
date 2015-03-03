<div class="row">
	<div class="small-3 large-3 columns">
		<h5 class="form-title">Ajout Langage</h5>
		<?php if($this->Session->check('Message.flash')){ ?>
			<div data-alert class="alert-box success radius">
			  <?php echo $this->Session->flash();?>
			  <a href="#" class="close">&times;</a>
			</div>
		<?php }?>
		<form enctype="multipart/form-data" method="post">
		<div class="row">
			<div class="large-12 columns">
				<input type="text" placeholder="Nom langage" name="langage" autofocus/>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<input type="text" placeholder="Cat&eacute;gorie" name="category" />
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<button class="button expand [tiny small large]">Ajouter</button>
			</div>
		</div>
		</form>
	</div>
	<div class="large-9 columns">
		<h5 class="form-title">Langages ajout&eacute;</h5>
		<div id="socials-links">
		</div>
	</div>
</div>