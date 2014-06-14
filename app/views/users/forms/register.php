<h1 class="page-header"><?php echo $title; ?></h1>
<form class="form-horizontal" role="form" action="<?php echo \App\App::url( 'register' ) . '/save/'; ?>" method="POST">

	<div class="form-group">
		<label for="name" class="col-sm-2 control-label">Prénom</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="first_name" name="first_name" value="<?php if ( isset( $entity->first_name ) ): echo htmlspecialchars( $entity->first_name ); endif; ?>" placeholder="Jean-Philippe...">
		</div>
		<div class="col-sm-6"></div>
	</div>

	<div class="form-group">
		<label for="name" class="col-sm-2 control-label">Nom</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="last_name" name="last_name" value="<?php if ( isset( $entity->last_name ) ): echo htmlspecialchars( $entity->last_name ); endif; ?>" placeholder="Dupont...">
		</div>
		<div class="col-sm-6"></div>
	</div>

	<div class="form-group">
		<label for="name" class="col-sm-2 control-label">E-mail</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="email" name="email" value="<?php if ( isset( $entity->email ) ): echo htmlspecialchars( $entity->email ); endif; ?>" placeholder="mon@email.com...">
		</div>
		<div class="col-sm-6"></div>
	</div>

	<div class="form-group">
		<label for="name" class="col-sm-2 control-label">Mot de passe</label>
		<div class="col-sm-4">
			<input type="password" class="form-control" id="password" name="password" value="" placeholder="...">
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
			<button type="submit" class="btn btn-default">S'inscrire</button>
			<a class="ml-xsmall" href="<?php echo \App\App::url( 'home' ); ?>">Annuler</a>
		</div>
	</div>
</form>
