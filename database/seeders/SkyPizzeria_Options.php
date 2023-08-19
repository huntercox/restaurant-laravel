<?php

namespace Database\Seeders;

use App\Models\Item;
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

      $cheese_personal = Item::where('name', 'Cheese Personal')->first();

      // Make sure the item was found before proceeding
      if ($cheese_personal) {
        // Toppings category
        $toppingCategory = OptionCategory::create(['name' => 'Toppings']);

        // Toppings
        $toppings = [
          'pepperoni', 'sausage', 'beef', 'bacon', 'ham', 'onion', 'green pepper', 'black olive', 'green olives', 'mushroom', 'banana pepper rings', 'jalapenos', 'pineapple', 'grilled chicken'
        ];

        // Price for each topping of a Personal size pizza
        $topping_price = round(0.65 * 100);

        foreach ($toppings as $topping) {
          $option = Option::create([
            'name' => ucfirst($topping),
            'description' => ucfirst($topping) . ' topping',
            'price' => $topping_price,
          ]);

          // Attach the option to the item (pizza)
          $cheese_personal->options()->attach($option->id, ['option_category_id' => $toppingCategory->id]);
        }

      }


    }
}
