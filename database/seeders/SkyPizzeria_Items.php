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
      // PIZZA MENU
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

      // CHEESE BREADS MENU
      $cheese_breads_menu = Menu::create(['name' => 'Cheese Breads']);

      $cheese_bread = Item::create([
        'name' => 'Cheese Bread',
        'description' => "Cheese bread, one size.",
        'price' => round(9.99 * 100),
      ]);
      $pepperoni_cheese_bread = Item::create([
        'name' => 'Pepperoni Cheese Bread',
        'description' => "Pepperoni Cheese bread, one size.",
        'price' => round(10.99 * 100),
      ]);
      $ham_cheese_bread = Item::create([
        'name' => 'Ham Cheese Bread',
        'description' => "Ham Cheese bread, one size.",
        'price' => round(10.99 * 100),
      ]);
      $bacon_cheese_bread = Item::create([
        'name' => 'Bacon Cheese Bread',
        'description' => "Bacon Cheese bread, one size.",
        'price' => round(10.99 * 100),
      ]);
      $all_meat_cheese_bread = Item::create([
        'name' => 'All Meat Cheese Bread',
        'description' => "All Meat Cheese bread, one size.",
        'price' => round(11.99 * 100),
      ]);

      MenuItem::create([
        'menu_id' => $cheese_breads_menu->id,
        'item_id' => $cheese_bread->id,
      ]);
      MenuItem::create([
        'menu_id' => $cheese_breads_menu->id,
        'item_id' => $pepperoni_cheese_bread->id,
      ]);
      MenuItem::create([
        'menu_id' => $cheese_breads_menu->id,
        'item_id' => $ham_cheese_bread->id,
      ]);
      MenuItem::create([
        'menu_id' => $cheese_breads_menu->id,
        'item_id' => $bacon_cheese_bread->id,
      ]);
      MenuItem::create([
        'menu_id' => $cheese_breads_menu->id,
        'item_id' => $all_meat_cheese_bread->id,
      ]);

      // WINGS MENU

      $wings_menu = Menu::create(['name' => 'Wings']);

      $wings_trad_6 = Item::create([
        'name' => 'Traditional Wings 6',
        'description' => "6 traditional wings.",
        'price' => round(7.99 * 100),
      ]);
      $wings_trad_12 = Item::create([
        'name' => 'Traditional Wings 12',
        'description' => "12 traditional wings.",
        'price' => round(14.99 * 100),
      ]);
      $wings_trad_18 = Item::create([
        'name' => 'Traditional Wings 18',
        'description' => "18 traditional wings.",
        'price' => round(22.49 * 100),
      ]);
      $wings_trad_24 = Item::create([
        'name' => 'Traditional Wings 24',
        'description' => "24 traditional wings.",
        'price' => round(28.99 * 100),
      ]);

      $wings_boneless_6 = Item::create([
        'name' => 'Boneless Wings 6',
        'description' => "6 boneless wings.",
        'price' => round(7.99 * 100),
      ]);
      $wings_boneless_12 = Item::create([
        'name' => 'Boneless Wings 12',
        'description' => "12 boneless wings.",
        'price' => round(15.49 * 100),
      ]);
      $wings_boneless_18 = Item::create([
        'name' => 'Boneless Wings 18',
        'description' => "18 boneless wings.",
        'price' => round(22.99 * 100),
      ]);
      $wings_boneless_24 = Item::create([
        'name' => 'Boneless Wings 24',
        'description' => "24 boneless wings.",
        'price' => round(29.99 * 100),
      ]);

      MenuItem::create([
        'menu_id' => $wings_menu->id,
        'item_id' => $wings_trad_6->id,
      ]);
      MenuItem::create([
        'menu_id' => $wings_menu->id,
        'item_id' => $wings_trad_12->id,
      ]);
      MenuItem::create([
        'menu_id' => $wings_menu->id,
        'item_id' => $wings_trad_18->id,
      ]);
      MenuItem::create([
        'menu_id' => $wings_menu->id,
        'item_id' => $wings_trad_24->id,
      ]);
      MenuItem::create([
        'menu_id' => $wings_menu->id,
        'item_id' => $wings_boneless_6->id,
      ]);
      MenuItem::create([
        'menu_id' => $wings_menu->id,
        'item_id' => $wings_boneless_12->id,
      ]);
      MenuItem::create([
        'menu_id' => $wings_menu->id,
        'item_id' => $wings_boneless_18->id,
      ]);
      MenuItem::create([
        'menu_id' => $wings_menu->id,
        'item_id' => $wings_boneless_24->id,
      ]);

      // APPETIZERS

      $appetizers_menu = Menu::create(['name' => 'Appetizers']);

      $breadsticks = Item::create([
        'name' => 'Breadsticks',
        'description' => "Breadsticks & Marinara sauce.",
        'price' => round(5.49 * 100),
      ]);
      $deep_fried_ravioli_10_cheese = Item::create([
        'name' => 'Deep Fried Ravioli - Four Cheese - 10pc',
        'description' => "10 pieces of deep fried four-cheese ravioli w/ Marinara sauce.",
        'price' => round(4.99 * 100),
      ]);
      $deep_fried_ravioli_10_beef = Item::create([
        'name' => 'Deep Fried Ravioli - Beef Filled - 10pc',
        'description' => "10 pieces of deep fried beef-filled ravioli w/ Marinara sauce.",
        'price' => round(4.99 * 100),
      ]);
      $deep_fried_ravioli_20_cheese = Item::create([
        'name' => 'Deep Fried Ravioli - Four Cheese - 20pc',
        'description' => "20 pieces of deep fried four-cheese ravioli w/ Marinara sauce.",
        'price' => round(8.99 * 100),
      ]);
      $deep_fried_ravioli_20_beef = Item::create([
        'name' => 'Deep Fried Ravioli - Beef Filled - 20pc',
        'description' => "20 pieces of deep fried beef-filled cheese ravioli w/ Marinara sauce.",
        'price' => round(8.99 * 100),
      ]);

      MenuItem::create([
        'menu_id' => $appetizers_menu->id,
        'item_id' => $breadsticks->id,
      ]);
      MenuItem::create([
        'menu_id' => $appetizers_menu->id,
        'item_id' => $deep_fried_ravioli_10_cheese->id,
      ]);
      MenuItem::create([
        'menu_id' => $appetizers_menu->id,
        'item_id' => $deep_fried_ravioli_10_beef->id,
      ]);
      MenuItem::create([
        'menu_id' => $appetizers_menu->id,
        'item_id' => $deep_fried_ravioli_20_cheese->id,
      ]);
      MenuItem::create([
        'menu_id' => $appetizers_menu->id,
        'item_id' => $deep_fried_ravioli_20_beef->id,
      ]);



    }
}
