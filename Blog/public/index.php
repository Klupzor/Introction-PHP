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

$router->get('/admin',function(){
  return render('../views/admin/index.php');
});

$router->get('/admin/posts',function() use($pdo) {

  $query = $pdo->prepare('SELECT * FROM blog_post ORDER BY id DESC');
  $query->execute();


  $blogPost = $query->fetchAll(PDO::FETCH_ASSOC);


  return render('../views/admin/posts.php', ['blogPost' => $blogPost]);
});

$router->get('/admin/posts/create', function()
 {
  return render('../views/admin/insert-post.php');
});
$router->post('/admin/posts/create', function() use ($pdo)
 {
   $sql = 'INSERT INTO blog_post(title, content) VALUES (:title, :content)';
   $query = $pdo->prepare($sql);
   $result = $query->execute([
     'title' => $_POST['title'],
     'content' => $_POST['content']

   ]);

  return render('../views/admin/insert-post.php',['result' => $result]);
});
// ruta raiz ....

$router->controller('/',App\Controllers\indexController::class);

$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $route);

echo $response;
 ?>
