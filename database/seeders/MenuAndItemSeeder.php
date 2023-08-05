<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Item;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class MenuAndItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate your tables
        DB::table('order_items')->truncate();
        DB::table('cart_items')->truncate();
        DB::table('items')->truncate();
        DB::table('orders')->truncate();
        DB::table('menu_items')->truncate();
        DB::table('menus')->truncate();
        DB::table('statuses')->truncate();
        DB::table('coupons')->truncate();
        DB::table('users')->truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Menus
        $italianMenu = Menu::create(['name' => 'Italian']);
        $sidesMenu = Menu::create(['name' => 'Sides']);

        // Items for the Italian Menu
        $pizza = Item::create([
            'name' => 'Pizza',
            'description' => "It's a full pizza!",
            'price' => 16.99,
        ]);

        $pasta = Item::create([
            'name' => 'Pasta',
            'description' => "Pizza, Pasta...",
            'price' => 8.99,
        ]);

        // Items for the Sides Menu
        $salad = Item::create([
            'name' => 'Salad',
            'description' => "I guess... if you want...",
            'price' => 4.99,
        ]);

        $french_fries = Item::create([
            'name' => 'French Fries',
            'description' => "But really?",
            'price' => 2.99,
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
    }
}
