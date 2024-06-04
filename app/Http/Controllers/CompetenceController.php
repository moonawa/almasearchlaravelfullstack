<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Competence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompetenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index()
     {
         $user = Auth::user();
         $candidat = Candidat::where('user_id', $user->id)->first();
         $competence = Competence::where('candidat_id', $candidat->id)->orderBy('created_at', 'desc')->paginate(5);   
         return view('competences.index', compact('competence'));
     }
     public function indexcount()
     {
               
        $user = Auth::user();
        $candidat = Candidat::where('user_id', $user->id)->first();
        $nombrecompetence = Competence::where('candidat_id', $candidat->id)->count(); 

        return view('candidatvip.dashboard', compact('nombrecompetence'));
     }
   
     /**
      * Show the form for creating a new resource.
      */
     public function create()
     {
         return view('competences.create');
     }
   
     /**
      * Store a newly created resource in storage.
      */
     public function store(Request $request)
     {
         $user = Auth::user();
         $candidat = Candidat::where('user_id', $user->id)->first();
         $competence = new Competence();
         $competence->nomcompetence = $request->nomcompetence;
         $competence->niveaucompetence = $request->niveaucompetence;
         $competence->candidat_id = $candidat->id;
         $competence->save();
         return redirect()->route('competences')->with('success', 'competence ajouté avec  success');
 
     }
   
     /**
      * Display the specified resource.
      */
     public function show(string $id)
     {
         $competence = Competence::findOrFail($id);
         return view('competences.show', compact('competence'));
     }
   
     /**
      * Show the form for editing the specified resource.
      */
     public function edit(string $id)
     {
         $competence = Competence::findOrFail($id);
         return view('competences.edit', compact('competence'));
     }
   
     /**
      * Update the specified resource in storage.
      */
     public function update(Request $request, string $id)
     {
         $competence = Competence::findOrFail($id);
         $competence->update($request->all());
         return redirect()->route('competences')->with('success', 'competence modifié avec success');
     }
   
     /**
      * Remove the specified resource from storage.
      */
     public function destroy(string $id)
     {
         $competence = Competence::findOrFail($id);
         $competence->delete();
         return redirect()->route('competences')->with('success', 'competence supprimé ');
     }
}
