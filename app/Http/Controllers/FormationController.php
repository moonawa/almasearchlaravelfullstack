<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Candidature;
use App\Models\Competence;
use App\Models\Experience;
use App\Models\Formation;
use App\Models\Langue;
use App\Models\Reference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index()
     {
         $user = Auth::user();
         $candidat = Candidat::where('user_id', $user->id)->first();
         $formation = Formation::where('candidat_id', $candidat->id)->get();   
         return view('formations.index', compact('formation'));
     }

     public function indexcount()
     {
        $user = Auth::user();
        $candidat = Candidat::where('user_id', $user->id)->first();
        $nombreformation = Formation::where('candidat_id', $candidat->id)->count(); 
        $nombrereference = Reference::where('candidat_id', $candidat->id)->count(); 
        $nombrecompetence = Competence::where('candidat_id', $candidat->id)->count(); 
        $nombreexperience = Experience::where('candidat_id', $candidat->id)->count(); 
        $nombrelangue = Langue::where('candidat_id', $candidat->id)->count(); 
        $candidatures = Candidature::with('offre.entreprise.user')->where('candidat_id', $candidat->id)->whereNotNull('heurecandidature')->count();
        $recrute = Candidature::with('offre.entreprise.user')->where('candidat_id', $candidat->id)->where('recrute', 1)->count();
        $decline = Candidature::with('offre.entreprise.user')->where('candidat_id', $candidat->id)->where('decline', 1)->count();
        $encours = Candidature::with('offre.entreprise.user')
    ->where('candidat_id', $candidat->id)->where('recrute', 0)
    ->where('decline', 0)
    ->whereHas('offre', function ($query) {
            $query->where('statusoffre', 0);
            })->count();

        return view('candidatvip.dashboard', compact('nombreformation', 'nombrereference', 'nombrecompetence', 'nombreexperience', 'nombrelangue', 'candidatures', 'recrute', 'decline', 'encours'));
     }
   
     /**
      * Show the form for creating a new resource.
      */
     public function create()
     {
         return view('formations.create');
     }
   
     /**
      * Store a newly created resource in storage.
      */
     public function store(Request $request)
     {
         $user = Auth::user();
         $candidat = Candidat::where('user_id', $user->id)->first();
         $formation = new Formation();
         $formation->nomformation = $request->nomformation;
         $formation->etablissementformation = $request->etablissementformation;
         $formation->anneeacademique = $request->anneeacademique;
         $formation->datedebutformation = $request->datedebutformation;
         $formation->datefinformation = $request->datefinformation;
         $formation->niveauformation = $request->niveauformation;
         $formation->candidat_id = $candidat->id;
         $formation->save();
         return redirect()->route('formations')->with('success', 'formation ajouté avec  success');
 
     }
   
     /**
      * Display the specified resource.
      */
     public function show(string $id)
     {
         $formation = Formation::findOrFail($id);
         return view('formations.index', compact('formation'));
     }
   
     /**
      * Show the form for editing the specified resource.
      */
     public function edit(string $id)
     {
         $formation = Formation::findOrFail($id);
         return view('formations.edit', compact('formation'));
     }
   
     /**
      * Update the specified resource in storage.
      */
     public function update(Request $request, string $id)
     {
         $formation = Formation::findOrFail($id);
         $formation->update($request->all());
         return redirect()->route('formations')->with('success', 'formation modifié avec success');
     }
   
     /**
      * Remove the specified resource from storage.
      */
     public function destroy(string $id)
     {
         $formation = Formation::findOrFail($id);
         $formation->delete();
         return redirect()->route('formations')->with('success', 'formation supprimé ');
     }
}
