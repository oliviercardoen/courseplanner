<?php include dirname(__FILE__) . '/../alert.php'; ?>

<?php echo $content; ?>

<?php if ( !empty( $entity ) ): ?>
	<div class="row">
		<div class="col-sm-8">
			<h1 class="page-header"><?php echo $title; ?></h1>
		</div>
		<div class="col-sm-4">
			<form class="inline-block pull-right ml-small" action="<?php echo \App\App::url( 'curriculums' ) . '/delete/'; ?>" method="POST">
				<input type="hidden" name="id" value="<?php echo $entity->id; ?>" />
				<button class="btn btn-danger" type="submit"><i class="glyphicon glyphicon-trash mr-xxsmall"></i><span class="hidden-xs">Supprimer</span></button>
			</form>
			<a class="pull-right btn btn-default" href="<?php echo \App\App::url( 'curriculums' ) . '/edit/' . $entity->id; ?>"><i class="glyphicon glyphicon-pencil mr-xxsmall"></i>Modifier</a>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2 font-bold text-right">Nom</div>
		<div class="col-sm-10 mb-medium"><?php echo $entity->name; ?></div>
	</div>
	<?php if ( !empty( $timeslot ) ): ?>
		<div class="row">
			<div class="col-sm-2 font-bold text-right">Période</div>
			<div class="col-sm-10 mb-medium"><?php echo $timeslot->name; ?></div>
		</div>
	<?php endif; ?>
	<?php if ( !empty( $courses ) ): ?>
		<div class="row">
			<div class="col-sm-2 font-bold text-right">Cours</div>
			<div class="col-sm-10 mb-medium">
				<ul class="list-unstyled">
					<?php foreach( $courses as $course ): ?>
						<li><a href="<?php echo \App\App::url( 'courses' ) . '/show/' . $course->id; ?>"><?php echo $course->name; ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<a class="btn btn-default" href="<?php echo \App\App::url( 'curriculums' ); ?>"><i class="glyphicon glyphicon-arrow-left mr-xxsmall"></i>Toutes mes formations</a>