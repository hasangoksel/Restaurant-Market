<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Type;

class ProductController extends Controller
{
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'category_id' => 'required|exists:categories,category_id',
            'type_id' => 'required|exists:types,type_id',
            'name' => 'required|string|max:255',
            'detail' => 'required|string',
            'price' => 'required|numeric',
            'discountRate' => 'required|integer',
            'image' => 'required|string',
            'isFavourite' => 'required|boolean', 
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
        $product -> price = $validateData['price'];
        $product -> discountRate = $validateData['discountRate'];
        $product -> image = $validateData['image'];
        $product -> isFavourite = $validateData['isFavourite']; 
        $product -> save();

        return response()->json($product,201);
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
            'price' => 'required|numeric',
            'discountRate' => 'required|integer',
            'image' => 'required|string',
            'isFavourite' => 'required|boolean',
        ]);

        $product = Product::findOrFail($id);

        $product -> category_id = $validatedData['category_id'];
        $product -> type_id = $validatedData['type_id'];
        $product -> name = $validatedData['name'];
        $product -> detail = $validatedData['detail'];
        $product -> price = $validatedData['price'];
        $product -> discountRate = $validatedData['discountRate'];
        $product -> image = $validatedData['image'];
        $product -> isFavourite = $validatedData['isFavourite']; 
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

    //Favori ürünleri listeler
    public function getFavourites()
    {
        $favParoducts = Product::where('isFavourite',1)->get();
        return response()->json($favParoducts,200);
    }

    //Ürün fotoğraflarını kaydeder
    public function upload(Request $request)
    {
        $request -> validate([
            'image'=>'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        if($request->file('image')){
            $image = $request->file('image');
            $path = $image->store('images','public'); //dosyayı 'public/images' dizinine kaydediyor.

            $imageName = $image->hashName(); //Bu yolda saklanan dosya ismi.

            return response()->json(['success'=>'Resim Başarıyla Yüklendi!','image_path'=> $path],200);
        }
        return response()->json(['error'=>'Resim Yüklenemedi',400]);
    }
}
