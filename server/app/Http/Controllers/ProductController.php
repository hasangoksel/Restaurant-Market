<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Type;

class ProductController extends Controller
{

    //Ürün fotoğrafını dosyaya kaydetmek.
    //Satılan ürün sayısını kaldır. onun yerine isfavourite sütunu ekle (boolen)
    //Count sütunu kaldır.
    //isFavourite olanları getiren api yaz. Default 0 gelecek. 


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $typeId = $request->query('type_id');
        $categoryId = $request->query('category_id');

        $query = Product::query();

        if ($typeId) {
            $query->where('type_id', $typeId);
        }

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        $products = $query->get();
        return response()->json($products);
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
        $validateData = $request->validate([
            'category_id' => 'required|exists:categories,category_id',
            'type_id' => 'required|exists:types,type_id',
            'name' => 'required|string|max:255',
            'detail' => 'required|string',
            'count' => 'required|integer',
            'price' => 'required|numeric',
            'discountRate' => 'required|integer',
            'image' => 'required|string',
            'quentitySold' => 'required|integer', //satılan adet
        ]);

        $type_id = $validateData['type_id'];
        $category_id = $validateData['category_id'];

        // $typeId = Type::where('type',$typeName) -> value('type_id');
        // $categoryId = Category::where('category',$categoryName) -> where('type_id',$typeId)->value('category_id');

        $product = new Product();
        $product -> category_id = $category_id;
        $product -> type_id = $type_id;
        $product -> name = $validateData['name'];
        $product -> detail = $validateData['detail'];
        $product -> count = $validateData['count'];
        $product -> price = $validateData['price'];
        $product -> discountRate = $validateData['discountRate'];
        $product -> image = $validateData['image'];
        $product -> quentitySold = $validateData['quentitySold']; //satılan adet
        $product -> save();

        return response()->json($product,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,category_id',
            'type_id' => 'required|exists:types,type_id',
            'name' => 'required|string|max:255',
            'detail' => 'required|string',
            'count' => 'required|integer',
            'price' => 'required|numeric',
            'discountRate' => 'required|integer',
            'image' => 'required|string',
            'quentitySold' => 'required|integer',
        ]);

        $product = Product::findOrFail($id);

        $product -> category_id = $validatedData['category_id'];
        $product -> type_id = $validatedData['type_id'];
        $product -> name = $validatedData['name'];
        $product -> detail = $validatedData['detail'];
        $product -> count = $validatedData['count'];
        $product -> price = $validatedData['price'];
        $product -> discountRate = $validatedData['discountRate'];
        $product -> image = $validatedData['image'];
        $product -> quentitySold = $validatedData['quentitySold']; //satılan adet
        $product -> save();

        return response()->json($product,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $product = Product::find($id);
        $product -> delete();
        return response()->json(['success'=>'Ürün Silindi!'],204);
    }
}
