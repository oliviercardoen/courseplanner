<h1 class="page-header"><?php echo $title; ?></h1>
<form class="form-horizontal" role="form" action="<?php echo \App\App::url( 'curriculums' ) . '/save/'; ?>" method="POST">
	<div class="form-group">
		<label for="name" class="col-sm-2 control-label">Nom</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="name" name="name" value="<?php if ( isset( $entity->name ) ): echo htmlspecialchars( $entity->name ); endif; ?>" placeholder="...">
		</div>
		<div class="col-sm-6"></div>
	</div>
	<div class="form-group">
		<label for="reference_document" class="col-sm-2 control-label">Période</label>
		<div class="col-sm-4">
			<select class="form-control" id="timeslot_id" name="timeslot_id">
				<option>S&eacute;lectionnez</option>
				<?php if ( !empty( $timeslots ) ): ?>
					<?php foreach( $timeslots as $timeslot ): ?>
						<option value="<?php echo $timeslot->id; ?>"><?php echo $timeslot->name; ?></option>
					<?php endforeach; ?>
				<?php endif; ?>
			</select>
		</div>
		<div class="col-sm-6"></div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-md-10">
			<?php if ( isset( $entity ) ): ?>
				<input type="hidden" name="id" value="<?php echo $entity->id; ?>"/>
			<?php else: ?>
				<input type="hidden" name="id" value="0"/>
			<?php endif; ?>
			<button type="submit" class="btn btn-default">Enregistrer</button>
			<a class="ml-xsmall" href="<?php echo \App\App::url( 'curriculums' ); ?>">Annuler</a>
		</div>
	</div>
</form>
