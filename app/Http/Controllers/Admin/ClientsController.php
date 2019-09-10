<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Client::paginate(10);
        return view('admin.clients.index',compact('records'));
    }

    public function active($id)
    {
        $record = Client::findOrFail($id);
        $record->is_active = 1;
        //$request->has('is_active') ? toggle('is_active') : 0 ;
        $record->save();
        flash()->success('تم التفعيل بنجاح');
        return back();
    }

    public function deActive($id)
    {
        $record = Client::findOrFail($id);
        $record->is_active = 0;
        //$request->has('is_active') ? toggle('is_active') : 0 ;
        $record->save();
        flash()->success('تم اليقاف');
        return back();
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $records = Client::findOrFail($id);
        $records->delete();
        flash()->success('Deleted Successfully');
        return back();
    }
}
