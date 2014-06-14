<?php
namespace App;

use CoursePlanner\AuthenticationModule\AuthenticationModule;
use CoursePlanner\AuthenticationModule\Model\User\User;
use CoursePlanner\BaseModule\BaseModule;
use CoursePlanner\BaseModule\Controller\CourseController;
use CoursePlanner\BaseModule\Controller\CurriculumController;
use CoursePlanner\AuthenticationModule\Controller\UserController;
use Octopix\Selene\Application\Application;
use Octopix\Selene\Mvc\View\View;

/**
 * Class App
 * @package App
 */
class App extends Application {

	private static $user;

	public static function user( User $user = null )
	{
		if ( !empty( $user ) ) {
			self::$user = $user;
		}
		return self::$user;
	}

	public static function hasUser()
	{
		return ( isset( self::$user ) );
	}

	public static function url( $slug = 'home' )
	{
		global $config;
		if ( isset( $config ) && is_array( $config ) && array_key_exists( 'menu', $config ) ) {
			if ( array_key_exists( $slug, $config['menu'] ) ) {
				return $config['menu'][$slug];
			}
			return $config['menu']['home'];
		}
		return '/';
	}

	public static function asset( $file )
	{
		global $config;
		return sprintf( '%1$s/assets/%2$s', $config['menu']['home'], $file );
	}

	/**
	 *
	 */
	public function registerModules()
	{
		$this->modules['auth'] = new AuthenticationModule( $this );
		$this->modules['base'] = new BaseModule( $this );
	}

	/**
	 *
	 */
	public function registerRoutes()
	{
		$controllers = array();
		$controllers['course']     = new CourseController( $this );
		$controllers['curriculum'] = new CurriculumController( $this );
		$controllers['user']       = new UserController( $this );

		/* Home route */
		$this->router->get( '/', function() {
			$user = self::$user;
			if( empty( $user ) ) {
				exit( View::make( 'layout', array(
					'content' => View::make( 'users/forms/login', array(
							'title' => 'Veuillez vous connecter'
						) )
				) ) );
			}
			exit( View::make( 'layout' , array(
				'title'   => sprintf( 'Bienvenue, %s!', $user->first_name ),
				'content' => '<p class="lead">Vous allez découvrir Course Planner. Le premier logiciel web de gestion de votre agenda de cours.</p>'
			) ) );
		});

		/* Registration and login routes */
		$this->router->post( '/authenticate/',  array( $controllers['user'], 'authenticateAction' ) );

		$this->router->get( '/register/',       array( $controllers['user'], 'indexAction' ) );
		$this->router->post( '/register/save/', array( $controllers['user'], 'saveAction' ) );

		/* User profile routes */
		$this->router->get( '/profile/:id/',       array( $controllers['user'], 'showAction' ) );
		$this->router->get( '/profile/edit/:id/',  array( $controllers['user'], 'editAction' ) );
		$this->router->post( '/profile/save/',     array( $controllers['user'], 'saveAction' ) );
		$this->router->post( '/profile/delete/',   array( $controllers['user'], 'deleteAction' ) );

		/* Course routes */
		$this->router->get( '/courses/',           array( $controllers['course'], 'indexAction' ) );
		$this->router->get( '/courses/new/',       array( $controllers['course'], 'newAction' ) );
		$this->router->get( '/courses/show/:id/',  array( $controllers['course'], 'showAction' ) );
		$this->router->get( '/courses/edit/:id/',  array( $controllers['course'], 'editAction' ) );
		$this->router->post( '/courses/save/',     array( $controllers['course'], 'saveAction' ) );
		$this->router->post( '/courses/delete/',   array( $controllers['course'], 'deleteAction' ) );

		/* Curriculum routes */
		$this->router->get( '/curriculums/',          array( $controllers['curriculum'], 'indexAction' ) );
		$this->router->get( '/curriculums/new/',      array( $controllers['curriculum'], 'newAction' ) );
		$this->router->get( '/curriculums/show/:id/',  array( $controllers['curriculum'], 'showAction' ) );
		$this->router->get( '/curriculums/edit/:id/',  array( $controllers['curriculum'], 'editAction' ) );
		$this->router->post( '/curriculums/save/',    array( $controllers['curriculum'], 'saveAction' ) );
		$this->router->post( '/curriculums/delete/',  array( $controllers['curriculum'], 'deleteAction' ) );

		// Handle not found error from Slim on parse_request.
		$this->router->notFound( function() {
			exit( View::make( 'layout', array(
				'title' => 'Oups! Désolé ;-)',
				'content' => View::make( '404', array(
					'content' => 'Il semble que le contenu que vous cherchez ne soit pas/plus disponible.'
				) )
			) ) );
		});


	}


} 