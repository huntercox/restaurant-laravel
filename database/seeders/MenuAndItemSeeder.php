<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Item;
use App\Models\Option;
use Illuminate\Support\Facades\DB;

class MenuAndItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Menus
        $italianMenu = Menu::create(['name' => 'Italian']);
        $sidesMenu = Menu::create(['name' => 'Sides']);

        // Items for the Italian Menu
        $pizza = Item::create([
            'name' => 'Pizza',
            'description' => "It's a full pizza!",
            'price' => round(16.99 * 100),
        ]);

        $pasta = Item::create([
            'name' => 'Pasta',
            'description' => "Pizza, Pasta...",
            'price' => round(8.99 * 100),
        ]);

        // Items for the Sides Menu
        $salad = Item::create([
            'name' => 'Salad',
            'description' => "I guess... if you want...",
            'price' => round(4.99 * 100),
        ]);

        $french_fries = Item::create([
            'name' => 'French Fries',
            'description' => "But really?",
            'price' => round(2.99 * 100),
        ]);

        MenuItem::create([
            'menu_id' => $italianMenu->id,
            'item_id' => $pizza->id,
        ]);

        MenuItem::create([
            'menu_id' => $italianMenu->id,
            'item_id' => $pasta->id,
        ]);

        MenuItem::create([
            'menu_id' => $sidesMenu->id,
            'item_id' => $salad->id,
        ]);

        MenuItem::create([
            'menu_id' => $sidesMenu->id,
            'item_id' => $french_fries->id,
        ]);


      // Options
      //

      $option1 = Option::create([
            'name' => 'Extra Cheese',
            'description' => "Option 1",
            'price' => round(1.99 * 100),
        ]);

    }
}
