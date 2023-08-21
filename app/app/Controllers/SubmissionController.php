<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;
use App\Models\SubmissionModel;
use App\RequestValidators\ValidateCreateSubmission;
use App\Services\SubmissionService;

class SubmissionController
{
    public function create(): View
    {
        return View::make('submissions/create');
    }

    public function store(): string
    {
        $validator = new ValidateCreateSubmission();
        $submissionModel = new SubmissionModel();
        $service = new SubmissionService();

        $errors = $validator->validate($_POST);
        if (!empty($errors)) {
            http_response_code(422);
            return json_encode($errors);
        }

        $data = [
            'amount' => $_POST['amount'],
            'buyer' => $_POST['buyer'],
            'receipt_id' => $_POST['receipt_id'],
            'items' => $_POST['items'],
            'buyer_email' => $_POST['buyer_email'],
            'note' => $_POST['note'],
            'city' => $_POST['city'],
            'phone' => $_POST['phone'],
            'entry_by' => $_POST['entry_by'],
            'buyer_ip' => $service->getClientIp(),
        ];

        $submissionID = $submissionModel->create($data);
        $hashKey = $service->makeHashKeyFromID($submissionID);
        $submissionModel->updateHashKey($hashKey, $submissionID);

        http_response_code(201);
        return 'Submission created successfully';
    }

}