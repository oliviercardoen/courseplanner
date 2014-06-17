<?php
$config = array(
	'menu' => array(
		'home'         => 'http://sites/php/courseplanner',
		'courses'      => 'http://sites/php/courseplanner/courses',
		'curriculums'  => 'http://sites/php/courseplanner/curriculums',
		'schools'      => 'http://sites/php/courseplanner/schools',
		'locations'    => 'http://sites/php/courseplanner/schools/locations',
		'students'     => 'http://sites/php/courseplanner/students',
		'register'     => 'http://sites/php/courseplanner/register',
		'authenticate' => 'http://sites/php/courseplanner/authenticate',
		'logout'       => 'http://sites/php/courseplanner/logout',
		'profile'      => 'http://sites/php/courseplanner/profile',
	),
	'salt' => sha1( 'courseplanner' )
);