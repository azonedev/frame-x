<?php

declare(strict_types = 1);

namespace App\Controllers;
use App\Core\View;

class SubmissionController
{
    public function create(): View
    {
        return View::make('submissions/create');
    }

    public function store(): string
    {
        return 'Hello ' . $_POST['name'];
    }

}