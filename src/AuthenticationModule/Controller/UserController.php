<?php
namespace CoursePlanner\AuthenticationModule\Controller;

use App\App;
use CoursePlanner\AuthenticationModule\Model\User\User;
use CoursePlanner\BaseModule\Model\Curriculum;
use Octopix\Selene\Form\Input\Input;
use Octopix\Selene\Mvc\Controller\Controller;
use Octopix\Selene\Mvc\View\View;
use CoursePlanner\BaseModule\Model\Course;

class UserController extends Controller {

	/**
	 * Handle the authenticate action.
	 * Usually, controller will instantiate a user entity and affect
	 * static user in App\App.
	 */
	public function authenticateAction() {}

	/**
	 * Handle the delete action.
	 * Usually, controller will delete the entity.
	 */
	public function deleteAction() {}

	/**
	 * Handle the index action.
	 * Usually, controller will fetch entities and render a list.
	 */
	public function indexAction() {
		$this->render( View::make( 'users/forms/register' , array(
			'title'   => 'Nouvelle inscription pour Course Planner'
		) ) );
	}

	/**
	 * Handle the new action.
	 * Usually, the controller will display an empty form to create a new
	 * instance of a model and store in the database.
	 */
	public function newAction()
	{
		$this->render( View::make( 'courses/form' , array(
			'title'   => 'Ajouter un nouveau cours',
			'curriculums' => Curriculum::all()
		) ) );
	}

	/**
	 * Handle the show action.
	 * Usually, controller will fetch one record and render the entity.
	 * @param array $vars
	 */
	public function showAction($id)
	{
		$course = Course::find( $id );
		$this->render( View::make( 'courses/show', array(
			'title'  	  => $course->name,
			'course' 	  => $course,
			'curriculums' => $course->curriculums()
		) ) );
	}

	/**
	 * Handle the edit action.
	 * Usually, controller will fetch one record, render the entity
	 * and the form to edit the rendered entity.
	 */
	public function editAction($id)
	{
		$course = Course::find( $id );
		$this->render( View::make( 'courses/form' , array(
			'title'  => sprintf( 'Modifier "%s"', $course->name ),
			'course' => $course,
			'curriculums' => Curriculum::all()
		) ) );
	}

	/**
	 * Handle the save action.
	 * Usually, controller will persist the current entity.
	 */
	public function saveAction()
	{
		$message = 'Une erreur est survenue. Votre inscription n\'a pas &eacute;t&eacute; enregistr&eacute;.';

		$user = new User();
		//$user->id = (int) $this->getRequest()->post('id');
		$user->name = Input::safe( $this->getRequest()->post('email') );
		$user->firstname = Input::safe( $this->getRequest()->post('firstname') );
		$user->lastname = Input::safe( $this->getRequest()->post('lastname') );
		$user->email = Input::safe( $this->getRequest()->post('email') );
		$user->password = Input::safe( $this->getRequest()->post('password') );
		$saved = $user->save();

		if ( $saved ) {
			$message = 'Votre inscription a correctement &eacute;t&eacute; enregistr&eacute;.';
			\App\App::user( $user );
		}
		$this->render( View::make( 'index' , array(
			'status'  => $saved,
			'message' => $message,
			'title'   => sprintf( 'Bienvenue, %s!', $user->firstname ),
			'content' => '<p class="lead">Vous allez découvrir Course Planner. Le premier logiciel web de gestion de votre agenda de cours.</p>'
		) ) );
	}

} 