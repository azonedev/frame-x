<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\View;
use App\Models\SubmissionModel;
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
        if (!empty($errors)) {
            http_response_code(422);
            return json_encode($errors);
        }

        $submissionModel = new SubmissionModel();

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
            'buyer_ip' => $this->getClientIp(),
        ];

        $submissionID = $submissionModel->create($data);
        $submissionModel->updateHashKeyFromID($submissionID);

        http_response_code(201);
        return 'Submission created successfully';
    }

    protected function getClientIp(): string
    {
        //whether ip is from the share internet
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } //whether ip is from the proxy
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } //whether ip is from the remote address
        else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

}