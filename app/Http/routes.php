<?php

Route::get('welcome', function ()
{
    return view('landing');
});

Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::group(['middleware' => 'web'], function ()
{

    Route::auth();
    Route::get('/', function ()
    {
        $categories = App\Models\Category::all();

        return view('layout', ['categories' => $categories]);
    });

    Route::get('test', function ()
    {
        $items = \Cart::contents();

        foreach ($items as $item)
        {

        }

        return $items;
    });

    Route::get('landing', function ()
    {

        return view('landing');
    });

    Route::resource('products', 'ProductController');
    Route::resource('categories', 'CategoryController');
    Route::resource('brands', 'BrandController');
    Route::resource('carts', 'CartController');
    Route::resource('items', 'ItemController');

    Route::get('get-cart-items', function ()
    {

        $items = [];

        foreach (Cart::contents() as $identifier => $item)
        {
            $itemArray = $item->toArray();
            $itemArray['identifier'] = $identifier;
            $items[] = $itemArray;

        }

        return $items;

    });
    Route::get('show-items/{product_id}', 'ItemController@fetchProductItems');
    Route::get('items/create/{product_id}', 'ItemController@create');
    Route::get('get-all-products', 'ProductController@fetchAllProducts');
    Route::get('fetchAllItems', 'ItemController@fetchAllItems');
    Route::get('get-new-products', 'ProductController@fetchNewProducts');
    Route::get('fetchAllProducts', 'ProductController@fetchAllProducts');
    Route::get('/home', 'HomeController@index');
    Route::get('manage-categories', 'CategoryController@showManageCategories');
    Route::get('manage-brands', 'BrandController@showManageBrands');

    Route::get('carts-clear', function ()
    {
        \Cart::destroy();

        return 'cart-destroyed!';
    });
    Route::get('carts-items-decrease/{identifier}', 'CartController@removeFromCart');
    Route::get('carts-items/{id}', 'CartController@addToCart');
    Route::get('get-items', function ()
    {
        $items = App\Models\Item::all();

        foreach ($items as $item)
        {

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
    Route::get('users/{id}', function ($id)
    {
        $user = App\Models\User::find($id);

        return view('users/showuser', ['user' => $user]);
    })->middleware(['auth']);
    Route::get('products/{category_name}/{brand_name}', function ($category_name, $brand_name)
    {

        $category_id = App\Models\Category::where('name', '=', $category_name)->value('id');

        $brand_id = App\Models\Brand::where('name', '=', $brand_name)->value('id');

        $collections = App\Models\Collection::where('brand_id', $brand_id)->where('category_id', $category_id)->first();

        foreach ($collections->products as $collection)
        {

            foreach ($collection->photos as $photo)
            {
            }
        }
        return view('products.showproducts', ['products' => $collections->products]);
    });
    Route::get('fetch-products/{category_name}/{brand_name}', function ($category_name, $brand_name)
    {

        $category_id = App\Models\Category::where('name', '=', $category_name)->value('id');

        $brand_id = App\Models\Brand::where('name', '=', $brand_name)->value('id');

        $collections = App\Models\Collection::where('brand_id', $brand_id)->where('category_id', $category_id)->first();

        foreach ($collections->products as $collection)
        {

            foreach ($collection->photos as $photo)
            {
            }
        }
        return $collections->products;
    });

    Route::delete('collections/{id}', function ($id)
    {
        $collection = App\Models\Collection::find($id);

        $collection->delete();
    });

    Route::post('oders/checkout', function ()
    {
        $order = new \App\Models\Order();

        $order->user_id = Auth::user()->id;
        $order->status = "Pending";
        $order->save();

        foreach (Cart::contents() as $item)
        {

//            $order->products()->attach($item->id, ['quantity' => $item->quantity]);

        }

        Cart::destroy();

        return redirect('/');

    });
});









