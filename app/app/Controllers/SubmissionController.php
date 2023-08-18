<?php

namespace App\Controllers;
class SubmissionController
{
    /**
     * @return string
     */
    public function index(): string
    {
        return <<<HTML
                <form method="post" action="/submissions">
                    <input name="name" type="text" placeholder="Enter your name">
                    <button type="submit">Submit</button>
                </form>
        HTML;
    }
    public function store(): string
    {
        return 'Hello ' . $_POST['name'];
    }

}