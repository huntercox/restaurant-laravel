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

      // Specialty Pizza

      $specialty_pizza_menu = Menu::create(['name' => 'Specialty Pizza']);

      // Chicken Bacon BBQ 10"
      $chicken_bacon_bbq_10 = Item::create([
        'name' => 'Chicken Bacon BBQ 10"',
        'description' => "10\" - Seasoned grilled chicken, bacon, with BBQ sauce. Optional upon request - add onions.",
        'price' => round(13.99 * 100),
      ]);

      // Chicken Bacon BBQ 14"
      $chicken_bacon_bbq_14 = Item::create([
        'name' => 'Chicken Bacon BBQ 14"',
        'description' => "14\" - Seasoned grilled chicken, bacon, with BBQ sauce. Optional upon request - add onions.",
        'price' => round(16.99 * 100),
      ]);

      // Chicken Bacon Ranch 10"
      $chicken_bacon_ranch_10 = Item::create([
        'name' => 'Chicken Bacon Ranch 10"',
        'description' => "10\" - Seasoned grilled chicken, bacon, with ranch sauce. Optional upon request - add onions.",
        'price' => round(13.99 * 100),
      ]);

      // Chicken Bacon Ranch 14"
      $chicken_bacon_ranch_14 = Item::create([
        'name' => 'Chicken Bacon Ranch 14"',
        'description' => "14\" - Seasoned grilled chicken, bacon, with ranch sauce. Optional upon request - add onions.",
        'price' => round(16.99 * 100),
      ]);

      // Chicken Alfredo Pizza 10"
      $chicken_alfredo_pizza_10 = Item::create([
        'name' => 'Chicken Alfredo Pizza 10"',
        'description' => "10\" - Seasoned grilled chicken, fresh spinach leaves and mushrooms, with Alfredo sauce. Optional upon request - add onions.",
        'price' => round(13.99 * 100),
      ]);

      // Chicken Alfredo Pizza 14"
      $chicken_alfredo_pizza_14 = Item::create([
        'name' => 'Chicken Alfredo Pizza 14"',
        'description' => "14\" - Seasoned grilled chicken, fresh spinach leaves and mushrooms, with Alfredo sauce. Optional upon request - add onions.",
        'price' => round(16.99 * 100),
      ]);

      // Buffalo Chicken Pizza 10"
      $buffalo_chicken_pizza_10 = Item::create([
        'name' => 'Buffalo Chicken Pizza 10"',
        'description' => "10\" - Seasoned grilled chicken and banana pepper rings with mild buffalo sauce and ranch dressy drizzled on top.",
        'price' => round(13.99 * 100),
      ]);

      // Buffalo Chicken Pizza 14"
      $buffalo_chicken_pizza_14 = Item::create([
        'name' => 'Buffalo Chicken Pizza 14"',
        'description' => "14\" -  Seasoned grilled chicken and banana pepper rings with mild buffalo sauce and ranch dressy drizzled on top.",
        'price' => round(16.99 * 100),
      ]);

      // The Hawaiian Sunrise 10"
      $hawaiian_sunrise_10 = Item::create([
        'name' => 'The Hawaiian Sunrise 10"',
        'description' => "10\" - Seasoned grilled chicken, sweet colored peppers and pineapple with BBQ sauce.",
        'price' => round(13.99 * 100),
      ]);

      // The Hawaiian Sunrise 14"
      $hawaiian_sunrise_14 = Item::create([
        'name' => 'The Hawaiian Sunrise 14"',
        'description' => "14\" - Seasoned grilled chicken, sweet colored peppers and pineapple with BBQ sauce.",
        'price' => round(16.99 * 100),
      ]);

      // The Hawaiian Sunset 10"
      $hawaiian_sunset_10 = Item::create([
        'name' => 'The Hawaiian Sunset 10"',
        'description' => "10\" - Smoked ham, sweet colored peppers and pineapple with BBQ sauce.",
        'price' => round(13.99 * 100),
      ]);

      // The Hawaiian Sunset 14"
      $hawaiian_sunset_14 = Item::create([
        'name' => 'The Hawaiian Sunset 14"',
        'description' => "14\" - Smoked ham, sweet colored peppers and pineapple with BBQ sauce.",
        'price' => round(16.99 * 100),
      ]);

      // The Deluxe 10"
      $the_deluxe_10 = Item::create([
        'name' => 'The Deluxe 10"',
        'description' => "10\" - Pepperoni, sausage, mushrooms, onions and green peppers.",
        'price' => round(13.99 * 100),
      ]);

      // The Deluxe 14"
      $the_deluxe_14 = Item::create([
        'name' => 'The Deluxe 14"',
        'description' => "14\" - Pepperoni, sausage, mushrooms, onions and green peppers.",
        'price' => round(16.99 * 100),
      ]);

      // The Meat 10"
      $the_meat_10 = Item::create([
        'name' => 'The Meat 10"',
        'description' => "10\" - Pepperoni, sausage, ham, bacon and beef.",
        'price' => round(14.99 * 100),
      ]);

      // The Meat 14"
      $the_meat_14 = Item::create([
        'name' => 'The Meat 14"',
        'description' => "14\" - Pepperoni, sausage, ham, bacon and beef.",
        'price' => round(19.99 * 100),
      ]);

      // The Supreme 10"
      $the_supreme_10 = Item::create([
        'name' => 'The Supreme 10"',
        'description' => "10\" - Pepperoni, sausage, mushrooms, onions, green peppers, black olives and banana pepper rings.",
        'price' => round(15.99 * 100),
      ]);

      // The Supreme 14"
      $the_supreme_14 = Item::create([
        'name' => 'The Supreme 14"',
        'description' => "14\" - Pepperoni, sausage, mushrooms, onions, green peppers, black olives and banana pepper rings.",
        'price' => round(21.99 * 100),
      ]);

      MenuItem::create([
        'menu_id' => $specialty_pizza_menu->id,
        'item_id' => $chicken_bacon_bbq_10->id,
      ]);
      MenuItem::create([
        'menu_id' => $specialty_pizza_menu->id,
        'item_id' => $chicken_bacon_bbq_14->id,
      ]);
      MenuItem::create([
        'menu_id' => $specialty_pizza_menu->id,
        'item_id' => $chicken_bacon_ranch_10->id,
      ]);
      MenuItem::create([
        'menu_id' => $specialty_pizza_menu->id,
        'item_id' => $chicken_bacon_ranch_14->id,
      ]);
      MenuItem::create([
        'menu_id' => $specialty_pizza_menu->id,
        'item_id' => $chicken_alfredo_pizza_10->id,
      ]);
      MenuItem::create([
        'menu_id' => $specialty_pizza_menu->id,
        'item_id' => $chicken_alfredo_pizza_14->id,
      ]);
      MenuItem::create([
        'menu_id' => $specialty_pizza_menu->id,
        'item_id' => $buffalo_chicken_pizza_10->id,
      ]);
      MenuItem::create([
        'menu_id' => $specialty_pizza_menu->id,
        'item_id' => $buffalo_chicken_pizza_14->id,
      ]);
      MenuItem::create([
        'menu_id' => $specialty_pizza_menu->id,
        'item_id' => $hawaiian_sunrise_10->id,
      ]);
      MenuItem::create([
        'menu_id' => $specialty_pizza_menu->id,
        'item_id' => $hawaiian_sunrise_14->id,
      ]);
      MenuItem::create([
        'menu_id' => $specialty_pizza_menu->id,
        'item_id' => $hawaiian_sunset_10->id,
      ]);
      MenuItem::create([
        'menu_id' => $specialty_pizza_menu->id,
        'item_id' => $hawaiian_sunset_14->id,
      ]);
      MenuItem::create([
        'menu_id' => $specialty_pizza_menu->id,
        'item_id' => $the_deluxe_10->id,
      ]);
      MenuItem::create([
        'menu_id' => $specialty_pizza_menu->id,
        'item_id' => $the_deluxe_14->id,
      ]);
      MenuItem::create([
        'menu_id' => $specialty_pizza_menu->id,
        'item_id' => $the_meat_10->id,
      ]);
      MenuItem::create([
        'menu_id' => $specialty_pizza_menu->id,
        'item_id' => $the_meat_14->id,
      ]);
      MenuItem::create([
        'menu_id' => $specialty_pizza_menu->id,
        'item_id' => $the_supreme_10->id,
      ]);
      MenuItem::create([
        'menu_id' => $specialty_pizza_menu->id,
        'item_id' => $the_supreme_14->id,
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

      // Sky Fries

      $sky_fries_menu = Menu::create(['name' => 'Sky Fries']);

      //plain fries
      $plain_fries = Item::create([
        'name' => 'Plain Fries',
        'description' => "Plain fries.",
        'price' => round(4.49 * 100),
      ]);
      // seasoned fries
      $seasoned_fries = Item::create([
        'name' => 'Seasoned Fries',
        'description' => "Seasoned fries.",
        'price' => round(5.49 * 100),
      ]);
      // cajun fries
      $cajun_fries = Item::create([
        'name' => 'Cajun Fries',
        'description' => "Cajun fries.",
        'price' => round(5.49 * 100),
      ]);
      // ranch seasoned fries
      $ranch_seasoned_fries = Item::create([
        'name' => 'Ranch Seasoned Fries',
        'description' => "Ranch seasoned fries.",
        'price' => round(5.49 * 100),
      ]);
      // bacon cheese fries
      $bacon_cheese_fries = Item::create([
        'name' => 'Bacon Cheese Fries',
        'description' => "Fries with bacon & nacho cheese.",
        'price' => round(6.49 * 100),
      ]);
      // bbq bacon fries
      $bbq_bacon_fries = Item::create([
        'name' => 'BBQ Bacon Fries',
        'description' => "Fries with bacon & BBQ sauce.",
        'price' => round(6.49 * 100),
      ]);
      // loaded fries
      $loaded_fries = Item::create([
        'name' => 'Loaded Fries',
        'description' => "Fries with bacon, onions, and nacho cheese.",
        'price' => round(6.49 * 100),
      ]);
      // extreme loaded fries
      $extreme_loaded_fries = Item::create([
        'name' => 'Extreme Loaded Fries',
        'description' => "Fries with bacon, onions, jalapenos, crushed red peppers, and nacho cheese.",
        'price' => round(6.49 * 100),
      ]);

      MenuItem::create([
        'menu_id' => $sky_fries_menu->id,
        'item_id' => $plain_fries->id,
      ]);
      MenuItem::create([
        'menu_id' => $sky_fries_menu->id,
        'item_id' => $seasoned_fries->id,
      ]);
      MenuItem::create([
        'menu_id' => $sky_fries_menu->id,
        'item_id' => $cajun_fries->id,
      ]);
      MenuItem::create([
        'menu_id' => $sky_fries_menu->id,
        'item_id' => $ranch_seasoned_fries->id,
      ]);
      MenuItem::create([
        'menu_id' => $sky_fries_menu->id,
        'item_id' => $bacon_cheese_fries->id,
      ]);
      MenuItem::create([
        'menu_id' => $sky_fries_menu->id,
        'item_id' => $bbq_bacon_fries->id,
      ]);
      MenuItem::create([
        'menu_id' => $sky_fries_menu->id,
        'item_id' => $loaded_fries->id,
      ]);
      MenuItem::create([
        'menu_id' => $sky_fries_menu->id,
        'item_id' => $extreme_loaded_fries->id,
      ]);

      // Oven Baked 12" Subs

      $subs_menu = Menu::create(['name' => 'Oven Baked 12" Subs']);

      // pepperoni & Sausage sub
      $pepperoni_sausage_sub = Item::create([
        'name' => 'Pepperoni & Sausage Sub',
        'description' => "Pepperoni & Sausage Sub.",
        'price' => round(9.99 * 100),
      ]);
      // five meat sub
      $five_meat_sub = Item::create([
        'name' => 'Five Meat Sub',
        'description' => "Five Meat Sub w/ pepperoni, sausage, ham, bacon, and beef.",
        'price' => round(9.99 * 100),
      ]);
      // sky pizza sub
      $sky_pizza_sub = Item::create([
        'name' => 'Sky Pizza Sub',
        'description' => "Sky Pizza Sub w/ pepperoni, sausage, beef, onions, green peppers, mushrooms and pizza sauce.",
        'price' => round(9.99 * 100),
      ]);
      // ham and cheese sub
      $ham_cheese_sub = Item::create([
        'name' => 'Ham & Cheese Sub',
        'description' => "Ham & Cheese Sub.",
        'price' => round(9.99 * 100),
      ]);
      // chicken bacon ranch sub
      $chicken_bacon_ranch_sub = Item::create([
        'name' => 'Chicken Bacon Ranch Sub',
        'description' => "Grilled chicken breast strips with bacon and ranch sauce.",
        'price' => round(9.99 * 100),
      ]);
      // chicken bacon bbq sub
      $chicken_bacon_bbq_sub = Item::create([
        'name' => 'Chicken Bacon BBQ Sub',
        'description' => "Grilled chicken breast strips with bacon and Sweet Baby Ray's BBQ sauce.",
        'price' => round(9.99 * 100),
      ]);
      // veggie lover's sub
      $veggie_lovers_sub = Item::create([
        'name' => 'Veggie Lover\'s Sub',
        'description' => "Veggie Lover's Sub w/ onions, green peppers, mushrooms, black olives, and banana peppers.",
        'price' => round(9.99 * 100),
      ]);
      // buffalo chicken sub
      $buffalo_chicken_sub = Item::create([
        'name' => 'Buffalo Chicken Sub',
        'description' => "Grilled chicken breast strips with mild or hot buffalo sauce.",
        'price' => round(9.99 * 100),
      ]);
      // chicken parmesan sub
      $chicken_parmesan_sub = Item::create([
        'name' => 'Chicken Parmesan Sub',
        'description' => "Grilled chicken breast strips with marinara sauce and parmesan cheese.",
        'price' => round(9.99 * 100),
      ]);
      // meatball sub
      $meatball_sub = Item::create([
        'name' => 'Meatball Sub',
        'description' => "Meatballs smothered in marinara sauce and cheese.",
        'price' => round(9.99 * 100),
      ]);
      // hot and spicy chicken sub
      $hot_spicy_chicken_sub = Item::create([
        'name' => 'Hot & Spicy Chicken Sub',
        'description' => "Deep fried chicken breast, jalapeno peppers, crushed red peppers, buffalo hot sauce or mild sauce",
        'price' => round(9.99 * 100),
      ]);

      MenuItem::create([
        'menu_id' => $subs_menu->id,
        'item_id' => $pepperoni_sausage_sub->id,
      ]);
      MenuItem::create([
        'menu_id' => $subs_menu->id,
        'item_id' => $five_meat_sub->id,
      ]);
      MenuItem::create([
        'menu_id' => $subs_menu->id,
        'item_id' => $sky_pizza_sub->id,
      ]);
      MenuItem::create([
        'menu_id' => $subs_menu->id,
        'item_id' => $ham_cheese_sub->id,
      ]);
      MenuItem::create([
        'menu_id' => $subs_menu->id,
        'item_id' => $chicken_bacon_ranch_sub->id,
      ]);
      MenuItem::create([
        'menu_id' => $subs_menu->id,
        'item_id' => $chicken_bacon_bbq_sub->id,
      ]);
      MenuItem::create([
        'menu_id' => $subs_menu->id,
        'item_id' => $veggie_lovers_sub->id,
      ]);
      MenuItem::create([
        'menu_id' => $subs_menu->id,
        'item_id' => $buffalo_chicken_sub->id,
      ]);
      MenuItem::create([
        'menu_id' => $subs_menu->id,
        'item_id' => $chicken_parmesan_sub->id,
      ]);
      MenuItem::create([
        'menu_id' => $subs_menu->id,
        'item_id' => $meatball_sub->id,
      ]);
      MenuItem::create([
        'menu_id' => $subs_menu->id,
        'item_id' => $hot_spicy_chicken_sub->id,
      ]);


      // Oven Baked Spaghetti

      $spaghetti_menu = Menu::create(['name' => 'Oven Baked Spaghetti']);

      // spaghetti and meatballs
      $spaghetti_meatballs = Item::create([
        'name' => 'Spaghetti & Meatballs',
        'description' => "Spaghetti & Meatballs.",
        'price' => round(8.59 * 100),
      ]);
      // chicken alfredo
      $chicken_alfredo = Item::create([
        'name' => 'Chicken Alfredo',
        'description' => "Chicken Alfredo.",
        'price' => round(8.99 * 100),
      ]);
      // black pepper chicken alfredo
      $black_pepper_chicken_alfredo = Item::create([
        'name' => 'Black Pepper Chicken Alfredo',
        'description' => "Black Pepper Chicken Alfredo.",
        'price' => round(8.99 * 100),
      ]);
      // shrimp and bacon alfredo
      $shrimp_bacon_alfredo = Item::create([
        'name' => 'Shrimp & Bacon Alfredo',
        'description' => "Shrimp & Bacon Alfredo.",
        'price' => round(9.99 * 100),
      ]);
      // chicken parmesan
      $chicken_parmesan = Item::create([
        'name' => 'Chicken Parmesan',
        'description' => "Chicken Parmesan.",
        'price' => round(9.99 * 100),
      ]);
      // pizza spaghetti
      $pizza_spaghetti = Item::create([
        'name' => 'Pizza Spaghetti',
        'description' => "Pizza Spaghetti.",
        'price' => round(9.99 * 100),
      ]);

      MenuItem::create([
        'menu_id' => $spaghetti_menu->id,
        'item_id' => $spaghetti_meatballs->id,
      ]);
      MenuItem::create([
        'menu_id' => $spaghetti_menu->id,
        'item_id' => $chicken_alfredo->id,
      ]);
      MenuItem::create([
        'menu_id' => $spaghetti_menu->id,
        'item_id' => $black_pepper_chicken_alfredo->id,
      ]);
      MenuItem::create([
        'menu_id' => $spaghetti_menu->id,
        'item_id' => $shrimp_bacon_alfredo->id,
      ]);
      MenuItem::create([
        'menu_id' => $spaghetti_menu->id,
        'item_id' => $chicken_parmesan->id,
      ]);
      MenuItem::create([
        'menu_id' => $spaghetti_menu->id,
        'item_id' => $pizza_spaghetti->id,
      ]);

      // Sky Zones

      $zones_menu = Menu::create(['name' => 'Sky Zones']);

      // pepperoni zone
      $pepperoni_zone = Item::create([
        'name' => 'Pepperoni Zone',
        'description' => "Pepperoni Zone.",
        'price' => round(7.99 * 100),
      ]);
      // ham and cheese zone
      $ham_cheese_zone = Item::create([
        'name' => 'Ham & Cheese Zone',
        'description' => "Ham & Cheese Zone.",
        'price' => round(7.99 * 100),
      ]);
      // all meat zone
      $all_meat_zone = Item::create([
        'name' => 'All Meat Zone',
        'description' => "All Meat Zone.",
        'price' => round(7.99 * 100),
      ]);
      // supreme zone
      $supreme_zone = Item::create([
        'name' => 'Supreme Zone',
        'description' => "Supreme Zone.",
        'price' => round(7.99 * 100),
      ]);

      MenuItem::create([
        'menu_id' => $zones_menu->id,
        'item_id' => $pepperoni_zone->id,
      ]);
      MenuItem::create([
        'menu_id' => $zones_menu->id,
        'item_id' => $ham_cheese_zone->id,
      ]);
      MenuItem::create([
        'menu_id' => $zones_menu->id,
        'item_id' => $all_meat_zone->id,
      ]);
      MenuItem::create([
        'menu_id' => $zones_menu->id,
        'item_id' => $supreme_zone->id,
      ]);

      // The Overloads menu

      $overloads_menu = Menu::create(['name' => 'The Overloads']);

      // pepperoni overload 10"
      $pepperoni_overload_10 = Item::create([
        'name' => 'Pepperoni Overload 10"',
        'description' => "10\" pizza overloaded with pepperoni flavor topped with 3 different types of pepperonis - chopped pepperoni, thicker borough cut cupping pepperoni and our original pepperoni.",
        'price' => round(13.99 * 100),
      ]);

      // pepperoni overload 14"
      $pepperoni_overload_14 = Item::create([
        'name' => 'Pepperoni Overload 14"',
        'description' => "14\" pizza overloaded with pepperoni flavor topped with 3 different types of pepperonis - chopped pepperoni, thicker borough cut cupping pepperoni and our original pepperoni.",
        'price' => round(17.99 * 100),
      ]);

      // sausage overload 10"
      $sausage_overload_10 = Item::create([
        'name' => 'Sausage Overload 10"',
        'description' => "10\" pizza loaded with flavor for the sausage lover. Topped with 3 different types of sausage - A flavorful hand pulled Italian sausage, spicy sliced Italian Medallions and our original ground American sausage.",
        'price' => round(13.99 * 100),
      ]);

      // sausage overload 14"
      $sausage_overload_14 = Item::create([
        'name' => 'Sausage Overload 14"',
        'description' => "14\" pizza loaded with flavor for the sausage lover. Topped with 3 different types of sausage - A flavorful hand pulled Italian sausage, spicy sliced Italian Medallions and our original ground American sausage.",
        'price' => round(17.99 * 100),
      ]);

      // cheese overload 10"
      $cheese_overload_10 = Item::create([
        'name' => 'Cheese Overload 10"',
        'description' => "10\" pizza for the cheese fanatic blended perfectly with 5 different cheese flavors - mozzarella, provolone, Monterey Jack cheddar and a deliciously seasoned parmesan cheese.",
        'price' => round(11.99 * 100),
      ]);

      // cheese overload 14"
      $cheese_overload_14 = Item::create([
        'name' => 'Cheese Overload 14"',
        'description' => "14\" pizza for the cheese fanatic blended perfectly with 5 different cheese flavors - mozzarella, provolone, Monterey Jack cheddar and a deliciously seasoned parmesan cheese.",
        'price' => round(15.99 * 100),
      ]);

      // veggie overload 10"
      $veggie_overload_10 = Item::create([
        'name' => 'Veggie Overload 10"',
        'description' => "A colorful blend of 8 vegetables - mushrooms, black olives, green olives, green peppers, onion, sweet multi colored peppers, spinach leaves and tomatoes (when seasonably available). Optional upon request - banana pepper rings and jalapenos.",
        'price' => round(13.99 * 100),
      ]);

      // veggie overload 14"
      $veggie_overload_14 = Item::create([
        'name' => 'Veggie Overload 14"',
        'description' => "A colorful blend of 8 vegetables - mushrooms, black olives, green olives, green peppers, onion, sweet multi colored peppers, spinach leaves and tomatoes (when seasonably available). Optional upon request - banana pepper rings and jalapenos.",
        'price' => round(16.99 * 100),
      ]);

      // ultimate meat overload 10"
      $ultimate_meat_overload_10 = Item::create([
        'name' => 'Ultimate Meat Overload 10"',
        'description' => "An incredible pizza blended with the huge flavor of 9 meats - chopped pepperoni, thicker borough cut cupping pepperoni, our original pepperoni, hand pulled Italian sausage, spicy sliced Italian medallions, our original ground American sausage, smoked ham, beef and bacon.",
        'price' => round(19.99 * 100),
      ]);

      // ultimate meat overload 14"
      $ultimate_meat_overload_14 = Item::create([
        'name' => 'Ultimate Meat Overload 14"',
        'description' => "An incredible pizza blended with the huge flavor of 9 meats - chopped pepperoni, thicker borough cut cupping pepperoni, our original pepperoni, hand pulled Italian sausage, spicy sliced Italian medallions, our original ground American sausage, smoked ham, beef and bacon.",
        'price' => round(25.99 * 100),
      ]);

      MenuItem::create([
        'menu_id' => $overloads_menu->id,
        'item_id' => $pepperoni_overload_10->id,
      ]);
      MenuItem::create([
        'menu_id' => $overloads_menu->id,
        'item_id' => $pepperoni_overload_14->id,
      ]);
      MenuItem::create([
        'menu_id' => $overloads_menu->id,
        'item_id' => $sausage_overload_10->id,
      ]);
      MenuItem::create([
        'menu_id' => $overloads_menu->id,
        'item_id' => $sausage_overload_14->id,
      ]);
      MenuItem::create([
        'menu_id' => $overloads_menu->id,
        'item_id' => $cheese_overload_10->id,
      ]);
      MenuItem::create([
        'menu_id' => $overloads_menu->id,
        'item_id' => $cheese_overload_14->id,
      ]);
      MenuItem::create([
        'menu_id' => $overloads_menu->id,
        'item_id' => $veggie_overload_10->id,
      ]);
      MenuItem::create([
        'menu_id' => $overloads_menu->id,
        'item_id' => $veggie_overload_14->id,
      ]);
      MenuItem::create([
        'menu_id' => $overloads_menu->id,
        'item_id' => $ultimate_meat_overload_10->id,
      ]);
      MenuItem::create([
        'menu_id' => $overloads_menu->id,
        'item_id' => $ultimate_meat_overload_14->id,
      ]);




      // Dessert menu

      $dessert_menu = Menu::create(['name' => 'Desserts']);

      // Iced Cinna Sticks
      $iced_cinna_sticks = Item::create([
        'name' => 'Iced Cinna Sticks',
        'description' => "Iced Cinna Sticks.",
        'price' => round(5.49 * 100),
      ]);

      // double chocolate brownie cookie
      $double_chocolate_brownie_cookie = Item::create([
        'name' => 'Double Chocolate Brownie Cookie',
        'description' => "Double Chocolate Brownie Cookie.",
        'price' => round(4.99 * 100),
      ]);

      // chocolate chip cookie
      $chocolate_chip_cookie = Item::create([
        'name' => 'Chocolate Chip Cookie',
        'description' => "Hot freshly baked large 8\" in diameter - cut into 8 pieces.",
        'price' => round(4.99 * 100),
      ]);

      MenuItem::create([
        'menu_id' => $dessert_menu->id,
        'item_id' => $iced_cinna_sticks->id,
      ]);
      MenuItem::create([
        'menu_id' => $dessert_menu->id,
        'item_id' => $double_chocolate_brownie_cookie->id,
      ]);
      MenuItem::create([
        'menu_id' => $dessert_menu->id,
        'item_id' => $chocolate_chip_cookie->id,
      ]);






      // Extras menu

      $extras_menu = Menu::create(['name' => 'Extras']);


      // Cheese cup
      $cheese_cup = Item::create([
        'name' => 'Cheese Cup',
        'description' => "Cheese Cup.",
        'price' => round(1.25 * 100),
      ]);

      // Marinara cup
      $marinara_cup = Item::create([
        'name' => 'Marinara Cup',
        'description' => "Marinara Cup.",
        'price' => round(1.25 * 100),
      ]);

      // Ranch Dressing cup
      $ranch_cup = Item::create([
        'name' => 'Ranch Dressing Cup',
        'description' => "Ranch Dressing Cup.",
        'price' => round(1.25 * 100),
      ]);

      // BBQ Sauce cup
      $bbq_cup = Item::create([
        'name' => 'BBQ Sauce Cup',
        'description' => "BBQ Sauce Cup.",
        'price' => round(1.25 * 100),
      ]);

      MenuItem::create([
        'menu_id' => $extras_menu->id,
        'item_id' => $cheese_cup->id,
      ]);
      MenuItem::create([
        'menu_id' => $extras_menu->id,
        'item_id' => $marinara_cup->id,
      ]);
      MenuItem::create([
        'menu_id' => $extras_menu->id,
        'item_id' => $ranch_cup->id,
      ]);
      MenuItem::create([
        'menu_id' => $extras_menu->id,
        'item_id' => $bbq_cup->id,
      ]);


    }
}
