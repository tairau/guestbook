<?php

declare(strict_types = 1);


namespace App\API\Docs;


use Illuminate\Routing\Controller;
use Illuminate\Contracts\View\View;

class DocumentationAction extends Controller
{
    public function __invoke(): View
    {
        return view()->make('docs.index');
    }
}
