<?php

declare(strict_types = 1);

namespace App\Core;

class Config
{
    /**
     * @var array|array[]
     */
    protected array $config = [];

    public function __construct(array $env = [])
    {
        $this->config = [
            'db' => [
                'host'     => $env['DB_HOST'],
                'user'     => $env['DB_USER'],
                'password' => $env['DB_PASSWORD'],
                'database' => $env['DB_DATABASE'],
                'driver'   => $env['DB_DRIVER'] ?? 'mysql',
            ],
        ];
    }

    public function __get(string $name)
    {
        return $this->config[$name] ?? null;
    }
}