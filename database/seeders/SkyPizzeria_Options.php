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
        $toppings = [
          'pepperoni', 'sausage', 'beef', 'bacon', 'ham', 'onion', 'green pepper', 'black olive', 'green olive', 'mushroom', 'banana pepper rings', 'jalapeno', 'pineapple', 'grilled chicken'
        ];

        // Create a Toppings option category
        $toppings_category = OptionCategory::firstOrCreate(['name' => 'Toppings']);

        // Create the toppings options and attach them to the category
        $topping_options = collect($toppings)->map(function ($topping) use ($toppings_category) {
          return Option::create([
            'name' => ucfirst($topping),
            'description' => ucfirst($topping) . ' topping',
            'price' => 65, // $0.65 in cents,
            'category_id' => $toppings_category->id,
          ]);
        });

        // Loop through all the items on the Pizza menu and attach the toppings options to each item
        $pizza_menu->items->each(function (Item $item) use ($topping_options) {
          $syncData = $topping_options->mapWithKeys(function ($option) {
            return [$option->id => ['option_category_id' => $option->category_id]];
          })->toArray();
          $item->options()->sync($syncData);
        });


      // Create a Crust option category
      $crust_category = OptionCategory::firstOrCreate(['name' => 'Crust']);

      $crust_options = collect(['thin', 'hand-tossed'])->map(function ($crust) use ($crust_category) {
        return Option::create([
          'name' => ucfirst($crust),
          'description' => ucfirst($crust) . ' crust',
          'price' => 0,
          'category_id' => $crust_category->id,
        ]);
      });

      $cauliflower_option = Option::create([
        'name' => 'Cauliflower',
        'description' => 'Cauliflower crust',
        'price' => 0,
        'category_id' => $crust_category->id,
      ]);

      $crust_options->push($cauliflower_option);

      $syncDataFor10Inch = $crust_options->mapWithKeys(function ($option) {
        return [$option->id => ['option_category_id' => $option->category_id]];
      })->toArray();

      $syncDataForOthers = $crust_options->reject(function ($option) {
        return $option->name === 'Cauliflower';
      })->mapWithKeys(function ($option) {
        return [$option->id => ['option_category_id' => $option->category_id]];
      })->toArray();


      // Attach the crust options with cauliflower to the 10" items
      $items_with_10_inch_crust = Item::where('name', 'like', '%10"%')->get();
      $items_with_10_inch_crust->each(function (Item $item) use ($syncDataFor10Inch) {
        $item->options()->syncWithoutDetaching($syncDataFor10Inch);
      });

      // Attach the crust options without cauliflower to other items
      $items_without_10_inch_crust = Item::where('name', 'not like', '%10"%')->get();
      $items_without_10_inch_crust->each(function (Item $item) use ($syncDataForOthers) {
        $item->options()->syncWithoutDetaching($syncDataForOthers);
      });
    }
}
