<div class="row">
	<!-- Partie gallery -->
	<ul id="gallery-content">
<?php foreach($works as $data){ ?>
<li class="block-gallery">
	<div class="blue-circle large-circle">
		<img class="w-img" src="<?php echo $this->webroot; ?>app/webroot/uploads/<?php echo $data['Work']['img_path']; ?>" alt="image '+content[index].title+'"/>
		<input id="<?php echo $data['Work']['id']; ?>" class="c-button h-button" data-reveal-id="myModal" type="button" value="+" data-reveal-ajax="true" />
	</div>
	<h3 class="work-title"><?php echo $data['Work']['title']; ?></h3>
</li>
<?php } ?>
	</ul>
</div>
	<!-- Partie popup -->
	<div id="myModal" class="reveal-modal" data-reveal>
		<div class="row">
			<div id="title-pop"></div>
			<div class="large-4 columns">
				<h3>Description</h3>
				<div id="desc-pop"></div>
			</div>
			<div class="crop-reveal-img large-8 columns" id="img-pop"></div>
			<h3 class="large-12 columns">Langages</h3>
			<ul class="large-12 columns" id="lang-pop"></ul>
		</div>
		<a class="close-reveal-modal">&#215;</a>
	</div>