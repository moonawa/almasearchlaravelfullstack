<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Interlocuteurese;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class InterlocuteureseController extends Controller
{
    public function indexoffre()
    {
        $auth = Auth::user(); // Récupérer l'interlocuteur connecté
        $inter = Interlocuteurese::where('user_id', $auth->id)->first();
    
        $entreprise = $inter->entreprise; 
    if ($entreprise) {
        $offres = $entreprise->offres; // Obtenir les offres de l'entreprise
        return view('interlocuteur.offres', compact('offres')); // Passer les offres à la vue
    } else {
        return redirect()->back()->with('error', 'Vous n\'êtes pas associé à une entreprise.');
    }
    }
    public function index()
    {
        $auth = Auth::user(); // Récupérer l'interlocuteur connecté
        $inter = Interlocuteurese::where('user_id', $auth->id)->first();
    
        $entreprise = $inter->entreprise; 
    if ($entreprise) {
        $interlocuteur = $entreprise->interlocuteureses()->latest()->paginate(10); // Obtenir les interlocuteurs de l'entreprise
        $interlocuteurcount = $entreprise->interlocuteureses()->count(); // Obtenir les interlocuteurs de l'entreprise

        return view('entreprises.interlocuteurs', compact('interlocuteur', 'interlocuteurcount')); // Passer les interlocuteurs à la vue
    } else {
        return redirect()->back()->with('error', 'Vous n\'êtes pas associé à une entreprise.');
    }
   
    }

    public function register()
     {
         return view('entreprises/interlocuteurregister');
     }
    public function registerInterlo(Request $request)
    {
        $auth = Auth::user(); // Récupérer l'interlocuteur connecté
        $inter = Interlocuteurese::where('user_id', $auth->id)->first();
        $ese = $inter->entreprise; 
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = 'Entreprise';
        $user->telephone = $request->telephone;
        $user->alma = 0;
        $user->status = 1;
        $user->password = Hash::make($request->password);
        $user->save();

        $inter = new Interlocuteurese();
        $inter->fonction = $request->fonction;
        $inter->user_id = $user->id;
        $inter->entreprise_id = $ese->id;
        $inter->save();
        return redirect()->back()->with('success', 'l utilisateur  a été ajouté avec succès');
    }
}
