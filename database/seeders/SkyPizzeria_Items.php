<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkyPizzeria_Items extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pizza_menu = Menu::create(['name' => 'Pizza']);

        $cheese_personal = Item::create([
            'name' => 'Cheese Personal',
            'description' => "All cheese pizza, personal size.",
            'price' => round(5.99 * 100),
        ]);
        $cheese_10 = Item::create([
          'name' => 'Cheese 10"',
          'description' => "All cheese pizza, 10\" size.",
          'price' => round(8.99 * 100),
        ]);
        $cheese_14 = Item::create([
          'name' => 'Cheese 14"',
          'description' => "All cheese pizza, 14\" size.",
          'price' => round(12.99 * 100),
        ]);
        $topping1_personal = Item::create([
          'name' => '1 Topping Personal',
          'description' => "1 topping pizza, personal size.",
          'price' => round(6.39 * 100),
        ]);
        $topping1_10 = Item::create([
          'name' => '1 Topping 10"',
          'description' => "1 topping pizza, 10\" size.",
          'price' => round(9.99 * 100),
        ]);
        $topping1_14 = Item::create([
          'name' => '1 Topping 14"',
          'description' => "1 topping pizza, 14\" size.",
          'price' => round(14.74 * 100),
        ]);
        $topping2_personal = Item::create([
          'name' => '2 Topping Personal',
          'description' => "2 topping pizza, personal size.",
          'price' => round(6.79 * 100),
        ]);
        $topping2_10 = Item::create([
          'name' => '2 Topping 10"',
          'description' => "2 topping pizza, 10\" size.",
          'price' => round(10.39 * 100),
        ]);
        $topping2_14 = Item::create([
          'name' => '2 Topping 14"',
          'description' => "2 topping pizza, 14\" size.",
          'price' => round(16.49 * 100),
        ]);
        $no_crust_pizza = Item::create([
          'name' => 'No Crust Pizza',
          'description' => "No crust pizza (in bowl), one size.",
          'price' => round(8.99 * 100),
        ]);

      MenuItem::create([
        'menu_id' => $pizza_menu->id,
        'item_id' => $cheese_personal->id,
      ]);
      MenuItem::create([
        'menu_id' => $pizza_menu->id,
        'item_id' => $cheese_10->id,
      ]);
      MenuItem::create([
        'menu_id' => $pizza_menu->id,
        'item_id' => $cheese_14->id,
      ]);
      MenuItem::create([
        'menu_id' => $pizza_menu->id,
        'item_id' => $topping1_personal->id,
      ]);
      MenuItem::create([
        'menu_id' => $pizza_menu->id,
        'item_id' => $topping1_10->id,
      ]);
      MenuItem::create([
        'menu_id' => $pizza_menu->id,
        'item_id' => $topping1_14->id,
      ]);
      MenuItem::create([
        'menu_id' => $pizza_menu->id,
        'item_id' => $topping2_personal->id,
      ]);
      MenuItem::create([
        'menu_id' => $pizza_menu->id,
        'item_id' => $topping2_10->id,
      ]);
      MenuItem::create([
        'menu_id' => $pizza_menu->id,
        'item_id' => $topping2_14->id,
      ]);
      MenuItem::create([
        'menu_id' => $pizza_menu->id,
        'item_id' => $no_crust_pizza->id,
      ]);

    }
}
