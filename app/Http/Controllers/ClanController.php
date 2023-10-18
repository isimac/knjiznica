<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clan;

class ClanController extends Controller
{
    /**
     * Prikazuje popis svih članova.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clanovi = Clan::all();
        return view('clanovi.index', compact('clanovi'));
    }

    /**
     * Prikazuje formu za stvaranje novog člana.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clanovi.create');
    }

    /**
     * Sprema novog člana u bazu podataka.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ime' => 'required',
            'prezime' => 'required',
            'clanski_broj' => 'required|unique:clans'
        ]);

        Clan::create($request->all());

        return redirect()->route('clanovi.index')
            ->with('success', 'Član je uspješno dodan.');
    }

    /**
     * Prikazuje pojedinog člana.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clan = Clan::findOrFail($id);
        return view('clanovi.show', compact('clan'));
    }

    /**
     * Prikazuje formu za uređivanje člana.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clan = Clan::findOrFail($id);
        return view('clanovi.edit', compact('clan'));
    }

    /**
     * Ažurira člana u bazi podataka.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'ime' => 'required',
            'prezime' => 'required',
            'clanski_broj' => 'required|unique:clans,clanski_broj,'.$id
        ]);

        $clan = Clan::findOrFail($id);
        $clan->update($request->all());

        return redirect()->route('clanovi.index')
            ->with('success', 'Član je uspješno ažuriran.');
    }

    /**
     * Briše člana iz baze podataka.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clan = Clan::findOrFail($id);
        $clan->delete();

        return redirect()->route('clanovi.index')->with('success', 'Član je uspješno obrisan.');
    }
}
