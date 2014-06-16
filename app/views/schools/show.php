<?php include dirname(__FILE__) . '/../alert.php'; ?>

<?php echo $content; ?>

<?php if ( !empty( $entity ) ): ?>
	<div class="row">
		<div class="col-sm-8">
			<h1 class="page-header"><?php echo $title; ?></h1>
		</div>
		<div class="col-sm-4">
			<a class="pull-right btn btn-default ml-small" href="<?php printf( '%1$s/%2$s/locations/new/', \App\App::url( 'schools' ), $entity->id ); ?>"><i class="glyphicon glyphicon-plus mr-xxsmall"></i>Implantation</a>
			<a class="pull-right btn btn-default" href="<?php echo \App\App::url( 'schools' ) . '/edit/' . $entity->id; ?>"><i class="glyphicon glyphicon-pencil mr-xxsmall"></i>Modifier</a>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2 font-bold text-right">Nom</div>
		<div class="col-sm-10 mb-medium"><?php echo $entity->name; ?></div>
	</div>
	<?php if ( !empty( $locations ) ): ?>
		<div class="row">
			<div class="col-sm-2 font-bold text-right">Implatation(s)</div>
			<div class="col-sm-10 mb-medium">
				<ul class="list-unstyled">
					<?php foreach( $locations as $location ): ?>
						<li><a href="<?php echo \App\App::url( 'locations' ) . '/show/' . $location->id; ?>"><?php echo $location->name; ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
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

<a class="btn btn-default" href="<?php echo \App\App::url( 'schools' ); ?>"><i class="glyphicon glyphicon-arrow-left mr-xxsmall"></i>Toutes mes &eacute;coles</a>