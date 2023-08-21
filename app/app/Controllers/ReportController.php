<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Models\SubmissionModel;

class ReportController
{
    public function index(): string
    {
        $submissionModel = new SubmissionModel();
        $submissions = $submissionModel->getAll();
        return json_encode($submissions);
    }
}