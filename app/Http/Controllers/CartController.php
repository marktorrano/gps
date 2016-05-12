<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Item;
use Moltin\Cart\Cart;

use App\Http\Requests;

class CartController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $carts = \Cart::contents();

        return view('cart.showcart', ['carts' => json_encode($carts)]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    //TODO increase and decrease quantity on cart
    public function addToCart($id)
    {
        $item = Item::findOrFail($id);

        foreach ($item->photos as $photo)
        {

        }

        $item = [
            'id'       => $item->id,
            'name'     => $item->name,
            'quantity' => '1',
            'price'    => $item->price,
            'photo'    => $photo->path
        ];

        if (\Cart::insert($item))
        {
            return 'inserted';
        } else
            return 'failed';
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
