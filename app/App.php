<?php
namespace App;

use CoursePlanner\BaseModule\Controller\CourseController;
use CoursePlanner\BaseModule\Controller\CurriculumController;
use CoursePlanner\BaseModule\Model\Course;
use CoursePlanner\BaseModule\Model\Curriculum;
use Octopix\Selene\Application\Application;
use Octopix\Selene\Mvc\View\View;

/**
 * Class App
 * @package App
 */
class App extends Application {

	private $controllers;

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
		// TODO: Implement registerModules() method.
	}

	/**
	 *
	 */
	public function registerRoutes()
	{
		$this->controllers = array();
		$this->controllers['course'] = new CourseController( $this );
		$this->controllers['curriculum'] = new CurriculumController( $this );

		/* Home route */
		$this->router->get( '/', function() {
			exit( View::make( 'layout' , array(
				'title'   => 'Bienvenue!',
				'content' => '<p class="lead">Vous allez découvrir Course Planner. Le premier logiciel web de gestion de votre agenda de cours.</p>'
			) ) );
		});

		/* Course routes */
		$this->router->get( '/courses/',          array( $this->controllers['course'], 'indexAction' ) );
		$this->router->get( '/courses/new/',      array( $this->controllers['course'], 'newAction' ) );
		$this->router->get( '/courses/show/:id',  array( $this->controllers['course'], 'showAction' ) );
		$this->router->get( '/courses/edit/:id',  array( $this->controllers['course'], 'editAction' ) );
		$this->router->post( '/courses/save/',    array( $this->controllers['course'], 'saveAction' ) );
		$this->router->post( '/courses/delete/',  array( $this->controllers['course'], 'deleteAction' ) );

		/* Curriculum routes */
		$this->router->get( '/curriculums/',          array( $this->controllers['curriculum'], 'indexAction' ) );
		$this->router->get( '/curriculums/new/',      array( $this->controllers['curriculum'], 'newAction' ) );
		$this->router->get( '/curriculums/show/:id',  array( $this->controllers['curriculum'], 'showAction' ) );
		$this->router->get( '/curriculums/edit/:id',  array( $this->controllers['curriculum'], 'editAction' ) );
		$this->router->post( '/curriculums/save/',    array( $this->controllers['curriculum'], 'saveAction' ) );
		$this->router->post( '/curriculums/delete/',  array( $this->controllers['curriculum'], 'deleteAction' ) );

		/* Registration and login routes */
		$this->router->get( '/register/', function() {
			echo 'Hello Registration form';
		});

		$this->router->get( '/login/', function() {
			echo 'Hello Login form';
		});

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