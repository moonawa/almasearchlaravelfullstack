<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index()
     {
         $user = Auth::user();
         $candidat = Candidat::where('user_id', $user->id)->first();
         $experience = Experience::where('candidat_id', $candidat->id)->get();   
         return view('experiences.index', compact('experience'));
     }
     public function indexcount()
     {
               
        $user = Auth::user();
        $candidat = Candidat::where('user_id', $user->id)->first();
        $nombreexperience = Experience::where('candidat_id', $candidat->id)->count(); 

        return view('candidatvip.dashboard', compact('nombreexperience'));
     }
   
     /**
      * Show the form for creating a new resource.
      */
     public function create()
     {
         return view('experiences.create');
     }
   
     /**
      * Store a newly created resource in storage.
      */
     public function store(Request $request)
     {
         $user = Auth::user();
         $candidat = Candidat::where('user_id', $user->id)->first();
         $experience = new Experience();
         $experience->entrepriseexperience = $request->entrepriseexperience;
         $experience->missionexperience = $request->missionexperience;
         $experience->posteexperience = $request->posteexperience;
         $experience->datedebutexperience = $request->datedebutexperience;
         $experience->datefinexperience = $request->datefinexperience;
         $experience->candidat_id = $candidat->id;
         $experience->save();
         return redirect()->route('experiences')->with('success', 'experience ajouté avec  success');
 
     }
   
     /**
      * Display the specified resource.
      */
     public function show(string $id)
     {
         $experience = Experience::findOrFail($id);
         return view('experiences.show', compact('experience'));
     }
   
     /**
      * Show the form for editing the specified resource.
      */
     public function edit(string $id)
     {
         $experience = Experience::findOrFail($id);
         return view('experiences.edit', compact('experience'));
     }
   
     /**
      * Update the specified resource in storage.
      */
     public function update(Request $request, string $id)
     {
         $experience = Experience::findOrFail($id);
         $experience->update($request->all());
         return redirect()->route('experiences')->with('success', 'experience modifié avec success');
     }
   
     /**
      * Remove the specified resource from storage.
      */
     public function destroy(string $id)
     {
         $experience = Experience::findOrFail($id);
         $experience->delete();
         return redirect()->route('experiences')->with('success', 'experience supprimé ');
     }
}
