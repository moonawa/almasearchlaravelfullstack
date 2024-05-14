<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidat = Candidat::orderBy('created_at', 'DESC')->get();
        return view('candidatvip.index', compact('candidat'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Auth::user();
        $can = Candidat::where('user_id', $user->id)->findOrFail($id);
        //$candidat = Candidat::findOrFail($id);
        return view('candidatvip.show', compact('can'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //$candidat = Candidat::findOrFail($id);
    $candidat= Candidat::with('user')->get();
        return view('candidatvip.edit', compact('candidat'));
    }
  
    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        //$candidat = Candidat::findOrFail($id);
       // $candidat->update($request->all());
        $user = Auth::user();
        $can = Candidat::where('user_id', $user->id)->findOrFail($id);
        if ($can) {
            $can->user->email = $request->email;
            $can->user->save();
        }
            $can->update($request->all());

    // Enregistrer les modifications
    $can->save();
    return redirect()->back()->with('success', 'Vos données ont été modifiées avec succès');
       // return redirect()->route('candidatvip')->with('success', ' Vos données sont modifiées avec succes');
    }

    public function storeavatar(Request $request)
    {

       // if ($request->hasFile('avatar')) {
           // $path = $request->file('avatar')->store('avatars');
         //   $path = $request->avatar->move(public_path('avatars'));

    
            // Récupérer l'utilisateur authentifié
         //   $user = User::find(auth()->user()->id);
    
            // Mettre à jour le chemin de l'avatar de l'utilisateur
         //   $user->avatar = $path; // Utilisez le nom de la colonne dans votre base de données
         //   $user->save();
        //}
        $request->validate([
            'avatar' => 'required|image',
        ]);
  
        $avatarName = time().'.'.$request->avatar->getClientOriginalExtension();
        $request->avatar->move(public_path('avatars'), $avatarName);
        $user = User::find(auth()->user()->id);
        $user->update(['avatar'=>$avatarName]);
  
        return back()->with('success', 'La photo a été modifiée avec succès.');
    }

    public function storefile(Request $request)
    {

        $request->validate([
            'cv' => 'sometimes|mimes:pdf,xlx,csv,docx|max:2048',
            'motivation' => 'sometimes|mimes:pdf,xlx,csv,docx|max:2048',

        ], [
            'cv.max' => 'La taille maximale autorisée pour le CV est de 2 Mo.',
            'motivation.max' => 'La taille maximale autorisée pour la lettre de motivation est de 2 Mo.',
        ]);
        if ($request->hasFile('cv')) {
        $cvName = time().'.'.$request->cv->extension();  
        $request->cv->move(public_path('uploads'), $cvName);
        }
        if ($request->hasFile('motivation')) {
        $motivationName = time().'.'.$request->motivation->extension();  
        $request->motivation->move(public_path('uploads'), $motivationName);
        }
        $user = Auth::user();
        $can = Candidat::where('user_id', $user->id)->firstOrFail();

        $updateData = [];
        if (isset($cvName)) {
            $updateData['cv'] = $cvName;
        }
        if (isset($motivationName)) {
            $updateData['motivation'] = $motivationName;
        }

        $can->update($updateData);
        //  $can->update(['cv'=>$cvName, 'motivation'=>$motivationName]);
 
        return back()->with('success', 'Le cv et la lettre de motivation ont  été modifiée avec succès.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $candidat = Candidat::findOrFail($id);
  
        $candidat->delete();
  
        return redirect()->route('candidatvip')->with('success', 'Le candidat a été supprimé');
    }
    
// afficher un cv detaille candidat : pour pour un candidat 
public function showcvdetaille(string $id)
{
    $user = Auth::user();
   $can = Candidat::with('user', 'competences', 'experiences', 'formations', 'langues', 'references')->where('user_id', $user->id)->findOrFail($id);
   return view('candidatvip.showcvdetaille', compact('can'));
}
    

}