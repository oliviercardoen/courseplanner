<?php use App\App; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo 'Course Planner'; ?></title>

	<!-- Styles -->
	<link href="<?php echo App::asset( 'css/vendor/bootstrap.min.css' ); ?>" rel="stylesheet">
	<link href="<?php echo App::asset( 'css/main.css' ); ?>" rel="stylesheet">

	<!-- IE Scripts -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo App::url( 'home' ); ?>">Course Planner</a>
			</div>
			<?php if ( App::user()->isAuthenticated() ): ?>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo App::url( 'home' ); ?>">Accueil</a></li>
						<li><a href="<?php echo App::url( 'courses' ); ?>">Mes Cours</a></li>
						<li><a href="<?php echo App::url( 'curriculums' ); ?>">Mes Formations</a></li>
						<li><a href="<?php echo App::url( 'schools' ); ?>">Mes &Eacute;coles</a></li>
						<li><a href="<?php echo App::url( 'students' ); ?>">Mes &Eacute;tudiants</a></li>
					</ul><!-- .nav -->
					<ul class="nav navbar-nav pull-right hidden-xs">
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> <?php echo App::user()->fullname(); ?> <b class="caret"></b></a>
							<ul class="dropdown-menu pull-right">
								<li><a href="<?php  printf( '%1$s/%2$s', App::url( 'profile' ), App::user()->id ); ?>"><i class="glyphicon glyphicon-cog"></i> Mon profil</a></li>
								<li class="divider"></li>
								<li><a href="<?php echo App::url( 'logout' ); ?>"><i class="glyphicon glyphicon-off"></i> Se d&eacute;connecter</a></li>
							</ul>
						</li>
					</ul>
				</div><!--/.nav-collapse -->
			<?php endif; ?>
		</div><!-- .container -->
	</div><!-- .navbar -->

	<div class="site container">

		<div id="main" class="site-main">
			<?php echo ( isset( $content ) ) ? $content : 'Page content is empty.'; ?>
		</div>

	</div><!-- .container -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="<?php echo App::asset( 'js/bootstrap.min.js' ); ?>"></script>
</body>
</html>