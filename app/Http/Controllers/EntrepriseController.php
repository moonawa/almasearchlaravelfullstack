<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Interlocuteurese;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entreprise = Entreprise::orderBy('created_at', 'DESC')->painate(10);
        return view('entreprises.index', compact('entreprise'));
    }

    public function show(string $id)
    {
        $auth = Auth::user(); // Récupérer l'interlocuteur connecté
    $entreprise = Interlocuteurese::where('user_id', $auth->id)->findOrFail($id);

    $ese = $entreprise->entreprise; // Obtenir l'entreprise associée

      
        return view('entreprises.show', compact('entreprise', 'ese'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    $entreprise= Entreprise::with('user')->get();
    return view('entreprises.edit', compact('entreprise'));
    }

    public function destroy(string $id)
    {
        $entreprise = Entreprise::findOrFail($id);
        $entreprise->delete();
        return redirect()->route('entreprise')->with('success', 'Le entreprise a été supprimé');
    }

    public function storefile(Request $request)
    {

        $request->validate([
            'ninea' => 'sometimes|mimes:pdf,xlx,csv,docx|max:2048',
            'rc' => 'sometimes|mimes:pdf,xlx,csv,docx|max:2048',

        ],);
        if ($request->hasFile('ninea')) {
        $nineaName = time().'.'.$request->ninea->extension();  
        $request->ninea->move(public_path('uploads'), $nineaName);
        }
        if ($request->hasFile('rc')) {
        $rcName = time().'.'.$request->rc->extension();  
        $request->rc->move(public_path('uploads'), $rcName);
        }
        $auth = Auth::user(); // Récupérer l'interlocuteur connecté
    $inter = Interlocuteurese::where('user_id', $auth->id)->first();

    $entreprise = $inter->entreprise;
        
        $updateData = [];
        if (isset($nineaName)) {
            $updateData['ninea'] = $nineaName;
        }
        if (isset($rcName)) {
            $updateData['rc'] = $rcName;
        }

        $entreprise->update($updateData); 
        return back()->with('success', 'Les fichiers ont  été modifiés avec succès.');
    }
    public function update(Request $request)
    {
  
       
        $user = Auth::user();
        $entreprise = Interlocuteurese::where('user_id', $user->id)->first();
        $ese = $entreprise->entreprise;
        if ($ese) {
            
            $ese->nomentreprise = $request->nomentreprise;
            $ese->emailese = $request->emailese;
            $ese->tel = $request->tel;
            $ese->des = $request->des;
            $ese->secteuractivite = $request->secteuractivite;
         
            $ese->save();
        }
  
    return redirect()->back()->with('success', 'Vos données ont été modifiées avec succès');
       // return redirect()->route('candidatvip')->with('success', ' Vos données sont modifiées avec succes');
    }
    public function logo(Request $request)
    {
  
       
        $user = Auth::user();
        $entreprise = Interlocuteurese::where('user_id', $user->id)->first();
        $ese = $entreprise->entreprise;
        if ($ese) {
            $logoName = null;
            if ($request->hasFile('logo')) {
                $logoName = time().'.'.$request->logo->extension();
                $request->logo->move(public_path('uploads'), $logoName);
            }
            $ese->logo = $logoName;
            $ese->save();
        }
  
    return redirect()->back()->with('success', 'Vos données ont été modifiées avec succès');
       // return redirect()->route('candidatvip')->with('success', ' Vos données sont modifiées avec succes');
    }
}
