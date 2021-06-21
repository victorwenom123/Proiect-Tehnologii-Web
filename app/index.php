<?php
session_start();
require __DIR__."/../core/class.loader.php";
/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('\MusicEngine\CoreSystem\Error::errorHandler');
set_exception_handler('\MusicEngine\CoreSystem\Error::exceptionHandler');

/**
 * Routing
 */
$router = new \MusicEngine\CoreSystem\Router();

// Routing

/**
 * Website endpoints
 */
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('api-rest', ['controller' => 'APITest', 'action' => 'index']);
$router->add('api-rest/compare', ['controller' => 'APITest', 'action' => 'compareSongs']);
$router->add('api-rest/list-songs', ['controller' => 'APITest', 'action' => 'listSongs']);
$router->add('home', ['controller' => 'Home', 'action' => 'index']);
$router->add('login', ['controller' => 'Login', 'action' => 'index']);
$router->add('logout', ['controller' => 'Login', 'action' => 'logout']);
$router->add('compare', ['controller'=> 'Compare', 'action' => 'index']);
$router->add('compareSong', ['controller'=> 'Compare', 'action' => 'compareSong']);
$router->add('admin', ['controller'=> 'Admin', 'action' => 'index']);
$router->add('admin/', ['controller'=> 'Admin', 'action' => 'index']);
$router->add('admin/add-song', ['controller'=> 'Admin', 'action' => 'addSongIndex']);
$router->add('admin/add-song/', ['controller'=> 'Admin', 'action' => 'addSongIndex']);
$router->add('admin/add-song-action', ['controller'=> 'Admin', 'action' => 'addSong']);
$router->add('admin/add-song-action/', ['controller'=> 'Admin', 'action' => 'addSong']);
$router->add('admin/songs', ['controller'=> 'Admin', 'action' => 'listSongs']);
$router->add('admin/songs/', ['controller'=> 'Admin', 'action' => 'listSongs']);
$router->add('admin/users', ['controller'=> 'Admin', 'action' => 'listUsers']);
$router->add('admin/users/', ['controller'=> 'Admin', 'action' => 'listUsers']);
$router->add('admin/import-csv', ['controller'=> 'Admin', 'action' => 'importCsv']);
$router->add('admin/import-csv/', ['controller'=> 'Admin', 'action' => 'importCsv']);
$router->add('admin/process-csv', ['controller'=> 'Admin', 'action' => 'processCsv']);
$router->add('recommendations', ['controller'=> 'Recomend', 'action' => 'index']);
$router->add('recommendations/process', ['controller'=> 'Recomend', 'action' => 'getRecomendations']);
$router->add('wall/{userid:\d+}', ['controller' => 'Wall', 'action' => 'list']);
$router->add('wall/{userid:\d+}/create-post', ['controller' => 'Wall', 'action' => 'createPost']);
$router->add('wall/{userid:\d+}/remove-post/{postid:\d+}', ['controller' => 'Wall', 'action' => 'removePost']);
$router->add('report', ['controller'=> 'Report', 'action' => 'index']);
$router->add('guide', ['controller'=> 'Guide', 'action' => 'index']);

/**
 * Api Endpoints
 */

$router->add('api', ['controller' => 'AudioAPI', 'action' => 'index']);
$router->add('api/', ['controller' => 'AudioAPI', 'action' => 'index']);
$router->add('api/compare-songs', ['controller' => 'AudioAPI', 'action' => 'compareSong']);
$router->add('api/get-songs', ['controller' => 'AudioAPI', 'action' => 'getAllSongs']);

$router->dispatch($_SERVER['QUERY_STRING']);


?>
