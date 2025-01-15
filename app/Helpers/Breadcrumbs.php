<?php

namespace App\Helpers;

class Breadcrumbs
{
    public static function generate($links)
    {
        return view('components.breadcrumbs', compact('links'))->render();
    }
}