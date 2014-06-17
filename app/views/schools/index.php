<?php include dirname(__FILE__) . '/../alert.php'; ?>

<div class="row">
	<div class="col-sm-10 col-xs-9">
		<h1 class="page-header"><?php echo $title; ?></h1>
	</div>
	<div class="col-sm-2 col-xs-3">
		<a class="pull-right btn btn-default" href="<?php echo \App\App::url( 'schools' ) . '/new/'; ?>"><i class="glyphicon glyphicon-plus mr-xxsmall"></i><span class="hidden-xs">Ajouter</span></a>
	</div>
</div>
<?php if ( !empty( $entities ) ): ?>
	<table class="table">
		<tr>
			<th>Nom de l'&eacute;cote</th>
			<th class="hidden-xs">Implantation(s)</th>
			<th class="hidden-xs"></th>
		</tr>
		<?php foreach( $entities as $entity ): ?>
			<tr>
				<td><a href="<?php echo \App\App::url( 'schools' ) . '/show/' . $entity->id; ?>"><?php echo $entity->name; ?></a></td>
				<td class="hidden-xs">
					<ul class="list-unstyled">
						<?php $locations = $entity->locations(); ?>
						<?php foreach( $locations as $location ): ?>
							<li><a href="<?php printf( '%1$s/show/%2$s', \App\App::url( 'locations' ), $location->id ); ?>"><?php echo $location->name; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</td>
				<td class="text-right hidden-xs">
					<a class="btn btn-default btn-sm ml-xxsmall" href="<?php echo \App\App::url( 'schools' ) . '/edit/' . $entity->id; ?>"><i class="glyphicon glyphicon-pencil"></i></a>
					<form class="inline-block" action="<?php echo \App\App::url( 'schools' ) . '/delete/'; ?>" method="POST">
						<input type="hidden" name="id" value="<?php echo $entity->id; ?>" />
						<button class="btn btn-danger btn-sm ml-xxsmall" type="submit"><i class="glyphicon glyphicon-trash"></i></button>
					</form>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
<?php endif; ?>