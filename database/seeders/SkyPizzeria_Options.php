<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Menu;
use App\Models\Option;
use App\Models\OptionCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SkyPizzeria_Options extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    /**
     * TOPPINGS
     */
      // Get all the pizza-related items
      $pizza_items = Menu::where('name', 'like', '%pizza%')->with('items')->get()->pluck('items')->flatten();

      // Create a Toppings option category
      $toppings_category = OptionCategory::firstOrCreate(['name' => 'Toppings']);

      // Your existing toppings array
      $toppings = [
        'pepperoni', 'sausage', 'beef', 'bacon', 'ham', 'onion', 'green pepper', 'black olive', 'green olive', 'mushroom', 'banana pepper rings', 'jalapeno', 'pineapple', 'grilled chicken'
      ];

      $pizza_items->each(function (Item $item) use ($toppings_category, $toppings) {
        $sizePrice = 0;

        if (Str::contains(strtolower($item->name), 'personal')) {
          $sizePrice = 65; // $0.65 in cents for personal pizza
        } elseif (Str::contains($item->name, '10"')) {
          $sizePrice = 125; // $1.25 in cents for 10" pizza
        } elseif (Str::contains($item->name, '14"')) {
          $sizePrice = 175; // $1.75 in cents for 14" pizza
        }

        $topping_options = collect($toppings)->map(function ($topping) use ($toppings_category, $sizePrice) {
          return Option::create([
            'name' => ucfirst($topping),
            'description' => ucfirst($topping) . ' topping',
            'price' => $sizePrice,
            'category_id' => $toppings_category->id,
          ]);
        });

        $syncData = $topping_options->mapWithKeys(function ($option) {
          return [$option->id => ['option_category_id' => $option->category_id]];
        })->toArray();

        $item->options()->sync($syncData);
      });


      /**
       * CRUSTS
       */

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

      // Get all the pizza-related items, excluding the "no crust pizza" item
      $pizza_items = Menu::where('name', 'like', '%pizza%')->with('items')->get()->pluck('items')->flatten()->reject(function ($item) {
        return Str::contains(strtolower($item->name), 'no crust pizza');
      });

      // Attach the crust options with cauliflower to the 10" pizza items
      $pizza_items_with_10_inch_crust = $pizza_items->filter(function ($item) {
        return Str::contains($item->name, '10"');
      });
      $pizza_items_with_10_inch_crust->each(function (Item $item) use ($syncDataFor10Inch) {
        $item->options()->syncWithoutDetaching($syncDataFor10Inch);
      });

      // Attach the crust options without cauliflower to other pizza items
      $pizza_items_without_10_inch_crust = $pizza_items->reject(function ($item) {
        return Str::contains($item->name, '10"');
      });
      $pizza_items_without_10_inch_crust->each(function (Item $item) use ($syncDataForOthers) {
        $item->options()->syncWithoutDetaching($syncDataForOthers);
      });


      /**
       * SAUCES
       */

      // Create a Sauce option category
      $sauce_category = OptionCategory::firstOrCreate(['name' => 'Sauce']);

      // SAUCES-traditional pizza sauce, bbq, ranch, buffalo mild, buffalo hot
      $sauce_options = collect(['pizza', 'bbq', 'ranch', 'buffalo mild', 'buffalo hot'])->map(function ($sauce) use ($sauce_category) {
        return Option::create([
          'name' => ucfirst($sauce),
          'description' => ucfirst($sauce) . ' sauce',
          'price' => 0,
          'category_id' => $sauce_category->id,
        ]);
      });

      $syncDataForSauces = $sauce_options->mapWithKeys(function ($option) {
        return [$option->id => ['option_category_id' => $option->category_id]];
      })->toArray();

      // Get all the pizza-related items, including the "no crust pizza" item
      $pizza_items = Menu::where('name', 'like', '%pizza%')->with('items')->get()->pluck('items')->flatten();

      // Attach the sauce options to the pizza items
      $pizza_items->each(function (Item $item) use ($syncDataForSauces) {
        $item->options()->syncWithoutDetaching($syncDataForSauces);
      });




    }
}
