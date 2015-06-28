<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $category = Category::create([
            'title' => $request->input('title'),
            'position' => $request->input('position'),
            'color' => $request->input('color')
        ]);
        if($category){
            flash()->success('Category created successfully!');
        }
        else{
            flash()->error('Oops! Something went wrong.');
        }
        return redirect(route('backend'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return $category;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, EditCategoryRequest $request)
    {
        $category = Category::find($id);
        $category->title = $request->title;
        $category->position = $request->position;
        $category->color = $request->color;

        if($category->save()){
            flash()->success('Category updated successfully!');
        }
        else{
            flash()->danger('Oops! Something went wrong.');
        }

        return redirect(route('backend'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        flash()->info('Category deleted successfully.');
        return redirect(route('backend'));
    }
}
