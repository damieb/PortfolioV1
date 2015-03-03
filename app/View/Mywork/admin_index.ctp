<div class="row">
	<div class="small-3 large-3 columns">
		<h5 class="form-title">Ajout projet</h5>
		<?php if($this->Session->check('Message.flash')){ ?>
			<div data-alert class="alert-box success radius">
			  <?php echo $this->Session->flash();?>
			  <a href="#" class="close">&times;</a>
			</div>
		<?php }?>
		<form enctype="multipart/form-data" method="post">
		<div class="row">
			<div class="large-12 columns">
				<input type="text" placeholder="Nom projet" name="title" autofocus/>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<input type="text" placeholder="Langages s&eacute;par&eacute; par un point virgule" name="langage"/>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<input type="text" placeholder="Entreprise" name="entreprise"/>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<input type="date" name="year"/>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<input type="text" placeholder="Lien du projet" name="link"/>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<textarea placeholder="Description" name="desc"></textarea>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<label>Image projet</label>
				<input type="file" name="image">
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
		<h5 class="form-title">Projets</h5>
		<div id="socials-links">
		</div>
	</div>
</div>
<script>
	refreshWork();
</script>