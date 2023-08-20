<?php
declare(strict_types = 1);

namespace App\RequestValidators;

class ValidateCreateSubmission
{
    public function validate(array $data): array
    {
        $errors = [];

        // Amount required & only numbers
        if(!isset($data['amount'])){
            $errors['amount'] = "Amount is required.";
        }else{
            if (!is_numeric($data['amount'])) {
                $errors['amount'] = "Amount must be a valid number.";
            }
        }

        // Validate Buyer (only text, spaces, and numbers, max 20 characters)
        if (!preg_match('/^[a-zA-Z0-9\s]{1,20}$/', $data['buyer'])) {
            $errors['buyer'] = "Buyer must be alphanumeric and not exceed 20 characters.";
        }

        // Validate Receipt ID (only text, max 20 characters)
        if (!preg_match('/^[a-zA-Z]{1,20}$/', $data['receipt_id'])) {
            $errors['receipt_id'] = "Receipt ID must contain only text and not exceed 20 characters.";
        }

        return $errors;
    }
}