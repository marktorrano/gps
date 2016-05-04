<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\EditProductRequest;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Collection;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();
        return view('products.showallproducts', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.createproductform');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $collection_id = DB::table('collections')->where('category_id', $request->category_id)->where('brand_id', $request->brand_id)->value('id');

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'collection_id' => $collection_id
        ]);

        $newName = "photoProduct" . $product->id . ".jpg";

        $request->file('photo')->move("images", $newName);

        DB::table('photos')->insert([
            'path' => $newName,
            'imageable_id' => $product->id,
            'imageable_type' => 'App\Models\Product',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return ('posted');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = Product::find($id);

        return view('products.showproduct', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::find($id);

        return view('pages.editproductform', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $request, $id)
    {
        //
        $product = Product::find($id);

        $product->name = $request->name;

        $product->update();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return 'deleted';

        $product = Product::find($id);

        $product->delete();


    }

    public function fetchNewProducts()
    {
        $products = Product::orderBy('created_at', 'DESC')->get()->take(10);

        foreach ($products as $product) {
            foreach ($product->photos as $photo) {

            }
        }

        return $products;
    }

    public function fetchAllProducts()
    {
        $products = Product::all();

        foreach ($products as $product) {
            foreach ($product->photos as $photo) {

            }
        }

        return $products;

    }
}
