<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Langue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LangueController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $user = Auth::user();
        $candidat = Candidat::where('user_id', $user->id)->first();
        $langue = Langue::where('candidat_id', $candidat->id)->orderBy('created_at','desc')->paginate(5);
       // $langue = Langue::orderBy('created_at', 'DESC')->get();
  
        return view('langues.index', compact('langue'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('langues.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $candidat = Candidat::where('user_id', $user->id)->first();
        $langue = new Langue();
        $langue->nomlangue = $request->nomlangue;
        $langue->niveaulangue = $request->niveaulangue;
        $langue->candidat_id = $candidat->id;
        $langue->save();
        return redirect()->route('langues')->with('success', 'langue ajouté avec  success');
        //Langue::create($request->all());

    }
  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $langue = Langue::findOrFail($id);
  
        return view('langues.show', compact('langue'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $langue = Langue::findOrFail($id);
  
        return view('langues.edit', compact('langue'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $langue = Langue::findOrFail($id);
  
        $langue->update($request->all());
  
        return redirect()->route('langues')->with('success', 'langue modifié avec success');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $langue = Langue::findOrFail($id);
  
        $langue->delete();
  
        return redirect()->route('langues')->with('success', 'langue supprimé ');
    }
    public function csmcandidat()
    {
        return view('layouts.candidat');
    }
    public function csmcabinet()
    {
        return view('layouts.cabinet');
    }
    public function csmentreprise()
    {
        return view('layouts.entreprise');
    }
}
