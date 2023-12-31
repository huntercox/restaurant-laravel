<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Support\Inertia;
use App\Http\Requests\Admin\MenuStoreRequest;
use App\Models\Menu;
use App\Models\Item;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $menus = Menu::with('items')->get();

        return Inertia::render('Admin/Menu/Index', [
            'menus' => $menus,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Menu/Create', [
            'items' => Item::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuStoreRequest $request)
    {
        $validated = $request->validated();

        $menu = Menu::create($validated);

        // Fetch the items
        $items = Item::find($request->input('item_ids'));

        // Attach items to the menu
        foreach ($items as $item) {
            $menu->items()->attach($item->id);
        }

        return redirect(route('admin.menus.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
