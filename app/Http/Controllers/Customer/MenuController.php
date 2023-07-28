<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Support\Inertia;
use Inertia\Response;

class MenuController extends Controller
{
    public function __invoke(): Response
    {
        return Inertia::render('Menu', [
            'menus' => Menu::latest()->get()
        ]);
    }
}
