<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Type;

class TypesController extends Controller
{

    public function list()
    {
        return view('types.list', [
            'types' => Type::all()
        ]);
    }

    public function addForm()
    {

        return view('types.add');
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'ODCAF_name' => 'required|string',
            'color' => 'required|string|max:7|unique:types,color',
            'description' => 'required|string',
        ]);

        $type = new Type();
        $type->ODCAF_name = $attributes['ODCAF_name'];
        $type->color = $attributes['color'];
        $type->description = $attributes['description'];

        $type->save();

        return redirect('/console/types/list')
            ->with('message', 'Type has been added!');
    }

    public function editForm(Type $type)
    {
        return view('types.edit', [
            'type' => $type,
        ]);
    }

    public function edit(Type $type)
    {

        $attributes = request()->validate([
            'ODCAF_name' => 'required',
            'color' => ['required', 'string', 'max:7', Rule::unique('types', 'color')->ignore($type->id)],
            'description' => 'required|string',
        ]);

        $type->ODCAF_name = $attributes['ODCAF_name'];
        $type->color = $attributes['color'];
        $type->description = $attributes['description'];
        $type->save();

        return redirect('/console/types/list')
            ->with('message', 'Type has been edited!');
    }

    public function delete(Type $type)
    {
        $type->delete();
        
        return redirect('/console/types/list')
            ->with('message', 'Type has been deleted!');        
    }

}
