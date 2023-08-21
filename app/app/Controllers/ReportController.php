<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Models\SubmissionModel;

class ReportController
{
    public function index(): string
    {
        $id = $_GET['id'] ?? null;
        $fromDate = $_GET['fromDate'] ?? null;
        $toDate = $_GET['toDate'] ?? null;

        $submissionModel = new SubmissionModel();

        if($id) {
            $submission = $submissionModel->find((int) $id);
            return json_encode($submission);
        }

        $submissions = $submissionModel->getAll();
        return json_encode($submissions);
    }
}