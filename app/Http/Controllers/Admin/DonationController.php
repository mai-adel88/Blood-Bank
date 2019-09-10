<?php

namespace App\Http\Controllers\Admin;

use Cornford\Googlemapper\Facades\MapperFacad;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DonationRequest;
use App\City;
use App\BloodType;
use Mapper;

class DonationController extends Controller
{
	public function index()
    {
        $records = DonationRequest::paginate(5);
        return view('admin.donations.index',compact('records'));
    }


    //ــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ
    public function create()
    {
        $cities = City::get();
        $blood_types = BloodType::get();

        return view('admin.donations.create', compact('cities', 'blood_types'));
    }


    //ــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ
    public function store(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required',
            'phone' => 'required',
            'hospital_name' => 'required',
            'hospital_address' => 'required',
            'num_of_bag' => 'required',
            'age' => 'required',
            'notes' => 'required',
        ]);

        $records = DonationRequest::create($request->all());


        flash()->success("added successfully");
        return redirect('admin/donation');
    }



    //ــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ
    public function show($id)
    {
        $records = DonationRequest::findOrFail($id);
         //dd($records);
        return view('admin/donations/show', compact('records'));
    }



    //ـــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ
    public function edit($id)
    {
        $records = DonationRequest::findOrFail($id);
        return view('admin/donations/edit', compact('records'));
    }



    //ـــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ
    public function update(Request $request, $id)
    {
        $records = DonationRequest::findOrFail($id);
        $records->update($request->all());
        flash()->success('Edited Successfully');
        return redirect(route('donation.index'));
    }



    //ــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ
    public function destroy($id)
    {
        $records = DonationRequest::findOrFail($id);
        $records->delete();
        flash()->success('Deleted Successfully');
        return redirect(route('donation.index'));
    }

    public function setMap()
    {
        Mapper::map(53.381128999999990000, -1.470085000000040000);
        

        return view('donations.show');
    }
}