<?php

namespace App\Http\Controllers;

use App\Models\productIngredient;
use Illuminate\Http\Request;

class ProductIngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $productId = $request->query('product_id');

        $query = productIngredient::query();

        if ($productId) {
            $query->where('product_id', $productId);
        }

        $ingredients = $query->get();
        return response()->json($ingredients);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(productIngredient $productIngredient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(productIngredient $productIngredient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, productIngredient $productIngredient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(productIngredient $productIngredient)
    {
        //
    }
}
