<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use DB;

use App\Http\Requests;
use App\Models\Category;
use App\Models\Collection;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\EditCategoryRequest;

class CategoryController extends Controller {
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

        $categories = Category::all();

        foreach ($categories as $category)
        {
            foreach ($category->collections as $collection)
            {
                foreach ($collection->brand as $brand)
                {

                }
            }

        }

        return $categories;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.createcategoryform');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {


        Category::create($request->all());


        return 'created';

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
        $category = Category::find($id);

        return view('pages.editcategoryform', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(EditCategoryRequest $request, $id)
    {
        //
        $category = Category::find($id);

        $category->name = $request->name;

        $category->save();

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
        $categories = Category::where('id', '=', $id);

        $categories->delete();

        return 'deleted';
    }

    public function showManageCategories()
    {

        $categories = Category::all();

        return view('categories/showcategories', ['categories' => $categories]);
    }
}
