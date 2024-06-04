<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\MotCle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MotCleController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $candidat = Candidat::where('user_id', $user->id)->first();
        $motCles = MotCle::orderBy('created_at', 'DESC')->where('candidat_id', $candidat->id)->get();
        $motClescount = MotCle::where('candidat_id', $candidat->id)->count();
  
        return view('motCles.index', compact('motCles', 'motClescount'));
    }
    public function store(Request $request)
    {
        $user = Auth::user();
        $candidat = Candidat::where('user_id', $user->id)->first();
        $motCle = new MotCle();
        $motCle->mot = $request->mot;
        $motCle->candidat_id = $candidat->id;
        $motCle->save();
        return redirect()->route('motCles')->with('success', 'le mot clé a été ajouté avec  success');
        //Langue::create($request->all());

    }
    public function update(Request $request, string $id)
    {
        $motCle = MotCle::findOrFail($id);
        $motCle->update($request->all());
        return redirect()->route('motCles')->with('success', 'le mot clé a été modifié avec success');
    }
    public function destroy(string $id)
    {
        $motCle = MotCle::findOrFail($id);
        $motCle->delete();
        return redirect()->route('motCles')->with('success', 'le mot clé a été supprimé ');
    }
}
