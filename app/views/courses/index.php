<?php include dirname(__FILE__) . '/../alert.php'; ?>

<div class="row">
	<div class="col-sm-10">
		<h1 class="page-header"><?php echo $title; ?></h1>
	</div>
	<div class="col-sm-2">
		<a class="pull-right btn btn-default" href="<?php echo \App\App::url( 'courses' ) . '/new/'; ?>"><i class="glyphicon glyphicon-plus mr-xxsmall"></i>Ajouter</a>
	</div>
</div>
<?php if ( !empty( $courses ) ): ?>
	<table class="table">
		<tr>
			<th>Code</th>
			<th>Nom du cours</th>
			<th>Début</th>
			<th>Fin</th>
			<th>Annexes</th>
			<th></th>
		</tr>
		<?php foreach( $courses as $course ): ?>
			<tr>
				<td><?php echo $course->code; ?></td>
				<td><a href="<?php echo \App\App::url( 'courses' ) . '/show/' . $course->id; ?>"><?php echo $course->name; ?></a></td>
				<td><?php echo $course->start_date; ?></td>
				<td><?php echo $course->end_date; ?></td>
				<td><a href="<?php echo $course->reference_document; ?>" target="_blank">Dossier pédagogique<i class="glyphicon glyphicon-share-alt ml-xxsmall"></i></a></td>
				<td class="text-right">
					<a class="btn btn-default btn-sm ml-xxsmall" href="<?php echo \App\App::url( 'courses' ) . '/edit/' . $course->id; ?>"><i class="glyphicon glyphicon-pencil"></i></a>
					<form class="inline-block" action="<?php echo \App\App::url( 'courses' ) . '/delete/'; ?>" method="POST">
						<input type="hidden" name="id" value="<?php echo $course->id; ?>" />
						<button class="btn btn-danger btn-sm ml-xxsmall" type="submit"><i class="glyphicon glyphicon-trash"></i></button>
					</form>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
<?php endif; ?>