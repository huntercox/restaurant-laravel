<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
    public function create()
    {
        return Inertia::render('Admin/Item/Create');
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
    public function show(Item $item)
    {
      return Inertia::render('Admin/Item/Show', [
        'item' => $item,
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
      return Inertia::render('Admin/Item/Edit', [
        'item' => $item,
      ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemStoreRequest $request, Item $item)
    {
      $validated = $request->validated();

      $validated['price'] = (int) ($validated['price'] * 100);

      $item->update($validated);

      return redirect(route('admin.items.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }
}
