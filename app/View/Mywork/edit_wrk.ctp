<div class="row">
  <div class="small-6 large-centered columns">
  <h5 class="form-title">Edition Projet</h5>
<?php if($this->Session->check('Message.flash')){ ?>
	<div data-alert class="alert-box success radius">
	  <?php echo $this->Session->flash();?>
	  <a href="#" class="close">&times;</a>
	</div>
<?php }?>
<form enctype="multipart/form-data" method="post">
		<div class="row">
			<div class="large-12 columns">
				<input type="text" placeholder="Nom projet" name="title" value="<?php echo $work['Work']['title']; ?>" autofocus/>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<input type="text" placeholder="Langages s&eacute;par&eacute; par un point virgule" value="<?php echo $work['Work']['langage']; ?>" name="langage"/>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<input type="text" placeholder="Entreprise" value="<?php echo $work['Work']['entreprise']; ?>" name="entreprise"/>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<input type="date" value="<?php echo $work['Work']['year']; ?>" name="year"/>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<input type="text" placeholder="Lien du projet" value="<?php echo $work['Work']['link']; ?>" name="link"/>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<textarea placeholder="Description" name="desc"><?php echo $work['Work']['desc']; ?></textarea>
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
				<button class="button expand [tiny small large]">Modifier</button>
			</div>
		</div>
</form>
</div>
</div>