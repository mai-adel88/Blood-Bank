<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Settings;

class SettingsController extends Controller
{
    public function index()
    {
        $records = Settings::paginate(10);
        return view('admin.settings.index',compact('records'));
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = Settings::findOrFail($id); 
        return view('admin/settings/edit', compact('record'));
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
        $record = Settings::findOrFail($id);
        $record->update($request->all());
        
        flash()->success('Edited Successfully');
        return redirect(route('settings.index'));
    }

}
