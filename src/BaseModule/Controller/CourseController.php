<?php
namespace CoursePlanner\BaseModule\Controller;

use CoursePlanner\BaseModule\Model\Curriculum;
use Octopix\Selene\Mvc\Controller\Controller;
use Octopix\Selene\Mvc\View\View;
use CoursePlanner\BaseModule\Model\Course;

class CourseController extends Controller {

	/**
	 * Handle the delete action.
	 * Usually, controller will delete the entity.
	 */
	public function deleteAction()
	{
		$deleted = false;
		$message = 'Une erreur est survenue. Votre cours n\'a pas été supprimé.';

		$course = Course::find( (int) $this->getRequest()->post('id') );
		$deleted = $course->delete();

		if ( $deleted ) {
			$message = 'Votre cours a correctement été supprimé.';
		}
		$this->render( View::make( 'courses/index' , array(
			'status'  => $deleted,
			'message' => $message,
			'title'   => 'Mes Cours',
			'courses'  => Course::all()
		) ) );
	}

	/**
	 * Handle the index action.
	 * Usually, controller will fetch entities and render a list.
	 */
	public function indexAction()
	{
		$this->render( View::make( 'courses/index' , array(
			'title'   => 'Mes Cours',
			'courses' => Course::all()
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
		$saved = false;
		$message = 'Une erreur est survenue. Votre cours n\'a pas &eacute;t&eacute; enregistr&eacute;.';

		$course = new Course();
		$course->id = (int) $this->getRequest()->post('id');
		$course->name = $this->getRequest()->post('name');
		$course->code = $this->getRequest()->post('code');
		$course->start_date = $this->getRequest()->post('start_date');
		$course->end_date = $this->getRequest()->post('end_date');
		$course->reference_document = $this->getRequest()->post('reference_document');
		$course->curriculums = $this->getRequest()->post('curriculum_id');
		$saved = $course->save();

		if ( $saved ) {
			$message = 'Votre cours a correctement &eacute;t&eacute; enregistr&eacute;.';
		}
		$this->render( View::make( 'courses/show' , array(
			'status'  => $saved,
			'message' => $message,
			'title'   => $course->name,
			'course'  => $course
		) ) );
	}

} 