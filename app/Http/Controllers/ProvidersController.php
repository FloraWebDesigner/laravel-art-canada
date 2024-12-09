<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Provider;

class ProvidersController extends Controller
{

    public function list()
    {
        return view('providers.list', [
            'providers' => Provider::all()
        ]);
    }

    public function addForm()
    {
        return view('providers.add');
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'provider_name' => 'required|string',
            'dataset' => 'required|string',
            'territory' => 'required|in:Toronto,British Columbia',
            'link' => 'required|url',
            'last_updated' => 'required|date',
        ]);

        $provider = new Provider();
        $provider->provider_name = $attributes['provider_name'];
        $provider->dataset = $attributes['dataset'];
        $provider->territory = $attributes['territory'];
        $provider->link = $attributes['link'];
        $provider->last_updated = $attributes['last_updated'];

        $provider->save();

        return redirect('/console/providers/list')
            ->with('message', 'Provider has been added!');
    }

    public function editForm(Provider $provider)
    {
        return view('providers.edit', [
            'provider' => $provider,
        ]);
    }

    public function edit(Provider $provider)
    {

        $attributes = request()->validate([
            'provider_name' => 'required|string',
            'dataset' => 'required|string',
            'territory' => 'required|in:Toronto,British Columbia',
            'link' => 'required|url',
            'last_updated' => 'required|date',
        ]);

        $provider->provider_name = $attributes['provider_name'];
        $provider->dataset = $attributes['dataset'];
        $provider->territory = $attributes['territory'];
        $provider->link = $attributes['link'];
        $provider->last_updated = $attributes['last_updated'];

        $provider->save();

        return redirect('/console/providers/list')
            ->with('message', 'Provider has been edited!');
    }

    public function delete(Provider $provider)
    {
        $provider->delete();
        
        return redirect('/console/providers/list')
            ->with('message', 'Provider has been deleted!');        
    }

}
