<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Facility;
use App\Models\Provider;
use App\Models\Province;
use App\Models\Type;

class FacilitysController extends Controller
{

    public function list()
    {
        return view('facilities.list', [
            'facilities' => Facility::all()
        ]);
    }

    public function addForm()
    {
        return view('facilities.add', [
            'types' => Type::all(),
            'providers' => Provider::all(),
            'provinces' => Province::all(),
        ]);
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'facility_name' => 'required',
            'source_facility_type' => 'required',
            'type_id' => 'required',
            'provider_id' => 'required',
            'street_no' => 'required',
            'street_name' => 'required',
            'postal_code' => 'required',
            'province_id' => 'required',
            'city' => 'required',
            'source_format_address' => 'required',
            'CSD_name' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'status' => 'required',
        ]);

        $facility = new Facility();
        $facility->facility_name = $attributes['facility_name'];
        $facility->source_facility_type = $attributes['source_facility_type'];
        $facility->type_id = $attributes['type_id'];
        $facility->provider_id = $attributes['provider_id'];
        $facility->street_no = $attributes['street_no'];
        $facility->street_name = $attributes['street_name'];
        $facility->postal_code = $attributes['postal_code'];
        $facility->province_id = $attributes['province_id'];
        $facility->city = $attributes['city'];
        $facility->source_format_address = $attributes['source_format_address'];
        $facility->CSD_name = $attributes['CSD_name'];
        $facility->latitude = $attributes['latitude'];
        $facility->longitude = $attributes['longitude'];
        $facility->status = $attributes['status'];

        $facility->user_id = Auth::user()->id;
        $facility->save();

        return redirect('/console/facilities/list')
            ->with('message', 'Facility has been added!');
    }

    public function editForm(Facility $facility)
    {
        return view('facilities.edit', [
            'facility' => $facility,
            'types' => Type::all(),
            'providers' => Provider::all(),
            'provinces' => Province::all(),
        ]);
    }

    public function edit(Facility $facility)
    {
        $attributes = request()->validate([
            'facility_name' => 'required',
            'source_facility_type' => 'required',
            'type_id' => 'required',
            'provider_id' => 'required',
            'street_no' => 'required',
            'street_name' => 'required',
            'postal_code' => 'required',
            'province_id' => 'required',
            'city' => 'required',
            'source_format_address' => 'required',
            'CSD_name' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'status' => 'required',
        ]);

        $facility->facility_name = $attributes['facility_name'];
        $facility->source_facility_type = $attributes['source_facility_type'];
        $facility->type_id = $attributes['type_id'];
        $facility->provider_id = $attributes['provider_id'];
        $facility->street_no = $attributes['street_no'];
        $facility->street_name = $attributes['street_name'];
        $facility->postal_code = $attributes['postal_code'];
        $facility->province_id = $attributes['province_id'];
        $facility->city = $attributes['city'];
        $facility->source_format_address = $attributes['source_format_address'];
        $facility->CSD_name = $attributes['CSD_name'];
        $facility->latitude = $attributes['latitude'];
        $facility->longitude = $attributes['longitude'];
        $facility->status = $attributes['status'];
        $facility->save();

        return redirect('/console/facilities/list')
            ->with('message', 'Facility has been edited!');
    }

    public function delete(Facility $facility)
    {
        
        $facility->delete();
        
        return redirect('/console/facilities/list')
            ->with('message', 'Facility has been deleted!');        
    }

}
