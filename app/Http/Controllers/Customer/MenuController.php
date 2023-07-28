<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Support\Inertia;
use Inertia\Response;

class MenuController extends Controller
{
    public function __invoke(): Response
    {
        return Inertia::render('Menu', [
            'products' => Product::with('user:id,name')->latest()->get()
        ]);
    }
}
