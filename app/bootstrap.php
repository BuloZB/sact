<?php

/**
 * SACT bootstrap file.
 *
 * @copyright  Copyright (c) 2010 Igor Hlina
 * @package    SACT
 */


use Nette\Debug;
use Nette\Environment;
use Nette\Application\Route;
use Nette\Application\SimpleRouter;


// Load Nette Framework
require LIBS_DIR . '/Nette/loader.php';


// Configure environment
Debug::enable();
Environment::loadConfig();


// Configure application
$application = Environment::getApplication();
$application->errorPresenter = 'Error';
$application->catchExceptions = Environment::isProduction();


// Setup router
$router = $application->getRouter();

$router[] = new Route('index.php', array(
	'presenter'	=> 'Default',
	'action'	=> 'default',
), Route::ONE_WAY);

$router[] = new Route('<presenter>/<action>/<id>', array(
	'presenter'	=> 'Default',
	'action'	=> 'default',
	'id' => NULL,
));


// Connect to database
dibi::connect(Environment::getConfig('database'));


// Run the application!
$application->run();
