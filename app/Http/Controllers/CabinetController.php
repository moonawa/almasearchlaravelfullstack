<?php

namespace App\Http\Controllers;

use App\Models\Cabinet;
use App\Models\Candidat;
use App\Models\Interlocuteurcbt;
use App\Models\Offre;
use App\Models\Proposition;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CabinetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cabinet = Cabinet::orderBy('created_at', 'DESC')->paginate(10);
        return view('cabinets.index', compact('cabinet'));
    }
  
    public function candidat()
    {     
        $user = Auth::user();
        $inter = Interlocuteurcbt::where('user_id', $user->id)->first();
        $cabinet = $inter->cabinet;
        $candidat = $cabinet->candidats()->paginate(10); 
        $candidatcount = $cabinet->candidats()->count(); 
        $propositioncount = Proposition::with('candidat.user')->whereIn('candidat_id', $candidat->pluck('id'))->whereNotNull('selectionproposition')->count();
        $selectioncount = Proposition::with('candidat.user')->whereIn('candidat_id', $candidat->pluck('id'))->whereNotNull('heureproposition')->count();
        $recrutecount = Proposition::with('candidat.user')->whereIn('candidat_id', $candidat->pluck('id'))->where('recruteproposition', 1)->count();

        return view('cabinets.candidatlist', compact('candidat', 'candidatcount', 'propositioncount', 'selectioncount', 'recrutecount'));
    }
    public function proposition()
    {     
        $user = Auth::user();
        $inter = Interlocuteurcbt::where('user_id', $user->id)->first();
        $cabinet = $inter->cabinet;
        $candidat = $cabinet->candidats; 
        $candidatcount = $cabinet->candidats()->count(); 
        $proposition = Proposition::with('candidat.user')->whereIn('candidat_id', $candidat->pluck('id'))->whereNotNull('selectionproposition')->paginate(10);       
        $propositioncount = Proposition::with('candidat.user')->whereIn('candidat_id', $candidat->pluck('id'))->whereNotNull('selectionproposition')->count();
        $selectioncount = Proposition::with('candidat.user')->whereIn('candidat_id', $candidat->pluck('id'))->whereNotNull('heureproposition')->count();
        $recrutecount = Proposition::with('candidat.user')->whereIn('candidat_id', $candidat->pluck('id'))->where('recruteproposition', 1)->count();

        return view('cabinets.proposition', compact('proposition', 'candidatcount', 'propositioncount', 'selectioncount', 'recrutecount'));
    }
    public function selec()
    {     
        $user = Auth::user();
        $inter = Interlocuteurcbt::where('user_id', $user->id)->first();
        $cabinet = $inter->cabinet;
        $candidat = $cabinet->candidats; 
        $candidatcount = $cabinet->candidats()->count();
        $selection = Proposition::with('candidat.user')->whereIn('candidat_id', $candidat->pluck('id'))->whereNotNull('heureproposition')->paginate(10);
        $propositioncount = Proposition::with('candidat.user')->whereIn('candidat_id', $candidat->pluck('id'))->whereNotNull('selectionproposition')->count();
        $selectioncount = Proposition::with('candidat.user')->whereIn('candidat_id', $candidat->pluck('id'))->whereNotNull('heureproposition')->count();
        $recrutecount = Proposition::with('candidat.user')->whereIn('candidat_id', $candidat->pluck('id'))->where('recruteproposition', 1)->count();

        return view('cabinets.selection', compact('selection', 'candidatcount', 'propositioncount', 'selectioncount', 'recrutecount'));
    }
    public function recru()
    {     
        $user = Auth::user();
        $inter = Interlocuteurcbt::where('user_id', $user->id)->first();
        $cabinet = $inter->cabinet;
        $candidat = $cabinet->candidats; 
        $candidatcount = $cabinet->candidats()->count();
        $recrute = Proposition::with('candidat.user')->whereIn('candidat_id', $candidat->pluck('id'))->where('recruteproposition', 1)->paginate(10);
        $propositioncount = Proposition::with('candidat.user')->whereIn('candidat_id', $candidat->pluck('id'))->whereNotNull('selectionproposition')->count();
        $selectioncount = Proposition::with('candidat.user')->whereIn('candidat_id', $candidat->pluck('id'))->whereNotNull('heureproposition')->count();
        $recrutecount = Proposition::with('candidat.user')->whereIn('candidat_id', $candidat->pluck('id'))->where('recruteproposition', 1)->count();

        return view('cabinets.recrute', compact('recrute', 'candidatcount', 'propositioncount', 'selectioncount', 'recrutecount'));
    }
    public function candidatcount()
    {
        $user = Auth::user();
        $inter = Interlocuteurcbt::where('user_id', $user->id)->first();
        $cabinet = $inter->cabinet;
        $intercount = $cabinet->interlocuteurcbts->count();
        $candidat = $cabinet->candidats()->paginate(10); 
        $offre = Offre::where('statuscabinet', 1)->count();
        $offreencours = Offre::where('statuscabinet', 1)->where('statusoffre', 0)->count();
        $offreexpire = Offre::where('statuscabinet', 1)->where('statusoffre', 1)->count();
        $candidatureprop = Proposition::where('selectionproposition', 1)->count();
        $candidatureselec = Proposition::whereNotNull('heureproposition')->count();
        $candidaturerecru = Proposition::where('recruteproposition', 1)->count();

        return view('cabinets.dashboard', compact('intercount', 'candidat', 'offre','offreencours', 'offreexpire', 'candidatureselec', 'candidaturerecru', 'candidatureprop'));
    }
    public function createcandidat()
    {
        return view('cabinets.candidatcreate');
    }
    public function registerSavecandidat(Request $request)
    {
        $request->validate([
            'birthday' => 'nullable|date|before_or_equal:' . \Carbon\Carbon::now()->subYears(18)->format('Y-m-d'),
        ],  [
                'birthday.before_or_equal' => 'Le candidat doit  au moins avoir 18 ans pour etre inscrit.',
         
        ]); 
        $auth = Auth::user();
        $inter = Interlocuteurcbt::where('user_id', $auth->id)->first();
        $cabinet = $inter->cabinet;

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'Candidat',
            'telephone' => $request->telephone,
            'alma' => 0,
            'status' => 0,
            'password' => Hash::make("passer123#"),
        ]);
        $cvName = null;
        if ($request->hasFile('cv')) {
            $cvName = time().'.'.$request->cv->extension();  
            $request->cv->move(public_path('uploads'), $cvName);
        }
        Candidat::create([
            'genre' => $request->genre,
            'disponibilite' => $request->disponibilite,
            'fonction' => $request->fonction,
            'birthday' => $request->birthday,
            'nationnalite' => $request->nationnalite,
            'user_id' => $user->id,
            'cabinet_id' => $cabinet->id,
            'cv' => $cvName,
        ]);
  
        return redirect()->route('candidatcabinet');
    }

    public function show(string $id)
    {
        $user = Auth::user();
        $cabinet = Interlocuteurcbt::where('user_id', $user->id)->findOrFail($id);
        
        return view('cabinets.show', compact('cabinet'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    $cabinet= Cabinet::with('user')->get();
    return view('cabinet.edit', compact('cabinet'));
    }
     /**
     * Update the specified resource in storage.
     */

     public function update(Request $request)
     {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $user = User::find(auth()->user()->id);

        // Vérifiez si le mot de passe actuel est correct
        if (!Hash::check($request->current_password, $user->password)) {
          return back()->withErrors('current_password' , 'Le mot de passe actuel est incorrect.');
       }

        // Mettez à jour le mot de passe de l'utilisateur
        $user->password = Hash::make($request->password);
        $user->save();

       // $user = Auth::user();
       // $cabinet = Cabinet::where('user_id', $user->id)->findOrFail($id);
       // $cabinet->update($request->all());
       // $cabinet->save();
        return redirect()->back()->with('success', 'le mot de passe a été modifié avec succès');
     }
     public function updateinfo(Request $request)
     {
   
        
         $user = Auth::user();
         $cabinet = Interlocuteurcbt::where('user_id', $user->id)->first();
         $cbt = $cabinet->cabinet;
         if ($cbt) {
             $logoName = null;
             if ($request->hasFile('logocbt')) {
                 $logoName = time().'.'.$request->logocbt->extension();
                 $request->logocbt->move(public_path('uploads'), $logoName);
             }
             $cbt->nomcabinet = $request->nomcabinet;
             $cbt->emailcbt = $request->emailcbt;
             $cbt->telcbt = $request->telcbt;
             $cbt->descabinet = $request->descabinet;
             $cbt->secteuractivitecabinet = $request->secteuractivitecabinet;
             $cbt->logocbt = $logoName;
             $cbt->save();
         }
   
     return redirect()->back()->with('success', 'Vos données ont été modifiées avec succès');
        // return redirect()->route('candidatvip')->with('success', ' Vos données sont modifiées avec succes');
     }
     /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cabinet = Cabinet::findOrFail($id);
        $cabinet->delete();
        return redirect()->route('cabinet')->with('success', 'Le cabinet a été supprimé');
    }
    public function destroycandidat(string $id)
    {
        $user = Auth::user();
        $inter = Interlocuteurcbt::where('user_id', $user->id)->first();
        $cabinet = $inter->cabinet;
        $candidat = $cabinet->candidats()->findOrFail($id);
$candidat->delete();
        return redirect()->route('candidatcabinet')->with('success', 'Le candidat a été supprimé');
    }
    

    public function showImportForm()
    {
        return view('cabinets.importcandidat');
    }

    public function import(Request $request)
    {
        // Validation du fichier
        $request->validate([
            'file' => 'required|mimes:csv,txt|max:2048',
        ]);

        try {
            // Lecture du fichier CSV
            $file = $request->file('file');
            $data = array_map('str_getcsv', file($file));

            // Import des candidats
            foreach ($data as $row) {
                
                Candidat::create([
                    'nom' => $row[0],
                    'prenom' => $row[1],
                    'email' => $row[2],
                    // Ajoutez d'autres champs selon votre modèle Candidat
                ]);
            }

            return back()->with('success', 'Les candidats ont été importés avec succès.');
        } catch (Exception $e) {
            return back()->with('error', 'Une erreur s\'est produite lors de l\'importation des candidats : ' . $e->getMessage());
        }
    }

    public function storefile(Request $request)
    {

        $request->validate([
            'nineacabinet' => 'sometimes|mimes:pdf,xlx,csv,docx|max:2048',
            'rccabinet' => 'sometimes|mimes:pdf,xlx,csv,docx|max:2048',

        ],);
        if ($request->hasFile('nineacabinet')) {
        $nineacabinetName = time().'.'.$request->nineacabinet->extension();  
        $request->nineacabinet->move(public_path('uploads'), $nineacabinetName);
        }
        if ($request->hasFile('rccabinet')) {
        $rccabinetName = time().'.'.$request->rccabinet->extension();  
        $request->rccabinet->move(public_path('uploads'), $rccabinetName);
        }
        $user = Auth::user();
        $inter = Interlocuteurcbt::where('user_id', $user->id)->first();
        $cabinet = $inter->cabinet()->firstOrFail();
        $updateData = [];
        if (isset($nineacabinetName)) {
            $updateData['nineacabinet'] = $nineacabinetName;
        }
        if (isset($rccabinetName)) {
            $updateData['rccabinet'] = $rccabinetName;
        }

        $cabinet->update($updateData); 
        return back()->with('success', 'Les fichiers ont  été modifiés avec succès.');
    }
    
}
