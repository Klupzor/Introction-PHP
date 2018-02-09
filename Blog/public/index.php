<?php
// aqui manejamos loe errores en consola
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
// incluimos la libreria phroute con composer para trabajar todas las rutas desde nuestro front controler

require_once '../vendor/autoload.php';
include_once 'config.php';
// definiendo ruta base...............
$baseUrl = '';
$baseName = basename($_SERVER['SCRIPT_NAME']);
$baseDir = str_replace($baseName, '' ,$_SERVER['SCRIPT_NAME']);
$baseUrl = 'http://' . $_SERVER['HTTP_HOST'] . $baseDir;
// creamos constante
define('BASE_URL', $baseUrl);
// var_dump($baseDir);
// var_dump($baseUrl);
// .......................................

function render($fileName, $params = []){
  ob_start();

  extract($params);
  include $fileName;

  return ob_get_clean();
}

// agregando rutas ..........................
$route = $_GET['route'] ?? '/';
use Phroute\Phroute\RouteCollector;

$router = new RouteCollector();

$router->controller('/','App\Controllers\IndexController');
$router->controller('/admin',App\Controllers\admin\IndexController::class);

$router->controller('/admin/posts',App\Controllers\admin\postController::class);


// ruta raiz ....


$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $route);

echo $response;
 ?>
