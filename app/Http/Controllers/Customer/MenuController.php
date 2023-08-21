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
        $menus = Menu::with('items.options.category')->get();
        return Inertia::render('Menu', [
            'menus' => $menus
        ]);
    }
}

