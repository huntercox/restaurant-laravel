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
            return Option::firstOrCreate(
              ['name' => ucfirst($topping), 'category_id' => $toppings_category->id],
              ['description' => ucfirst($topping) . ' topping', 'price' => $sizePrice]
            );
          });


          $syncData = $topping_options->mapWithKeys(function ($option) {
            return [$option->id => ['option_category_id' => $option->category_id]];
          })->toArray();

          $item->options()->sync($syncData);
        });

    /**
     * EXTRA CHEESE
     */
        // Get all the pizza-related items
        $pizza_items = Menu::where('name', 'like', '%pizza%')->with('items')->get()->pluck('items')->flatten();

        // Create an "Extra Cheese" option category
        $extra_cheese_category = OptionCategory::firstOrCreate(['name' => 'Extra Cheese']);

        $pizza_items->each(function (Item $item) use ($extra_cheese_category) {
          $extraCheesePrice = 0;

          // Determine the price for the "Extra Cheese" based on the pizza size
          if (Str::contains(strtolower($item->name), 'personal')) {
            $extraCheesePrice = 80; // $0.80 in cents for personal pizza
          } elseif (Str::contains($item->name, '10"')) {
            $extraCheesePrice = 150; // $1.50 in cents for 10" pizza
          } elseif (Str::contains($item->name, '14"')) {
            $extraCheesePrice = 225; // $2.25 in cents for 14" pizza
          }

          $extra_cheese_option = Option::firstOrCreate(
            ['name' => 'Extra Cheese', 'category_id' => $extra_cheese_category->id],
            ['description' => 'Extra cheese topping', 'price' => $extraCheesePrice]
          );

          $item->options()->attach($extra_cheese_option->id, ['option_category_id' => $extra_cheese_category->id]);
        });

      /**
       * CRUSTS
       */
      // Create a Crust option category
      $crust_category = OptionCategory::firstOrCreate(['name' => 'Crust']);

      $crust_options = collect(['thin', 'hand-tossed'])->map(function ($crust) use ($crust_category) {
        return Option::firstOrCreate(
          ['name' => ucfirst($crust), 'category_id' => $crust_category->id],
          ['description' => ucfirst($crust) . ' crust', 'price' => 0]
        );
      });

      $cauliflower_option = Option::firstOrCreate(
        ['name' => 'Cauliflower', 'category_id' => $crust_category->id],
        ['description' => 'Cauliflower crust', 'price' => 0]
      );

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
        return Option::firstOrCreate(
          ['name' => ucfirst($sauce), 'category_id' => $sauce_category->id],
          ['description' => ucfirst($sauce) . ' sauce', 'price' => 0]
        );
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

    // =======================================================================================================
  // =======================================================================================================
    // =======================================================================================================

      /**
       * Cheese Breads - single item with options
       */
        $cheese_bread = Item::where('name', 'Cheese Bread')->where('price',  999)->first();

        if ($cheese_bread) {
          // Create or get the Cheese Bread Options category
          $cheese_bread_options_category = OptionCategory::firstOrCreate(['name' => 'Cheese Bread Options']);

          // Define the Cheese Bread options
          $cheese_bread_options = [
            'Pepperoni' => 100, // $1.00 in cents
            'Ham' => 100,       // $1.00 in cents
            'Bacon' => 100,     // $1.00 in cents
            'All Meat' => 200   // $2.00 in cents
          ];

          // Iterate over the options and create or get them, then attach to the Cheese Bread item
          foreach ($cheese_bread_options as $option_name => $option_price) {
            $option = Option::firstOrCreate(
              ['name' => $option_name, 'category_id' => $cheese_bread_options_category->id],
              ['description' => $option_name, 'price' => $option_price]
            );

            $cheese_bread->options()->syncWithoutDetaching([$option->id => ['option_category_id' => $cheese_bread_options_category->id]]);
          }
        }

        /**
         * Traditional Wings - single item with options
         */
        $trad_wings = Item::where('name', 'Traditional Wings')->first();

        if ($trad_wings) {
          // Create or get the Traditional Wings Options categories
          $trad_wings_sauces_category = OptionCategory::firstOrCreate(['name' => 'Sauces']);
          $trad_wings_sizes_category = OptionCategory::firstOrCreate(['name' => 'Sizes']);
          $trad_wings_rubs_category = OptionCategory::firstOrCreate(['name' => 'Dry Rubs']);

          // Define the Traditional Wings options
          $trad_wings_sauces = [
            'BBQ' => 0,
            'Buffalo Hot' => 0,
            'Buffalo Mild' => 0,
            'Teriyaki' => 0,
          ];

          // Sizes options
          $trad_wings_sizes = [
            '6' => 0,
            '12' => 700,
            '18' => 1450,
            '24' => 2100,
          ];

          // Dry Rubs options
          $trad_wings_rubs = [
            'Cajun' => 0,
            'Mesquite' => 0,
            'Ranch' => 0,
            'Nashville Hot' => 0,
          ];

          // Function to handle options creation and attachment
          $handleOptions = function ($options, $category, $item) {
            foreach ($options as $option_name => $option_price) {
              $option = Option::firstOrCreate(
                ['name' => $option_name, 'category_id' => $category->id],
                ['description' => $option_name, 'price' => $option_price]
              );
              $item->options()->syncWithoutDetaching([$option->id => ['option_category_id' => $category->id]]);
            }
          };

          // Apply the function for Sauces, Sizes, and Dry Rubs
          $handleOptions($trad_wings_sauces, $trad_wings_sauces_category, $trad_wings);
          $handleOptions($trad_wings_sizes, $trad_wings_sizes_category, $trad_wings);
          $handleOptions($trad_wings_rubs, $trad_wings_rubs_category, $trad_wings);
        }

      /**
       * Boneless Wings - single item with options
       */
        $boneless_wings = Item::where('name', 'Boneless Wings')->first();

        if ($boneless_wings) {
          // Create or get the Traditional Wings Options categories
          $boneless_wings_sauces_category = OptionCategory::firstOrCreate(['name' => 'Sauces']);
          $boneless_wings_sizes_category = OptionCategory::firstOrCreate(['name' => 'Sizes']);
          $boneless_wings_rubs_category = OptionCategory::firstOrCreate(['name' => 'Dry Rubs']);

          // Define the Traditional Wings options
          $boneless_wings_sauces = [
            'BBQ' => 0,
            'Buffalo Hot' => 0,
            'Buffalo Mild' => 0,
            'Teriyaki' => 0,
          ];

          // Sizes options
          $boneless_wings_sizes = [
            '6' => 0,
            '12' => 750,
            '18' => 1500,
            '24' => 2200,
          ];

          // Dry Rubs options
          $boneless_wings_rubs = [
            'Cajun' => 0,
            'Mesquite' => 0,
            'Ranch' => 0,
            'Nashville Hot' => 0,
          ];

          // Function to handle options creation and attachment
          $handleOptions = function ($options, $category, $item) {
            foreach ($options as $option_name => $option_price) {
              $option = Option::firstOrCreate(
                ['name' => $option_name, 'category_id' => $category->id],
                ['description' => $option_name, 'price' => $option_price]
              );
              $item->options()->syncWithoutDetaching([$option->id => ['option_category_id' => $category->id]]);
            }
          };

          // Apply the function for Sauces, Sizes, and Dry Rubs
          $handleOptions($boneless_wings_sauces, $boneless_wings_sauces_category, $boneless_wings);
          $handleOptions($boneless_wings_sizes, $boneless_wings_sizes_category, $boneless_wings);
          $handleOptions($boneless_wings_rubs, $boneless_wings_rubs_category, $boneless_wings);

        }

    /**
     * Deep Fried Ravioli
     */
      $deep_fried_ravioli = Item::where('name', 'Deep Fried Ravioli')->first();

      if ( $deep_fried_ravioli ) {

        $deep_fried_ravioli_sizes_category = OptionCategory::firstOrCreate(['name' => 'Sizes']);
        $deep_fried_ravioli_filling_category = OptionCategory::firstOrCreate(['name' => 'Filling']);

        $deep_fried_ravioli_sizes = [
          '10' => 0,
          '20' => 400,
        ];

        $deep_fried_ravioli_filling = [
          'Four Cheese' => 0,
          'Beef' => 0,
        ];

        $handleOptions = function ($options, $category, $item) {
          foreach ($options as $option_name => $option_price) {
            $option = Option::firstOrCreate(
              ['name' => $option_name, 'category_id' => $category->id],
              ['description' => $option_name, 'price' => $option_price]
            );
            $item->options()->syncWithoutDetaching([$option->id => ['option_category_id' => $category->id]]);
          }
        };

        $handleOptions($deep_fried_ravioli_sizes, $deep_fried_ravioli_sizes_category, $deep_fried_ravioli);
        $handleOptions($deep_fried_ravioli_filling, $deep_fried_ravioli_filling_category, $deep_fried_ravioli);

      }

    }
}
