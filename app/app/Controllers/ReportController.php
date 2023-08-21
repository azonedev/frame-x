<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Core\View;
use App\Models\SubmissionModel;

class ReportController
{
    public function index(): View
    {
        $id = $_GET['id'] ?? null;
        $fromDate = $_GET['fromDate'] ?? null;
        $toDate = $_GET['toDate'] ?? null;

        $submissionModel = new SubmissionModel();

        if($id) {
            $data = $submissionModel->find((int) $id);
            return View::make('reports/index', $data);
        }

        if($fromDate && $toDate) {
            $data = $submissionModel->getByDateRange($fromDate, $toDate);
            return View::make('reports/index', $data);
        }

        $data = $submissionModel->getAll();

        return View::make('reports/index', $data);
    }
}