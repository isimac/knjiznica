<?php

namespace App\Http\Controllers;
use App\Models\Knjiga;

use Illuminate\Http\Request;

class KnjigaController extends Controller
{
    
public function index()
{
    $knjige = Knjiga::all();
    return view('knjige.index', compact('knjige'));
}

public function create()
{
    return view('knjige.create');
}

public function store(Request $request)
{
    $request->validate([
        'naslov' => 'required',
        'autor' => 'required',
        'godina_izdanja' => 'required|integer'
    ]);

    Knjiga::create($request->all());

    return redirect()->route('knjige.index')
        ->with('success', 'Knjiga je uspješno dodana.');
}

public function show($id)
{
    $knjiga = Knjiga::findOrFail($id);
    return view('knjige.show', compact('knjiga'));
}

public function edit($id)
{
    $knjiga = Knjiga::findOrFail($id);
    return view('knjige.edit', compact('knjiga'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'naslov' => 'required',
        'autor' => 'required',
        'godina_izdanja' => 'required|integer'
    ]);

    $knjiga = Knjiga::findOrFail($id);
    $knjiga->update($request->all());

    return redirect()->route('knjige.index')
        ->with('success', 'Knjiga je uspješno ažurirana.');
}

public function destroy($id)
{
    $knjiga = Knjiga::findOrFail($id);
    $knjiga->delete();

    return redirect()->route('knjige.index')
        ->with('success', 'Knjiga je uspješno obrisana.');
}
}
