<?php
require __DIR__ . '/vendor/autoload.php';

//use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Weather\Controller\StartPage;
use Router\{Router, RequestRouter};

$controller = new StartPage();

$loader = new FilesystemLoader('View', __DIR__ . '/src/Weather');
$twig = new Environment($loader, ['cache' => __DIR__ . '/cache', 'debug' => true]);

$loader = new FilesystemLoader('View', __DIR__ . '/src/Weather');

$twig = new Environment($loader, ['cache' => __DIR__ . '/cache', 'debug' => true]);
$controller = new StartPage();

$router = new Router();

$router->router('/', function () use ($controller) {
    return $controller->getTodayWeather();
});
$router->router('/weather-today', function () use ($controller) {
    return $controller->getTodayWeather();
});
$router->router('/google-today', function () use ($controller) {
    return $controller->getTodayWeather();
});
$router->router('/week', function () use ($controller) {
    return $controller->getWeekWeather();
});
$router->router('/weather-week', function () use ($controller) {
    return $controller->getWeekWeather();
});
$router->router('/google-week', function () use ($controller) {
    return $controller->getWeekWeather();
});

$action = new RequestRouter();

$renderInfo = $router->dispatchRouter($action->uri());

$renderInfo['context']['resources_dir'] = 'src/Weather/Resources';

$content = $twig->render($renderInfo['template'], $renderInfo['context']);

$response = new Response(
    $content,
    Response::HTTP_OK,
    array('content-type' => 'text/html')
);

$response->send();

