<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posudba;
use App\Models\Clan;
use App\Models\Knjiga;

class PosudbaController extends Controller
{
    public function index()
    {
        $posudbe = Posudba::all();
        return view('posudbe.index', compact('posudbe'));
    }

    public function create()
    {
        $clanovi = Clan::all();

        $knjige=Knjiga::whereDoesntHave('posudbe', function($query)
        {
            $query->whereNull('datum_povratka');
        })->get();

       /* $knjige=Knjiga::whereDoesntHave('posudbe', function($query)
        {
            $query->whereNull('datum_povratka');
        })->select('naslov', 'autor')->get();*/


        return view('posudbe.create', compact('clanovi', 'knjige'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'clan_id' => 'required',
            'knjiga_id' => 'required',
            'datum_posudbe' => 'required|date',
        ]);

        //odabrana knjiga postajeposuđena; posudena=1
        $knjiga=Knjiga::findOrFail($request->input("knjiga_id"));
        $knjiga->posudena=1; //1 znači istina
        $knjiga->save();
        
        Posudba::create($request->all());

        return redirect()->route('posudbe.index')->with('success', 'Posudba je uspjesno dodana');




    }

    public function show($id)
    {
        $posudba = Posudba::findOrFail($id);
        return view('posudbe.show', compact('posudba'));
    }

    public function edit($id)
    {
        $posudba = Posudba::findOrFail($id);
        $clanovi = Clan::all();
        $knjige = Knjiga::all();
        return view('posudbe.edit', compact('posudba', 'clanovi', 'knjige'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'clan_id' => 'required',
        'knjiga_id' => 'required',
        'datum_posudbe' => 'required',
        'datum_povratka' => 'nullable|date', // Dodajte validaciju za datum_povratka
    ]);

    //vracamo knjigu, oznacavamo posudena=0
    if ($request->has('datum_povratka'))
    {
        $knjiga=Knjiga::findOrFail($request->input('knjiga_id'));
        $knjiga->posudena=0;
        $knjiga->save();
    }

    $posudba=Posudba::findOrFail($id);
    $posudba->update($request->all());

    return redirect()->route('posudbe.index')
        ->with('success', 'Posudba je uspješno ažurirana.');
}

    public function destroy($id)
    {
        $posudba = Posudba::findOrFail($id);
        $posudba->delete();

        return redirect()->route('posudbe.index')->with('success', 'Posudba je uspješno obrisana.');
    }
}
