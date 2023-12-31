<?php

declare(strict_types = 1);

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
const VIEW_PATH = __DIR__ . '/../views';

$router = new App\Core\Router();

$router->get('/', [App\Controllers\IndexController::class, 'index']);
$router->get('/reports', [\App\Controllers\ReportController::class, 'index']);

$router->get('/form', [App\Controllers\SubmissionController::class, 'create']);
$router->post('/create', [App\Controllers\SubmissionController::class, 'store']);

(new \App\Core\App($router, new \App\Core\Config($_ENV)))->run();