<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Province;

class ProvinceController extends Controller
{

    public function list()
    {
        return view('provinces.list', [
            'provinces' => Province::all()
        ]);
    }

    public function addForm()
    {
        return view('provinces.add');
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'province_name' => [
                'required',
                Rule::in(['Toronto', 'British Columbia']),
                Rule::unique('provinces'),
            ],
        ]);

        $province = new Province();
        $province->province_name = $attributes['province_name'];
        $province->save();


        return redirect('/console/provinces/list')
            ->with('message', 'Province has been added!');
    }

    public function editForm(Province $province)
    {
        return view('provinces.edit', [
            'province' => $province,
        ]);
    }

    public function edit(Province $province)
    {

        $attributes = request()->validate([
            'province_name' => [
                'required',
                Rule::in(['Toronto', 'British Columbia']),
                Rule::unique('provinces')->ignore($province->id),
            ],
        ]);

        $province->province_name = $attributes['province_name'];
        $province->save();

        return redirect('/console/provinces/list')
            ->with('message', 'Province has been edited!');
    }

    public function delete(Province $province)
    {
        $province->delete();
        
        return redirect('/console/provinces/list')
            ->with('message', 'Province has been deleted!');        
    }

}
