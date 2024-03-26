<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('candidatvip.profil');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {

        //  if ($request->hasFile('avatar')) {
        //  $path = $request->file('avatar')->store('avatars');

        // Récupérer l'utilisateur authentifié
        //   $can = User::find(auth()->user()->id);

        // Mettre à jour le chemin de la photo de profil de l'utilisateur
        //   $can->avatar_path = $path;
        //   $can->save();
        //  return back()->with('success', 'La photo a été modifiée avec succés.');

        //}
        //2eme methode
        $request->validate([
            'avatar' => 'sometimes|image|max:3000',
        ]);
        $imagePath = request('avatar')->store('avatars', 'public');

       // $avatarName = time() . '.' . $request->avatar->getClientOriginalExtension();
       // $request->avatar->move(public_path('avatars'), $avatarName);

      //  Auth()->user()->update(['avatar' => $avatarName]);

       // return back()->with('success', 'La photo a été modifiée avec succés.');
    }
}
