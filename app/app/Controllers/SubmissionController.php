<?php

declare(strict_types = 1);

namespace App\Controllers;
use App\Core\View;
use App\RequestValidators\ValidateCreateSubmission;

class SubmissionController
{
    public function create(): View
    {
        return View::make('submissions/create');
    }

    public function store(): string
    {
        $validator = new ValidateCreateSubmission();
        $errors = $validator->validate($_POST);
        if(!empty($errors)){
            http_response_code(422);
            return json_encode($errors);
        }

        http_response_code(201);
        return 'Submission created successfully';
    }

}