<?php

namespace App\Http\Controllers;

use App\Models\Cabinet;
use App\Models\Interlocuteurcbt;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class InterlocuteurcbtController extends Controller
{
    
    public function register()
     {
         return view('cabinets/interlocuteurregister');
     }
    public function registerInterlocbt(Request $request)
    {
        $auth = Auth::user();
        $inter = Interlocuteurcbt::where('user_id', $auth->id)->first();
        $cabinet = $inter->cabinet; 
        
        $user = new User();
        $user->name = $request->first_name . ' ' . $request->last_name;
        $user->email = $request->email;
        $user->role = 'Cabinet';
        $user->telephone = $request->telephone;
        $user->alma = 0;
        $user->status = 1;
        $user->password = Hash::make($request->password);
        $user->save();

        $inter = new Interlocuteurcbt();
        $inter->fonctioncbt = $request->fonctioncbt;
        $inter->user_id = $user->id;
        $inter->cabinet_id = $cabinet->id;
        $inter->save();
        return redirect()->back()->with('success', 'l utilisateur  a été ajouté avec succès');
    }
    public function index()
    {
        $auth = Auth::user(); // Récupérer l'interlocuteur connecté
        $inter = Interlocuteurcbt::where('user_id', $auth->id)->first();
    
        $cabinet = $inter->cabinet; 
    if ($cabinet) {
        $interlocuteur = $cabinet->interlocuteurcbts()->latest()->paginate(10); // Obtenir les interlocuteurs du cabinet
        $interlocuteurcount = $cabinet->interlocuteurcbts()->count(); // Obtenir les interlocuteurs du cabinet

        return view('cabinets.interlocuteurs', compact('interlocuteur', 'interlocuteurcount')); // Passer les interlocuteurs à la vue
    } else {
        return redirect()->back()->with('error', 'Vous n\'êtes pas associé à un cabinet.');
    }
}
}
