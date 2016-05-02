<?php

Route::get('test', function ()
{

    $category_id = 1;

    $brands = App\Models\Collection::where('category_id', $category_id)->get();

    foreach ($brands as $brand)
    {

        $brand_ = App\Models\Brand::find($brand->brand_id);

        $brand_names[] = [
            'name' => $brand_->name,
            'id'   => $brand_->id
        ];
    }


    return $brand_names;

    return $brand_id;
});

Route::get('welcome', function ()
{

    return view('welcome');
});

Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::group(['middleware' => 'web'], function ()
{
    Route::get('/', function ()
    {
        return view('layout');
    });
    Route::auth();
    Route::get('/home', 'HomeController@index');
    Route::get('cart-items/{product}', function ($product)
    {
        dd($product);
    });
    Route::resource('carts', 'CartController');
    Route::resource('items', 'ItemController');
    Route::get('items/create/{product_id}', 'ItemController@create');
    Route::resource('brands', 'BrandController');
    Route::delete('collections/{id}', function ($id)
    {

        $collection = App\Models\Collection::find($id);

        $collection->delete();

        return 'Deleted';

    });

    Route::get('get-items', function ()
    {
        $items = App\Models\Item::all();

        foreach ($items as $item)
        {

//            $item = App\Models\Item::find($item->id);
//            $path = DB::table('photos')->where('imageable_id', $item->id)->where('imageable_type', 'App\Models\Item')->value('path');

            foreach ($item->photos as $photo)
            {
            }
        }

        return $items;
    });

    Route::get('get-brands/{category_id}', function ($category_id)
    {

        $brands = App\Models\Collection::where('category_id', $category_id)->get();

        $brand_names = [];

        foreach ($brands as $brand)
        {
            $brand_ = App\Models\Brand::find($brand->brand_id);

            $brand_names[] = [
                'name' => $brand_->name,
                'id'   => $brand_->id
            ];
        }

        return $brand_names;

    });

    Route::get('get-brands', function ()
    {

        $brands = App\Models\Brand::all();

        return $brands;

    });

    Route::get('get-new-products', function ()
    {

        $products = App\Models\Product::all();

        foreach ($products as $product)
        {
            foreach ($product->photos as $photo)
            {

            }
        }

        return $products;
    });


    Route::get('users/{id}', function ($id)
    {

        $user = App\Models\User::find($id);

        return view('users/showuser', ['user' => $user]);
    });

    Route::resource('categories', 'CategoryController');
    Route::resource('products', 'ProductController');
    Route::get('products/{category_name}/{brand_name}', function ($category_name, $brand_name)
    {

        $category_id = App\Models\Category::where('name', '=', $category_name)->value('id');

        $brand_id = App\Models\Brand::where('name', '=', $brand_name)->value('id');

        $collection = App\Models\Collection::where('brand_id', $brand_id)->where('category_id', $category_id)->first();

        return view('products.showproducts', ['products' => $collection->products]);
    });
});
