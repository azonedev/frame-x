<?php

namespace App\Models;

use App\Core\Model;
use http\Exception;
use PDO;

class SubmissionModel extends Model
{
    /**
     * create table if not exists submissions
     * @return void
     */
    public function createTable(): void
    {
        $this->db->query("
            CREATE TABLE IF NOT EXISTS submissions (
                id BIGINT(20) AUTO_INCREMENT PRIMARY KEY,
                amount INT(10) NOT NULL,
                buyer VARCHAR(255) NOT NULL,
                receipt_id VARCHAR(20) NOT NULL,
                items VARCHAR(255) NOT NULL,
                buyer_email VARCHAR(50) NOT NULL,
                buyer_ip VARCHAR(20),
                note TEXT NOT NULL,
                city VARCHAR(20) NOT NULL,
                phone VARCHAR(20) NOT NULL,
                hash_key VARCHAR(255),
                entry_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                entry_by INT(10) NOT NULL
            )
        ");
    }

    public function create(array $data): int
    {
        $stmt = $this->db->prepare("
            INSERT INTO submissions (
                amount,
                buyer,
                receipt_id,
                items,
                buyer_email,
                buyer_ip,
                note,
                city,
                phone,
                hash_key,
                entry_by
            ) VALUES (
                :amount,
                :buyer,
                :receipt_id,
                :items,
                :buyer_email,
                :buyer_ip,
                :note,
                :city,
                :phone,
                :hash_key,
                :entry_by
            )
        ");

        $stmt->bindParam(':amount', $data['amount'], PDO::PARAM_INT);
        $stmt->bindParam(':buyer', $data['buyer'], PDO::PARAM_STR);
        $stmt->bindParam(':receipt_id', $data['receipt_id'], PDO::PARAM_STR);
        $stmt->bindParam(':items', $data['items'], PDO::PARAM_STR);
        $stmt->bindParam(':buyer_email', $data['buyer_email'], PDO::PARAM_STR);
        $stmt->bindParam(':buyer_ip', $data['buyer_ip'], PDO::PARAM_STR);
        $stmt->bindParam(':note', $data['note'], PDO::PARAM_STR);
        $stmt->bindParam(':city', $data['city'], PDO::PARAM_STR);
        $stmt->bindParam(':phone', $data['phone'], PDO::PARAM_STR);
        $stmt->bindParam(':hash_key', $data['hash_key'], PDO::PARAM_STR);
        $stmt->bindParam(':entry_by', $data['entry_by'], PDO::PARAM_INT);

        $stmt->execute();

        return(int) $this->db->lastInsertId();
    }

    public function getAll(): array
    {
        $stmt = $this->db->query("SELECT * FROM submissions ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public function find(int $id): array
    {
        // Validate the input
        if ($id <= 0) {
            return []; // Invalid ID
        }

        $stmt = $this->db->prepare("SELECT * FROM submissions WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function getByDateRange($fromDate, $toDate): array
    {
        $stmt = $this->db->prepare("SELECT * FROM submissions WHERE entry_at BETWEEN :from_date AND :to_date ORDER BY id DESC");
        $stmt->bindParam(':from_date', $fromDate, PDO::PARAM_STR);
        $stmt->bindParam(':to_date', $toDate, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll();
    }


    public function updateHashKey(string $hashKey, int $id): void
    {
        $smtp = $this->db->prepare("UPDATE submissions SET hash_key = :hash_key WHERE id = :id");
        $smtp->bindParam(':hash_key', $hashKey, PDO::PARAM_STR);
        $smtp->bindParam(':id', $id, PDO::PARAM_INT);
        $smtp->execute();
    }


}