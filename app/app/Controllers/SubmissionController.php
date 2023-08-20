<?php

namespace App\Controllers;
use App\Core\View;

class SubmissionController
{
    public function index(): View
    {
        return View::make('index');
    }

    public function report(): View
    {
        return View::make('submissions/report');
    }

    public function create(): View
    {
        return View::make('submissions/create');
    }

    public function store(): string
    {
        return 'Hello ' . $_POST['name'];
    }

}