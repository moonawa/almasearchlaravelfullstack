<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Reference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index()
     {
         $user = Auth::user();
         $candidat = Candidat::where('user_id', $user->id)->first();
         $reference = Reference::where('candidat_id', $candidat->id)->orderBy('created_at','desc')->paginate(5);   
         return view('references.index', compact('reference'));
     }
     public function indexcount()
     {
               
        $user = Auth::user();
        $candidat = Candidat::where('user_id', $user->id)->first();
        $nombrereference = Reference::where('candidat_id', $candidat->id)->count(); 

        return view('candidatvip.dashboard', compact('nombrereference'));
     }
   
     /**
      * Show the form for creating a new resource.
      */
     public function create()
     {
         return view('references.create');
     }
   
     /**
      * Store a newly created resource in storage.
      */
     public function store(Request $request)
     {
         $user = Auth::user();
         $candidat = Candidat::where('user_id', $user->id)->first();
         $reference = new Reference();
         $reference->nomreferent = $request->nomreferent;
         $reference->mailreferent = $request->mailreferent;
         $reference->telephonereferent = $request->telephonereferent;
         $reference->posteoccupereferent = $request->posteoccupereferent;
         $reference->entreprisereferent = $request->entreprisereferent;
         $reference->candidat_id = $candidat->id;
         $reference->save();
         return redirect()->route('references')->with('success', 'reference ajouté avec  success');
 
     }
   
     /**
      * Display the specified resource.
      */
     public function show(string $id)
     {
         $reference = Reference::findOrFail($id);
         return view('references.show', compact('reference'));
     }
   
     /**
      * Show the form for editing the specified resource.
      */
     public function edit(string $id)
     {
         $reference = Reference::findOrFail($id);
         return view('references.edit', compact('reference'));
     }
   
     /**
      * Update the specified resource in storage.
      */
     public function update(Request $request, string $id)
     {
         $reference = Reference::findOrFail($id);
         $reference->update($request->all());
         return redirect()->route('references')->with('success', 'reference modifié avec success');
     }
   
     /**
      * Remove the specified resource from storage.
      */
     public function destroy(string $id)
     {
         $reference = Reference::findOrFail($id);
         $reference->delete();
         return redirect()->route('references')->with('success', 'reference supprimé ');
     }
}
