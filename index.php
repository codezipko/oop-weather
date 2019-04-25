<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/src/Router/RouterBootstrap.php';


use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Weather\Controller\StartPage;
use Router\{Router, RequestRouter};

$controller = new StartPage();

$loader = new FilesystemLoader('View', __DIR__ . '/src/Weather');
$twig = new Environment($loader, ['cache' => __DIR__ . '/cache', 'debug' => true]);


$renderInfo = Router::load('src/Weather/routes.php')->direct(RequestRouter::uri(), RequestRouter::method());

$renderInfo['context']['resources_dir'] = 'src/Weather/Resources';
$content = $twig->render($renderInfo['template'], $renderInfo['context']);
$response = new Response(
    $content,
    Response::HTTP_OK,
    array('content-type' => 'text/html')
);
$response->send();

