<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class OrderController extends Controller
{
    public function create()
    {
        $pizza_sizes = ['small' => 8, 'medium' => 10, 'large' => 12];
        return Inertia::render('Order/Home', [
            'storeUrl' => route('order.store'),
            'pizza_sizes' => $pizza_sizes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = new Order;
        $order->title = $request->title;
        $order->about = $request->about;
        $order->price = (double) $request->price;
        $order->save();
        $order->genres()->attach($request->allGenres);

    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
