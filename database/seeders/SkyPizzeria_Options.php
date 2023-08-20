<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Menu;
use App\Models\Option;
use App\Models\OptionCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkyPizzeria_Options extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

      // Find the Pizza menu
      $pizza_menu = Menu::where('name', 'Pizza')->first();

        // Toppings category
        $toppingCategory = OptionCategory::create(['name' => 'Toppings']);

        // Toppings
        $toppings = [
          'pepperoni', 'sausage', 'beef', 'bacon', 'ham', 'onion', 'green pepper', 'black olive', 'green olive', 'mushroom', 'banana pepper rings', 'jalapeno', 'pineapple', 'grilled chicken'
        ];

      // Create a Toppings option category
      $toppings_category = OptionCategory::firstOrCreate(['name' => 'Toppings']);

      // Create the toppings options and attach them to the category
      $topping_options = collect($toppings)->map(function ($topping) {
        return Option::create([
          'name' => ucfirst($topping),
          'description' => ucfirst($topping) . ' topping',
          'price' => 65, // $0.65 in cents
        ]);
      });

      // Loop through all the items on the Pizza menu and attach the toppings options to each item
      $pizza_menu->items->each(function (Item $item) use ($topping_options, $toppings_category) {
        $syncData = $topping_options->mapWithKeys(function ($option) use ($toppings_category) {
          return [$option->id => ['option_category_id' => $toppings_category->id]];
        })->toArray();
        $item->options()->sync($syncData);
      });
    }
}
