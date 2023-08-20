<?php

namespace App\Models;

use App\Core\Model;
use http\Exception;

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
        $this->db->query("
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
        ", $data);

        return (int) $this->db->lastInsertId();
    }

    public function getAll()
    {
        return $this->db->query("SELECT * FROM submissions ORDER BY id DESC")->fetchAll();
    }

    public function find(int $id)
    {
        // Validate the input
        if ($id <= 0) {
            return false; // Invalid ID
        }

        return $this->db->query('SELECT * FROM submissions WHERE id = :id', ['id' => $id])->fetch();
    }

//    filter by date range or id
    public function filter($data)
    {
        $query = "SELECT * FROM submissions WHERE 1=1 ";
        if (isset($data['id']) && $data['id'] != '') {
            $query .= " AND id = :id ";
        }
        if (isset($data['from_date']) && $data['from_date'] != '') {
            $query .= " AND entry_at >= :from_date ";
        }
        if (isset($data['to_date']) && $data['to_date'] != '') {
            $query .= " AND entry_at <= :to_date ";
        }
        $query .= " ORDER BY id DESC ";
        return $this->db->query($query, $data)->fetchAll();
    }


}