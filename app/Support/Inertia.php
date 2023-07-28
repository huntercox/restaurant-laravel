<?php

namespace App\Support;

use Illuminate\Contracts\Support\Arrayable;
use Inertia\Inertia as InertiaPackage;
use Inertia\Response;

class Inertia
{
    public static function render(string $component, array|Arrayable $props = []): Response
    {
        if ($props instanceof Arrayable) {
            $props = $props->toArray();
        }

        $path = 'Customer/Pages/' . $component;

        if (str_starts_with($component, 'Admin')) {
            $path = str_replace('Admin', 'Admin/Pages', $component);
        }

        return InertiaPackage::render($path, $props);
    }
}
