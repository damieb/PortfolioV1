<div class="row">
  <div class="small-6 large-centered columns">
  <h5 class="form-title">Contacter</h5>
		<?php if($this->Session->check('Message.flash')){?>
			<div data-alert class="alert-box success radius">
			  <?php echo $this->Session->flash();?>
			  <a href="#" class="close">&times;</a>
			</div>
		<?php }?>
	<form method="post" id="contact">
		<div class="row">
			<div class="large-12 columns" id="nameGroup">
				<label>Nom</label>
				<input type="text" name="name" id="name-contact" placeholder="Votre nom" autofocus/>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns" id="emailGroup">
				<label>Adresse E-mail</label>
				<input type="email" name="email" id="email" placeholder="Votre adresse e-mail" />
			</div>
		</div>
		  <div class="row">
		    <div class="large-12 columns">
		      <label>Objet</label>
		      <select>
		        <option value="info">Demande d'information</option>
		        <option value="other">Autre</option>
		      </select>
		    </div>
		  </div>
		<div class="row">
			<div class="large-12 columns" id="messageGroup">
				<label>Message</label>
				<textarea placeholder="Votre message" name="message" id="msg"></textarea>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
			<label>S&eacute;curit&eacute;</label>
				<ul class="large-block-9" id="captchaGroup"></ul>
			</div>
		</div>
		<div class="row">
			<div class="large-12 columns">
				<button class="button expand [radius round]">Envoyer</button>
			</div>
		</div>
	</form>
  </div>
</div>