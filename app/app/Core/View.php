<?php

declare(strict_types = 1);

namespace App\Core;

use App\Exceptions\ViewNotFoundException;

class View
{
    public function __construct(
        protected string $path,
        protected array $data = []
    )
    {
    }

    public static function make(string $view, array $data = []): static
    {
        return new static($view, $data);
    }

    /**
     * @throws ViewNotFoundException
     */
    public function render(string $path, array $data = []): string
    {
        $viewPath = __DIR__ . "/../../Views/$path.php";
        if (!file_exists($viewPath)) {
            throw new ViewNotFoundException();
        }
        extract($data);
        ob_start();
        require_once $viewPath;
        return ob_get_clean();
    }

    /**
     * @throws ViewNotFoundException
     */
    public function __toString(): string
    {
        return $this->render($this->path, $this->data);
    }
}