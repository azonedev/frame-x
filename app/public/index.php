<?php

use App\Router;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$router = new Router();

$router->get('/', [App\Controllers\SubmissionController::class, 'index']);
$router->get('/reports', [\App\Controllers\ReportController::class, 'index']);

$router->get('/submissions/create', [App\Controllers\SubmissionController::class, 'create']);
$router->post('/submissions', [App\Controllers\SubmissionController::class, 'store']);

try {
    echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
} catch (\App\Exceptions\RouteNotFoundException $e) {
    echo $e->getMessage();
}