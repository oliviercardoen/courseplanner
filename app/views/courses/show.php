<?php include dirname(__FILE__) . '/../alert.php'; ?>

<?php echo $content; ?>

<?php if ( !empty( $course ) ): ?>
	<div class="row">
		<div class="col-sm-8">
			<h1 class="page-header"><?php echo $title; ?></h1>
		</div>
		<div class="col-sm-4">
			<form class="inline-block pull-right ml-small" action="<?php echo \App\App::url( 'courses' ) . '/delete/'; ?>" method="POST">
				<input type="hidden" name="id" value="<?php echo $course->id; ?>" />
				<button class="btn btn-danger" type="submit"><i class="glyphicon glyphicon-trash mr-xxsmall"></i><span class="hidden-xs">Supprimer</span></button>
			</form>
			<a class="pull-right btn btn-default" href="<?php echo \App\App::url( 'courses' ) . '/edit/' . $course->id; ?>"><i class="glyphicon glyphicon-pencil mr-xxsmall"></i>Modifier</a>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2 font-bold text-right">Nom</div>
		<div class="col-sm-10 mb-medium"><?php echo $course->name; ?></div>
	</div>
	<div class="row">
		<div class="col-sm-2 font-bold text-right">Code</div>
		<div class="col-sm-10 mb-medium"><?php echo $course->code; ?></div>
	</div>
	<div class="row">
		<div class="col-sm-2 font-bold text-right">Date de début</div>
		<div class="col-sm-10 mb-medium"><?php echo $course->start_date; ?></div>
	</div>
	<div class="row">
		<div class="col-sm-2 font-bold text-right">Date de fin</div>
		<div class="col-sm-10 mb-medium"><?php echo $course->end_date; ?></div>
	</div>
	<div class="row">
		<div class="col-sm-2 font-bold text-right">Annexes</div>
		<div class="col-sm-10 mb-medium"><a href="<?php echo $course->reference_document; ?>">Dossier pédagogique</a></div>
	</div>
	<?php if ( !empty( $curriculums ) ): ?>
		<div class="row">
			<div class="col-sm-2 font-bold text-right">Formations</div>
			<div class="col-sm-10 mb-medium">
				<ul class="list-unstyled">
					<?php foreach( $curriculums as $curriculum ): ?>
						<li><a href="<?php echo \App\App::url( 'curriculums' ) . '/show/' . $curriculum->id; ?>"><?php echo $curriculum->name; ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<a class="btn btn-default" href="<?php echo \App\App::url( 'courses' ); ?>"><i class="glyphicon glyphicon-arrow-left mr-xxsmall"></i>Tous mes cours</a>