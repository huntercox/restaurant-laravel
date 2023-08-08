<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Support\Inertia;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $coupons = Coupon::get();

        return Inertia::render('Admin/Coupon/Index', [
            'coupons' => $coupons,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Coupon/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validated([
            'name' => 'required|string|max:30',
            'code' => ['required', 'string', Rule::unique('coupons', 'code')],
            'discount' => ['required', 'numeric', 'between:0,999999.99', 'regex:/^\d+(\.\d{1,2})?$/'],
            'expiry_date' => 'nullable|date'
        ]);

        $menu = Coupon::create($validated);

        return redirect(route('admin.menus.index'));
    }
}
