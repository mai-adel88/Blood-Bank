<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\City;
use App\Governorate;


class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = City::paginate(6);
        return view('admin.cities.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $governorates = Governorate::get();
        return view('admin.cities.create', compact('governorates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = [
            'name' => 'required'
            
        ]; 
        $input = $request->all();

        $validator = \Validator::make($input, $validator);

        $records = City::create($input);
        // $records = new City;
        // $records->name = $request->name;
        // $records->save();

        flash()->success("added successfully");
        return redirect('admin/city');
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
        $records = City::findOrFail($id);
        $governorates = Governorate::get();

        return view('admin/cities/edit', compact('records', 'governorates'));
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
        $records = City::findOrFail($id);
        $records->update($request->all());
        flash()->success('Edited Successfully');
        return redirect(route('city.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $records = City::findOrFail($id);
        $records->delete();
        flash()->success('Deleted Successfully');
        return back();
    }
}
