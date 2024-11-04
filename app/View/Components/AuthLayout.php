<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AuthLayout extends AbstractLayout
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title = '' ,
        public string $action = '',
        public string $submitMessage = 'Soumettre'
    )
    {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layout.auth');
    }
}