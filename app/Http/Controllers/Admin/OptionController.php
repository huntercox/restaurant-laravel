<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OptionStoreRequest;
use App\Models\Option;
use App\Support\Inertia;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $options = Option::latest()->get();
      return Inertia::render('Admin/Option/Index', [
        'options' => $options,
      ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return Inertia::render('Admin/Option/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OptionStoreRequest $request)
    {
      $validated = $request->validated();

      $validated['price'] = (int) ($validated['price'] * 100);

      $option = Option::create($validated);

      return redirect(route('admin.options.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Option $option)
    {
      return Inertia::render('Admin/Option/Show', [
        'option' => $option,
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Option $option)
    {
      return Inertia::render('Admin/Option/Edit', [
        'option' => $option,
      ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OptionStoreRequest $request, Option $option)
    {
      $validated = $request->validated();

      $validated['price'] = (int) ($validated['price'] * 100);

      $option->update($validated);

      return redirect(route('admin.options.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $option)
    {
        //
    }
}
