<!-- Filtre messages -->
<div class="small-6 large-11 large-offset-1 columns">
	<dl class="sub-nav">
		<dt>Filtre:</dt>
		<dd class="active"><a href="#">Tout</a></dd>
		<dd><a href="#">Infos</a></dd>
		<dd><a href="#">Autre</a></dd>
	</dl>
	<!-- Liste message -->
	<?php foreach($messages as $data){?>
	<div id="list-msg">
	<div class="panel msg-panel" id="msg<?php echo $data['Contact']['id']; ?>">
		<div class="panel-header">
			<h4 class="msg-title">Envoyé par <a href="#" data-dropdown="sender-drop<?php echo $data['Contact']['id']; ?>"><?php echo $data['Contact']['name']; ?></a> le <?php echo $data['Contact']['date']; ?> <a href="<?php echo $this->webroot; ?>admin/messages/delMSG/<?php echo $data['Contact']['id']; ?>">Supprimer message</a></h4>
		</div>
		<div class="panel-content">
			<h4>Objet <kbd>Autre</kbd></h4>
			<p><?php echo $data['Contact']['message']; ?></p>
		</div>
	</div>
	</div>
	<!-- Infos user -->
	<ul id="sender-drop<?php echo $data['Contact']['id']; ?>" class="f-dropdown" data-dropdown-content>
		<li><a href="mailto:<?php echo $data['Contact']['email']; ?>"><?php echo $data['Contact']['email']; ?></a></li>
	</ul>
<?php } ?>
</div>