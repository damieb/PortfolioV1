<?php
$cakeDescription = __d('cake_dev', 'Damien L-ADMIN');
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
		echo $this->Html->css('admin');
		echo $this->Html->script('vendor/jquery');
		echo $this->Html->script('foundation/foundation');
		echo $this->Html->script('foundation/foundation.alert');
		echo $this->Html->script('foundation/foundation.dropdown');
		if ($this->params['action'] == 'admin_socials'){
			echo $this->Html->script('scripts/fetchAdmin');
		}
		if ($this->params['controller'] == 'mywork'){
			echo $this->Html->script('scripts/fetchWork');
		}
		if ($this->params['action'] == 'admin_skills'){
			echo $this->Html->script('scripts/fetchSkill');
		}
		echo $this->fetch('meta');
		echo $this->fetch('css');
?>
</head>
<body>
<?php if($this->Session->check('Auth.User.id')){?>
<nav class="top-bar" data-topbar>
<div class="small-6 large-11 large-offset-1 columns">
	<ul class="title-area">
		<li class="name has-dropdown">
			<h1><a href="#" data-dropdown="drop1">Damien L</a></h1>
			<ul id="drop1" class="f-dropdown" data-dropdown-content>
				<li><a href="<?php echo $this->webroot; ?>about">Côté Client</a></li>
				<li><a href="<?php echo $this->webroot; ?>admin/users/logout">Déconnexion</a></li>
			</ul>
		</li>
	</ul>
	<!-- Dropdown Menu -->
	<ul id="drop2" class="f-dropdown" data-dropdown-content>
		<li><a href="<?php echo $this->webroot; ?>admin/users/account">Edition compte</a></li>
		<li><a href="<?php echo $this->webroot; ?>admin/users/bio">Information basique</a></li>
		<li><a href="<?php echo $this->webroot; ?>admin/users/socials">R&eacute;saux Sociaux</a></li>
		<li><a href="<?php echo $this->webroot; ?>admin/users/skills">Skills</a></li>
	</ul>
	<section class="top-bar-section">
		<!-- Infos -->
		<ul class="left">
			<li id="about-link">
				<a href="#" data-dropdown="drop2">Mes informations</a>
			</li>
		</ul>
		<!-- Messages -->
		<?php if ($this->params['controller'] == 'messages'){ ?>
		<ul class="left">
			<li id="gallery-link" class="active">
				<a href="<?php echo $this->webroot; ?>admin/messages">Messagerie <span class="radius secondary label" id="ind-MSG"></span></a>
			</li>
		</ul>
		<?php }else{ ?>
		<ul class="left">
			<li id="gallery-link">
				<a href="<?php echo $this->webroot; ?>admin/messages">Messagerie <span class="radius secondary label" id="ind-MSG"></span></a>
			</li>
		</ul>

		<!-- Work -->
		<?php }if ($this->params['controller'] == 'mywork'){?>
		<ul class="left">
			<li id="contact-link" class="active">
				<a href="<?php echo $this->webroot; ?>admin/mywork">Mon travail</a>
			</li>
		</ul>
		<?php }else{ ?>
		<ul class="left">
			<li id="contact-link">
				<a href="<?php echo $this->webroot; ?>admin/mywork">Mon travail</a>
			</li>
		</ul>
		<?php } ?>
	</section>
</div>
</nav>
<?php } ?>
	<div id="content-layout">
	<?php echo $this->fetch('content'); ?> <!-- Correspond à la vue -->
	</div>
<script type="text/javascript">
    function checkMSG() {
        $.ajax({
            url: '<?php echo $this->webroot; ?>admin/users/checkMSG',
            ifModified:true,
            success: function(content){
             document.getElementById("ind-MSG").innerHTML = content;
            }
        });
        setTimeout(checkMSG, 15000);
    }
    $(document).foundation();
    checkMSG();
</script>
</body>
</html>
