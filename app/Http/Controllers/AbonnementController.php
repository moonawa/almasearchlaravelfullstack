<?php

namespace App\Http\Controllers;

use App\Models\Abonnement;
use Illuminate\Http\Request;

class AbonnementController extends Controller
{
    public function indexcandidat()
    {
        $abonnements = Abonnement::where('nom_abonnement', "Candidat")->get();
        return view('moonawahomecandidat', compact('abonnements'));
    }
    public function indexcabinet()
    {
        $abonnements = Abonnement::where('nom_abonnement', "Cabinet")->get();
        return view('moonawahomecabinet', compact('abonnements'));
    }
    public function indexentreprise()
    {
        $abonnements = Abonnement::where('nom_abonnement', "Entreprise")->get();
        return view('moonawahome', compact('abonnements'));
    }
    public function indexadmincandidat()
    {
        $abonnements = Abonnement::where('nom_abonnement', "Candidat")->orderBy('created_at', 'DESC')->get();
        return view('abonnements.candidat', compact('abonnements'));
    }
    public function indexadmincabinet()
    {
        $abonnements = Abonnement::where('nom_abonnement', "Cabinet")->orderBy('created_at', 'DESC')->get();
        return view('abonnements.cabinet', compact('abonnements'));
    }
    public function indexadminEntreprise()
    {
        $abonnements = Abonnement::where('nom_abonnement', "Entreprise")->orderBy('created_at', 'DESC')->get();
        return view('abonnements.entreprise', compact('abonnements'));
    }

    public function store(Request $request)
    {
        $abonnement = new Abonnement();
        $abonnement->nom_abonnement = $request->nom_abonnement;
        $abonnement->prix = $request->prix;
        $abonnement->duree = $request->duree;
        $abonnement->description = $request->description;
        $abonnement->type = $request->type;
        $abonnement->formule = $request->formule;
        $abonnement->save();
        return back()->with('success', 'Abonnement ajouté.');

    }
    public function update(Request $request, string $id)
    {
        $abonnement = Abonnement::findOrFail($id);
        $abonnement->update($request->all());
        return back()->with('success', 'Abonnement Mofifié.');
    }
    public function destroy(string $id)
    {
        $abonnement = Abonnement::findOrFail($id);
        $abonnement->delete();
        return back()->with('success', 'Abonnement supprimé.');
    }
}
