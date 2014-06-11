<?php include dirname(__FILE__) . '/../alert.php'; ?>

<?php echo $content; ?>

<?php if ( !empty( $entity ) ): ?>
	<div class="row">
		<div class="col-sm-10">
			<h1 class="page-header"><?php echo $title; ?></h1>
		</div>
		<div class="col-sm-2">
			<a class="pull-right btn btn-default" href="<?php echo \App\App::url( 'curriculums' ) . '/edit/' . $entity->getId(); ?>"><i class="glyphicon glyphicon-pencil mr-xxsmall"></i>Modifier</a>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2 font-bold text-right">Nom</div>
		<div class="col-sm-10 mb-medium"><?php echo $entity->name; ?></div>
	</div>
	<div class="row">
		<div class="col-sm-2 font-bold text-right">Période</div>
		<div class="col-sm-10 mb-medium"><?php echo $entity->timeslot()->name; ?></div>
	</div>
<?php endif; ?>

<a class="btn btn-default" href="<?php echo \App\App::url( 'curriculums' ); ?>"><i class="glyphicon glyphicon-arrow-left mr-xxsmall"></i>Toutes mes formations</a>