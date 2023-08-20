<?php
declare(strict_types = 1);

namespace App\Controllers;

use App\Core\View;
use App\Models\SubmissionModel;

class IndexController
{
    public function index(): View
    {
        //if submission table does not exist, createTable will create it
        $submissionModel = new SubmissionModel();
        $submissionModel->createTable();

        return View::make('index');
    }
}