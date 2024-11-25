<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PokemonController extends Controller
{
    public function index()
    {
        $pokemons = Pokemon::all();
        return view('pokemons.index', compact('pokemons'));
    }

    public function create()
    {
        Gate::authorize('create', Pokemon::class);

        $coaches= Coach::all();
        return view('pokemons.create', compact('coaches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'power' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $pokemon = new Pokemon();
        $pokemon->name = $request->name;
        $pokemon->type = $request->type;
        $pokemon->power = $request->power;
        $pokemon->image = 'images/'.$imageName;
        $pokemon->coach_id = $request->coach_id;
        $pokemon->save();

        return redirect('pokemons')->with('success', 'Pokemon created successfully.');
    }

    public function edit($id)
    {
        $pokemon = Pokemon::findOrFail($id);
        $coaches = Coach::all();
        return view('pokemons.edit', compact('pokemon', 'coaches'));
    }

    public function update(Request $request, $id)
    {

        Gate::authorize('update', Pokemon::class);

        $pokemon = Pokemon::findOrFail($id);
        $pokemon->update($request->all());


        $pokemon->name = $request->name;
        $pokemon->type = $request->type;
        $pokemon->power = $request->power;

        if(!is_null($request->image)){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $pokemon->image = 'images/'.$imageName;
        }
        $pokemon->save();
        return redirect('pokemons')->with('success', 'Pokemon updated successfully.');
    }

    public function destroy($id)
    {
        Gate::authorize('destroy', Pokemon::class);

        $pokemon = Pokemon::findOrFail($id);
        $pokemon->delete();
        return redirect('pokemons')->with('success', 'Pokemon deleted successfully.');
    }
}
