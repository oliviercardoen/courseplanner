<?php include dirname(__FILE__) . '/../../alert.php'; ?>

<?php echo $content; ?>

<?php if ( !empty( $entity ) ): ?>
	<div class="row">
		<div class="col-sm-8">
			<h1 class="page-header"><?php echo $title; ?></h1>
		</div>
		<div class="col-sm-4">
			<form class="inline-block pull-right ml-small" action="<?php echo \App\App::url( 'locations' ) . '/delete/'; ?>" method="POST">
				<input type="hidden" name="id" value="<?php echo $entity->id; ?>" />
				<button class="btn btn-danger" type="submit"><i class="glyphicon glyphicon-trash mr-xxsmall"></i><span class="hidden-xs">Supprimer</span></button>
			</form>
			<a class="pull-right btn btn-default" href="<?php printf( '%1$s/edit/%2$s', \App\App::url( 'locations' ), $entity->id ); ?>"><i class="glyphicon glyphicon-pencil mr-xxsmall"></i>Modifier</a>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-2 font-bold text-right">Nom</div>
		<div class="col-sm-10 mb-medium"><?php echo $entity->name; ?></div>
	</div>
	<?php if ( !empty( $address ) ): ?>
		<div class="row">
			<div class="col-sm-2 font-bold text-right">Rue</div>
			<div class="col-sm-10 mb-medium"><?php echo $address->street; ?></div>
		</div>
		<div class="row">
			<div class="col-sm-2 font-bold text-right">Ville</div>
			<div class="col-sm-10 mb-medium"><?php echo $address->city; ?></div>
		</div>
		<div class="row">
			<div class="col-sm-2 font-bold text-right">Code postal</div>
			<div class="col-sm-10 mb-medium"><?php echo $address->zipcode; ?></div>
		</div>
	<?php endif; ?>
	<?php if ( !empty( $country ) ): ?>
		<div class="row">
			<div class="col-sm-2 font-bold text-right">Pays</div>
			<div class="col-sm-10 mb-medium"><?php echo $country->name; ?></div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<a class="btn btn-default" href="<?php echo \App\App::url( 'schools' ); ?>"><i class="glyphicon glyphicon-arrow-left mr-xxsmall"></i>Toutes mes &eacute;coles</a>