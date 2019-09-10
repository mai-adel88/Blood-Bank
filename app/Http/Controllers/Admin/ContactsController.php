<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ContactUs;

class ContactsController extends Controller
{
    public function index()
    {
        $records = ContactUs::paginate(10);
        return view('admin.contacts.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.contacts.create');
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
            'name'    => 'required',
            'email'	  => 'required',
            'phone'   => 'required',
            'subject' => 'required',
            'message' => 'required',
        ],[
            'name.required' => 'name is required'
        ]);

        $records = ContactUs::create($request->all());
        // $records = new ContactUs;
        // $records->name = $request->name;
        // $records->save();

        flash()->success("added successfully");
        return redirect('admin/contacts');
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
        $records = ContactUs::findOrFail($id);
        $records->delete();
        flash()->success('Deleted Successfully');
        return back();
    }
}
