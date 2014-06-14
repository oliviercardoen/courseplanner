<div class="row">
	<div class="col-sm-4"></div>
	<div class="col-sm-4">
		<form class="form-signin mb-large" role="form">
			<h2 class="form-signin-heading mb-large"><?php echo ( isset( $title ) ) ? $title : ''; ?></h2>
			<div class="mb-large">
				<input type="email" class="form-control" placeholder="mon@email.com..." required autofocus>
				<input type="password" class="form-control" placeholder="..." required>
			</div>
			<button class="btn btn-lg btn-default btn-block" type="submit">Se connecter</button>
		</form>
		<p>Pas encore de compte? Cliquez <a href="<?php echo \App\App::url( 'register' ); ?>">ici</a>.</p>
	</div>
	<div class="col-sm-4"></div>
</div>