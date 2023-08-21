<?php
declare(strict_types = 1);

namespace App\RequestValidators;

class ValidateCreateSubmission
{
    public function validate(array $data): array
    {
        $errors = [];

        // Amount (only numbers)
        if (!isset($data['amount']) || !is_numeric($data['amount'])) {
            $errors['amount'] = "Amount must be a valid number.";
        }

        // Buyer (only text, spaces, and numbers, max 20 characters)
        if (!isset($data['buyer']) || !preg_match('/^[a-zA-Z0-9\s]{1,255}$/', $data['buyer'])) {
            $errors['buyer'] = "Buyer must be alphanumeric and not exceed 255 characters.";
        }

        // Receipt ID (only text and numbers, max 20 characters)
        if (!isset($data['receipt_id']) || !preg_match('/^[a-zA-Z0-9]{1,20}$/', $data['receipt_id'])) {
            $errors['receipt_id'] = "Receipt ID must contain only text and numbers and not exceed 20 characters.";
        }

        // Items (only text, max 255 characters)
        if (!isset($data['items']) || !preg_match('/^[a-zA-Z\s]{1,255}$/', $data['items'])) {
            $errors['items'] = "Items must contain only text and not exceed 255 characters.";
        }

        // Buyer Email (valid email address, max 50 characters)
        if (!isset($data['buyer_email']) || !filter_var($data['buyer_email'], FILTER_VALIDATE_EMAIL) || strlen($data['buyer_email']) >= 50) {
            $errors['buyer_email'] = "Buyer Email must be a valid email address and not exceed 50 characters.";
        }

        // Note
         if(!isset($data['note'])){
            $errors['note'] = "Note field is required";
        }

        // City (only text, max 20 characters)
        if (!isset($data['city']) || !preg_match('/^[a-zA-Z\s]{1,20}$/', $data['city'])) {
            $errors['city'] = "City must contain only text and not exceed 20 characters.";
        }

        // Phone (only numbers, max 20 characters)
        if (!isset($data['phone']) || !preg_match('/^[0-9]{1,20}$/', $data['phone'])) {
            $errors['phone'] = "Phone must contain only numbers and not exceed 20 characters.";
        }

        // Entry by (only numbers, max 10 characters)
        if (!isset($data['entry_by']) || !is_numeric($data['entry_by'])) {
            $errors['entry_by'] = "Entry by must be a valid number.";
        }

        return $errors;
    }

}