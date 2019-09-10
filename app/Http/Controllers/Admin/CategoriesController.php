<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        //permissions
        if(auth()->user()->can('categories_lists')){
            abort(403); //code //install->php artisan vendor:publish --tag=laravel-errors

        }
        $records = Category::paginate(10);
        return view('admin.categories.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ],[
            'name.required' => 'name is required'
        ]);

        $records = Category::create($request->all());
        // $records = new category;
        // $records->name = $request->name;
        // $records->save();

        flash()->success("added successfully");
        return redirect('admin/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $records = Category::findOrFail($id);
        return view('admin/categories/edit', compact('records'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $records = Category::findOrFail($id);
        $records->update($request->all());
        flash()->success('Edited Successfully');
        return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $records = Category::findOrFail($id);
        $posts  =Post::where('category_id', $records->id);
        $posts->delete();
        
        $records->delete();
        flash()->success('Deleted Successfully');
        return back();
    }
}
