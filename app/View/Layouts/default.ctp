<?php
$cakeDescription = __d('cake_dev', 'Damien L');
?><!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
<title>
	<?php echo $cakeDescription ?>:
	<?php echo $title_for_layout; ?>
</title>
<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('foundation.min');
		echo $this->Html->css('theme');
		echo $this->Html->script('vendor/jquery');
		echo $this->Html->script('foundation/foundation');
		if ($this->params['controller'] == 'work'){
			echo $this->Html->script('scripts/fetchProjects.js');
			echo $this->Html->script('scripts/hover');
			echo $this->Html->script('foundation/foundation.reveal');
		}
		echo $this->Html->script('foundation/foundation.alert');
		if ($this->params['controller'] == 'contact'){
			echo $this->Html->script('scripts/validate');
		}
		if ($this->params['controller'] == 'about'){
			echo $this->Html->script('scripts/fetchAbout');
		}
		echo $this->Html->script('scripts/konami');
		echo $this->fetch('meta');
		echo $this->fetch('css');
?>
</head>
<body>
<nav class="top-bar" data-topbar>
<div class="small-6 large-11 large-offset-1 columns">
	<ul class="title-area">
		<li class="name"><h1><a href="<?php echo $this->webroot; ?>about"><img id="logo" src="<?php echo $this->webroot; ?>app/webroot/img/logo.png" alt="Damien L" /></a></h1></li>
	</ul>
	<section class="top-bar-section">
		<!-- About -->
		<?php if ($this->params['controller'] == 'about'){?>
		<ul class="left"><li id="about-link" class="active"><a href="<?php echo $this->webroot; ?>about">A propos</a></li></ul>
		<?php }else{ ?>
		<ul class="left"><li id="about-link"><a href="<?php echo $this->webroot; ?>about">A propos</a></li></ul>
		<!-- Work -->
		<?php }if ($this->params['controller'] == 'work'){ ?>
		<ul class="left"><li id="gallery-link" class="active"><a href="<?php echo $this->webroot; ?>work">Projets</a></li></ul>
		<?php }else{ ?>
		<ul class="left"><li id="gallery-link"><a href="<?php echo $this->webroot; ?>work">Projets</a></li></ul>
		<!-- Contact -->
		<?php }if ($this->params['controller'] == 'contact'){?>
		<ul class="left"><li id="contact-link" class="active"><a href="<?php echo $this->webroot; ?>contact">Contact</a></li></ul>
		<?php }else{ ?>
		<ul class="left"><li id="contact-link"><a href="<?php echo $this->webroot; ?>contact">Contact</a></li></ul>
		<?php } ?>
	</section>
</div>
</nav>
	<div id="content-layout">
	<?php echo $this->fetch('content'); ?> <!-- Correspond à la vue -->
	</div>
<script type="text/javascript">
    $(document).foundation();
</script>
</body>
</html>
