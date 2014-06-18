<?php include dirname(__FILE__) . '/../alert.php'; ?>

<?php echo $content; ?>

<?php if ( !empty( $entity ) ): ?>
	<div class="row">
		<div class="col-sm-12">
			<h1 class="page-header"><?php echo $title; ?></h1>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2 font-bold text-right">Pr&eacute;nom</div>
		<div class="col-sm-10 mb-medium"><?php echo $entity->firstname; ?></div>
	</div>
	<div class="row">
		<div class="col-sm-2 font-bold text-right">Nom</div>
		<div class="col-sm-10 mb-medium"><?php echo $entity->lastname; ?></div>
	</div>
	<div class="row">
		<div class="col-sm-2 font-bold text-right">E-mail</div>
		<div class="col-sm-10 mb-medium"><?php echo $entity->email; ?></div>
	</div>
	<div class="row">
		<div class="col-sm-2 font-bold text-right">Mot de passe</div>
		<div class="col-sm-10 mb-medium"><?php echo $entity->password; ?></div>
	</div>
<?php endif; ?>