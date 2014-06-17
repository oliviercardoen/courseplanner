<h1 class="page-header"><?php echo $title; ?></h1>
<form class="form-horizontal" role="form" action="<?php echo \App\App::url( 'locations' ) . '/save/'; ?>" method="POST">
	<div class="form-group">
		<label for="name" class="col-sm-2 control-label">Nom</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="name" name="name" value="<?php if ( isset( $entity->name ) ): echo htmlspecialchars( $entity->name ); endif; ?>" placeholder="...">
		</div>
		<div class="col-sm-6"></div>
	</div>
	<div class="form-group">
		<label for="name" class="col-sm-2 control-label">Rue</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="address_street" name="address_street" value="<?php if ( !empty( $address ) ): echo htmlspecialchars( $address->street ); endif; ?>" placeholder="Rue de la plomberie, 24...">
		</div>
		<div class="col-sm-6"></div>
	</div>
	<div class="form-group">
		<label for="name" class="col-sm-2 control-label">Ville</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="address_city" name="address_city" value="<?php if ( !empty( $address ) ): echo htmlspecialchars( $address->city ); endif; ?>" placeholder="Mons...">
		</div>
		<div class="col-sm-6"></div>
	</div>
	<div class="form-group">
		<label for="name" class="col-sm-2 control-label">Code postal</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="address_zipcode" name="address_zipcode" value="<?php if ( !empty( $address ) ): echo htmlspecialchars( $address->zipcode ); endif; ?>" placeholder="7000...">
		</div>
		<div class="col-sm-6"></div>
	</div>
	<div class="form-group">
		<label for="reference_document" class="col-sm-2 control-label">Pays</label>
		<div class="col-sm-4">
			<select class="form-control" id="address_country_id" name="address_country_id">
				<option>S&eacute;lectionnez</option>
				<?php if ( !empty( $countries ) ): ?>
					<?php foreach( $countries as $country ): ?>
						<option value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option>
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
				<input type="hidden" name="school_id" value="<?php echo $entity->school_id; ?>"/>
			<?php else: ?>
				<input type="hidden" name="id" value="0"/>
				<input type="hidden" name="school_id" value="<?php echo $school_id; ?>"/>
			<?php endif; ?>
			<button type="submit" class="btn btn-default">Enregistrer</button>
			<a class="ml-xsmall" href="<?php echo \App\App::url( 'schools' ); ?>">Annuler</a>
		</div>
	</div>
</form>
