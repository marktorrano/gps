<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

use App\Http\Requests;
use App\Models\Brand;
use App\Models\Collection;
use App\Http\Requests\CreateBrandRequest;
use App\Http\Requests\EditBrandRequest;

class BrandController extends Controller {
    public function __construct()
    {
        $this->middleware('admin', ['only' => ['store', 'create', 'edit', 'update', 'delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $brands = Brand::all();

        return view('brands.showbrands', ['brands' => $brands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.createbrandform');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBrandRequest $request)
    {
        //if request->brand_name exist
        //search for brand_id
        $brand_id = Brand::where('name', $request->name)->value('id');

        if ($brand_id)
        {
            //save to collection
            DB::table('collections')->insert([
                'brand_id'    => $brand_id,
                'category_id' => $request->category_id
            ]);
        } else
        {
            Brand::create($request->all());
            $brand_id = Brand::where('name', $request->name)->value('id');

            DB::table('collections')->insert([
                'brand_id'    => $brand_id,
                'category_id' => $request->category_id
            ]);
        }

        Session::flash('flash_message', 'New Brand has been created');

        return redirect('/');
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
        $brand = Brand::find($id);

        return view('pages.editbrandform', ['brand' => $brand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(EditBrandRequest $request, $id)
    {
        $brand = Brand::find($id);

        $brand->name = $request->name;

        $brand->save();

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
        $collection = Collection::find($id);

        $collection->delete();

        return 'brand deleted';
    }

    public function showManageBrands()
    {
        $brands = Category::all();

        return view('brands/showbrands', ['brands' => $brands]);
    }

}
