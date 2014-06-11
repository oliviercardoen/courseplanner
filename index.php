<?php
/**
 * CoursePlanner
 * @author oliviercardoen
 */
define( 'TEMPLATES_PATH',   dirname( __FILE__ ) . '/app/views' );
define( 'ASSETS_PATH',      'assets' );
define( 'DB_HOST',          'localhost');
define( 'DB_NAME',          'php_courseplanner');
define( 'DB_USER_NAME',     'root');
define( 'DB_USER_PASSWORD', 'root');

require 'vendor/autoload.php';
require 'app/config/config.php';

use App\App;

$app = new App();
$app->run();