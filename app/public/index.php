<?php

declare(strict_types = 1);

use App\Core\Router;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$router = new Router();

$router->get('/', [App\Controllers\IndexController::class, 'index']);
$router->get('/reports', [\App\Controllers\ReportController::class, 'index']);

$router->get('/submissions/create', [App\Controllers\SubmissionController::class, 'create']);
$router->post('/submissions', [App\Controllers\SubmissionController::class, 'store']);


(new \App\Core\App($router, new \App\Core\Config($_ENV)))->run();