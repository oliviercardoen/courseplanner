<h1 class="page-header"><?php echo $title; ?></h1>
<form class="form-horizontal" role="form" action="<?php echo \App\App::url( 'courses' ) . '/save/'; ?>" method="POST">
	<div class="form-group">
		<label for="name" class="col-sm-2 control-label">Nom</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="name" name="name" value="<?php if ( isset( $course->name ) ): echo htmlspecialchars( $course->name ); endif; ?>" placeholder="...">
		</div>
		<div class="col-sm-6"></div>
	</div>
	<div class="form-group">
		<label for="code" class="col-sm-2 control-label">Code</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" id="code" name="code" value="<?php if ( isset( $course->code ) ): echo htmlspecialchars( $course->code ); endif; ?>" placeholder="UF XXX...">
		</div>
		<div class="col-md-8"></div>
	</div>
	<div class="form-group">
		<label for="start_date" class="col-sm-2 control-label">Date de début</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="start_date" name="start_date" value="<?php if ( isset( $course->start_date ) ): echo htmlspecialchars( $course->start_date ); endif; ?>" placeholder="AAAA-MM-JJ...">
		</div>
		<div class="col-md-6"></div>
	</div>
	<div class="form-group">
		<label for="end_date" class="col-sm-2 control-label">Date de fin</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="end_date" name="end_date" value="<?php if ( isset( $course->end_date ) ): echo htmlspecialchars( $course->end_date ); endif; ?>" placeholder="AAAA-MM-JJ...">
		</div>
		<div class="col-sm-6"></div>
	</div>
	<div class="form-group">
		<label for="reference_document" class="col-sm-2 control-label">Dossier pédagogique</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="reference_document" name="reference_document" value="<?php if ( isset( $course->reference_document ) ): echo htmlspecialchars( $course->reference_document ); endif; ?>" placeholder="http://www.mondossier.cfweb.be...">
		</div>
		<div class="col-sm-6"></div>
	</div>
	<?php if ( !empty ( $curriculums ) ): ?>
		<div class="form-group">
			<label for="curriculum_id" class="col-sm-2 control-label">Formations</label>
			<div class="col-sm-4 pt-xsmall">
				<?php foreach( $curriculums as $curriculum ): ?>
					<?php if ( isset( $course ) ): ?>
						<?php $checked = ( $course->isRelatedCurriculum( $curriculum->id ) ) ? ' checked="checked"' : ''; ?>
					<?php endif; ?>
					<p><input type="checkbox" name="curriculum_id[]" value="<?php echo $curriculum->id; ?>" <?php echo $checked; ?>> <?php echo $curriculum->name; ?></p>
				<?php endforeach; ?>
			</div>
			<div class="col-sm-6"></div>
		</div><!-- .checkbox -->
	<?php endif; ?>
	<div class="form-group">
		<div class="col-sm-offset-2 col-md-10">
			<?php if ( isset( $course ) ): ?>
				<input type="hidden" name="id" value="<?php echo $course->id; ?>"/>
			<?php else: ?>
				<input type="hidden" name="id" value="0"/>
			<?php endif; ?>
			<button type="submit" class="btn btn-default">Enregistrer</button>
			<a class="ml-xsmall" href="<?php echo \App\App::url( 'courses' ); ?>">Annuler</a>
		</div>
	</div>
</form>
