<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use App\Models\User;
use Illuminate\Http\Request;


class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // Validasyon kuralları
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,product_id',
            'detail' => 'required|string|max:255',
            'count' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'user_id' => 'required|exists:users,user_id',
        ]);

        // Kullanıcıyı al
        $user = User::findOrFail($validatedData['user_id']);

        // Yeni alışveriş sepeti kaydı oluştur
        $shoppingCart = new ShoppingCart();
        $shoppingCart->product_id = $validatedData['product_id'];
        $shoppingCart->sCartNumber = $user->sCartNumber; // Kullanıcının sCartNumber'ı alınıyor
        $shoppingCart->detail = $validatedData['detail'];
        $shoppingCart->count = $validatedData['count'];
        $shoppingCart->price = $validatedData['price'];
        $shoppingCart->save();

        return response()->json($shoppingCart, 201);
    }
    /**
     * Display the specified resource.
     */
    public function show(ShoppingCart $shoppingCart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShoppingCart $shoppingCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShoppingCart $shoppingCart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShoppingCart $shoppingCart)
    {
        //
    }
}
