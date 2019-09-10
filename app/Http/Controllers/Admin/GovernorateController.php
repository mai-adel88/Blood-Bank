<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Governorate;
use App\City;

class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $records = Governorate::paginate(10);
        return view('admin.governorates.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.governorates.create');
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

        $records = Governorate::create($request->all());
        // $records = new Governorate;
        // $records->name = $request->name;
        // $records->save();

        flash()->success("added successfully");
        return redirect('admin/governorate');
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
        $records = Governorate::findOrFail($id);
        return view('admin/governorates/edit', compact('records'));
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
        $records = Governorate::findOrFail($id);
        $records->update($request->all());
        flash()->success('Edited Successfully');
        return redirect(route('governorate.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $records = Governorate::findOrFail($id);

        $cities = City::where('governorate_id', $records->id);
        $cities->delete();

        $records->delete();
        flash()->success('Deleted Successfully');
        return back();
    }
}
