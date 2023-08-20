<?php

namespace App\Controllers;

use App\Core\View;

class IndexController
{
    public function index(): View
    {
        $db = \App\Core\App::db();
        $this->createSubmissionTable($db);
        return View::make('index');
    }

    protected  function createSubmissionTable($db): void
    {
        $db->query("
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
}