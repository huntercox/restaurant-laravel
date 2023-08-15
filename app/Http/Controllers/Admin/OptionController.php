<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
      $options = Option::with('optionCategory')->get();
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
    public function store(Request $request)
    {
      $validated = $request->validated();

      $option = Option::create($validated);

      return redirect(route('admin.options.create'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Option $option)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Option $option)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Option $option)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $option)
    {
        //
    }
}
