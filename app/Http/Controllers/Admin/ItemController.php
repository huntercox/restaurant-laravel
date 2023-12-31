<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\OptionCategory;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ItemStoreRequest;
use App\Support\Inertia;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Admin/Item/Index', [
            'items' => Item::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Option $option): \Inertia\Response
    {
        return Inertia::render('Admin/Item/Create', [
          'existingOptions' => $option->latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemStoreRequest $request)
    {
        $validated = $request->validated();

        Item::create($validated);

        return redirect(route('admin.items.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item): \Inertia\Response
    {
      // Get the options along with the option category
      $optionsWithCategory = $item->options()->withPivot('option_category_id')->latest()->get();


      // Map the options to include the option category
      $selectedOptions = $optionsWithCategory->map(function ($option) {
        // Get the option category using the option_category_id from the pivot table
        $optionCategory = OptionCategory::find($option->pivot->option_category_id);

        return [
          'name' => $option->name,
          'description' => $option->description,
          'price' => $option->price,
          'category' => $optionCategory->name, // assuming the name property exists
        ];
      });

      return Inertia::render('Admin/Item/Show', [
        'item' => $item,
        'selectedOptions' => $selectedOptions,
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item, Option $option): \Inertia\Response
    {
      return Inertia::render('Admin/Item/Edit', [
        'item' => $item,
        'existingOptions' => $option->latest()->get(),
      ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $itemId): \Illuminate\Http\RedirectResponse
    {
      $item = Item::findOrFail($itemId);

      // Detach all existing options
      $item->options()->detach();

      // Iterate through the provided option rows
      foreach ($request->input('optionRows') as $row) {
        // Find or create the option category
        $optionCategory = OptionCategory::firstOrCreate(['name' => $row['category']]);

        foreach ($row['options'] as $optionId) {
          // Find the option
          $option = Option::find($optionId);
          if ($option) {
            // Attach the option to the item with the category
            $item->options()->attach($optionId, ['option_category_id' => $optionCategory->id]);
          }
        }
      }

      // Update other fields
      $item->update([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'price' => $request->input('price'),
      ]);

      return redirect()->route('admin.items.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }
}
