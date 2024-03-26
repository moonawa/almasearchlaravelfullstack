<?php

namespace App\Http\Controllers;

use App\Models\Cabinet;
use App\Models\Candidat;
use App\Models\Candidature;
use App\Models\Entreprise;
use App\Models\Interlocuteur;
use App\Models\Offre;
use App\Models\Proposition;
use App\Models\User;
use App\Notifications\AdminCandidatureNotification;
use App\Notifications\AppelCandidatureNotification;
use App\Notifications\PropositionCandidatureNotification;
use App\Notifications\RecruteCandidatureNotification;
use App\Notifications\SelectionCandidatureNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    // list des offres pour l'entreprise
    public function index()
    {
        $user = Auth::user();
        $entreprise = Entreprise::where('user_id', $user->id)->first();
        $offre = Offre::where('entreprise_id', $entreprise->id)->get();
        return view('offres.index', compact('offre'));
    }
     //le nombre d'offre pour l'entreprise
     public function indexcount()
     {
         $user = Auth::user();
         $entreprise = Entreprise::where('user_id', $user->id)->first();
         $offres = Offre::where('entreprise_id', $entreprise->id)->get();

         $offre = Offre::where('entreprise_id', $entreprise->id)->count();
         $encours = Offre::where('entreprise_id', $entreprise->id)->where('statusoffre', 0)->count();
         $expires = Offre::where('entreprise_id', $entreprise->id)->where('statusoffre', 1)->count();


        $candidatures = Candidature::whereIn('offre_id', $offres->pluck('id'))->whereNotNull('heurecandidature')->count();
        $recrutes = Candidature::whereIn('offre_id', $offres->pluck('id'))->where('recrute', 1)->count();
        $proposition = Proposition::whereIn('offre_id', $offres->pluck('id'))->whereNotNull('selectionproposition')->count();
        $recrutesproposition = Proposition::whereIn('offre_id', $offres->pluck('id'))->where('recruteproposition', 1)->count();

        // $request->session()->put('candidatureCount', $candidatures);
         return view('entreprises.dashboard', compact('offre', 'encours' , 'expires', 'candidatures', 'recrutes', 'proposition', 'recrutesproposition'));
     }
     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('offres.create');
    }
/**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'datedebut' => 'nullable|date|after:tomorrow',
            'datecloture' => 'required|date|after:tomorrow', 
        ], [
            'datedebut.after' => 'La date de prise de service doit être postérieure à la date d\'aujourd\'hui.',
            'datecloture.after' => 'La date de clôture doit être postérieure à la date d\'aujourd\'hui.',
        ]);
        $user = Auth::user();
        $entreprise = Entreprise::where('user_id', $user->id)->first();
        $offre = new Offre();
        $offre->nomposte = $request->nomposte;
        $offre->description = $request->description;
        $offre->nombredeposte = $request->nombredeposte;
        $offre->annexperience = $request->annexperience;
        $offre->salaire = $request->salaire;
        $offre->datedebut = $request->datedebut;
        $offre->lieu = $request->lieu;
        $offre->typecontrat = $request->typecontrat;
        $offre->datecloture = $request->datecloture;
        $offre->entreprise_id = $entreprise->id;
        $offre->statusoffre = 0;
        $offre->statuscabinet = 0;
        $offre->competenceoffre = $request->competenceoffre;
        $offre->typeeoffre = $request->typeeoffre;
        $offre->save();
        return redirect()->route('offres')->with('success', 'experience ajouté avec  success');
    }
    /**
     * Display the specified resource.
    */
    // afficher un offre pour une entreprise et selectionner des candidats
    public function show(string $id)
    {
        $user = Auth::user();
        $entreprise = Entreprise::where('user_id', $user->id)->first();
        $offre = Offre::where('entreprise_id', $entreprise->id)->findOrFail($id);
        $candidats = Candidat::with('user', 'competences', 'experiences', 'formations', 'langues')->where('cabinet_id', null)->get();
        $candidatures = Candidature::with('candidat.user')->where('offre_id', $offre->id)->get();
        return view('offres.show', compact('offre', 'candidats', 'candidatures'));
    }
//liste des propositions  d'une offre pour l'entreprise
public function indexproposition($id)
{
    $user = Auth::user();
    $entreprise = Entreprise::where('user_id', $user->id)->first();
    $offre = Offre::where('entreprise_id', $entreprise->id)->findOrFail($id);
    $propositions = Proposition::with('candidat.cabinet')->where('offre_id', $offre->id)->get();
    return view('offres.getcandidat', compact('propositions', 'offre'));
}
//ajout dans la table candidature: entreprise
public function getcandidatstore(Request $request)
{
    $request->validate([
        'offre_id' => 'required|exists:offres,id',
        'candidat_id' => 'required|exists:candidats,id',
    ]);

    $candidature = Candidature::create([
        'offre_id' => $request->offre_id,
        'candidat_id' => $request->candidat_id,
        'selection' => 1,
        'recrute' => 0,
        'decline' => 0,
    ]);
    return redirect()->back()->with('success', 'le candidat a été ajouté avec succès');
}
//ajout en meme temps  dans la table proposition et candidat pour cabinet
public function propositionstoreshow(Request $request)
{
  
        $auth = Auth::user();
        $cabinet = Cabinet::where('user_id', $auth->id)->first();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'Candidat',
            'telephone' => $request->telephone,
            'alma' => 0,
            'status' => 0,
            'password' => Hash::make("passer123"),
        ]);
        $cvName = null;
        if ($request->hasFile('cv')) {
            $cvName = time().'.'.$request->cv->extension();  
            $request->cv->move(public_path('uploads'), $cvName);
        }
      $candidat =  Candidat::create([
            'genre' => $request->genre,
            'disponibilite' => $request->disponibilite,
            'fonction' => $request->fonction,
            'birthday' => $request->birthday,
            'nationnalite' => $request->nationnalite,
            'user_id' => $user->id,
            'cabinet_id' => $cabinet->id,
            'cv' => $cvName,
        ]);
 //   $request->validate([
     //   'offre_id' => 'required|exists:offres,id',
    //    'candidat_id' => 'required|exists:candidats,id',
   // ]);

    Proposition::create([
        'offre_id' => $request->offre_id,
        'candidat_id' => $candidat->id,
        'selectionproposition' => 1,
        'recruteproposition' => 0,

    ]);

    return redirect()->back()->with('success', 'le candidat a été ajouté avec succès');
}
//ajout dans la table proposition depuis la page show de l'offre
public function propositionstore(Request $request)
{
    $request->validate([
        'offre_id' => 'required|exists:offres,id',
        'candidat_id' => 'required|exists:candidats,id',
    ]);

    $proposition = Proposition::create([
        'offre_id' => $request->offre_id,
        'candidat_id' => $request->candidat_id,
        'selectionproposition' => 1,
        'recruteproposition' => 0,

    ]);
    $proposition->offre->entreprise->user->notify(new PropositionCandidatureNotification($proposition->offre->entreprise->user));

    $admin = User::where('role', 'Admin')->first();
    $admin->notify(new AdminCandidatureNotification($admin));

    return redirect()->back()->with('success', 'le candidat a été ajouté avec succès');
}
//ajout ou modifier une date de rendez-vous pour la candidature : entreprise
public function updatecandidature(Request $request, $id)
{
    $candidature = Candidature::findOrFail($id);
    $candidature->heurecandidature = $request->input('heurecandidature');
    $candidature->save();
    
    $candidature->candidat->user->notify(new SelectionCandidatureNotification($candidature->candidat->user));
    $admin = User::where('role', 'Admin')->first();
    $admin->notify(new AdminCandidatureNotification($admin));
    return redirect()->back()->with('success', 'le status a été modifié avec succes');
    //return response()->json(['message' => ' le rendez-vous a été fixé avec succès']);

}
//ajout ou modifier un lieu de rendez-vous pour la candidature : entreprise
public function updatecandidaturelieu(Request $request, $id)
{
    $candidature = Candidature::findOrFail($id);
    $candidature->lieu = $request->input('lieu');
    $candidature->save();
    return redirect()->back()->with('success', 'le status a été modifié avec succes');
    //return response()->json(['message' => ' le rendez-vous a été fixé avec succès']);

}
//ajout ou modifier une date de rendez-vous pour la proposition  :entreprise
public function updateproposition(Request $request, $id)
{
    $proposition = Proposition::findOrFail($id);
    $proposition->heureproposition = $request->input('heureproposition');
    $proposition->save();

    $proposition->candidat->cabinet->user->notify(new SelectionCandidatureNotification($proposition->candidat->cabinet->user));
    $admin = User::where('role', 'Admin')->first();
    $admin->notify(new AdminCandidatureNotification($admin));
    
    return redirect()->back()->with('success', 'le rendez-vous  a été calé avec succes');
    //return response()->json(['message' => ' le rendez-vous a été fixé avec succès']);

}
//ajout ou modifier un lieu de rendez-vous pour la proposition  :entreprise
public function updatepropositionlieu(Request $request, $id)
{
    $proposition = Proposition::findOrFail($id);
    $proposition->lieuproposition = $request->input('lieuproposition');
    $proposition->save();
    return redirect()->back()->with('success', 'le rendez-vous  a été calé avec succes');
    //return response()->json(['message' => ' le rendez-vous a été fixé avec succès']);

}
//changer le status de la proposition recrute ou non  :entreprise
public function updatepropositioncrute( $id)
{
    $proposition = Proposition::findOrFail($id);
    $proposition->recruteproposition = !$proposition->recruteproposition;
    $proposition->save();

    $proposition->candidat->cabinet->user->notify(new RecruteCandidatureNotification($proposition->candidat->cabinet->user));
    $admin = User::where('role', 'Admin')->first();
    $admin->notify(new AdminCandidatureNotification($admin));
    
    return redirect()->back()->with('success', 'le status a été modifié avec succes');
    
}
//search pour l'entreprise
public function search(Request $request, $id)
{
    $offre = Offre::findOrFail($id);
    $candidatures = Candidature::with('candidat.user')->where('offre_id', $offre->id)->get();

    // Récupérer les critères de recherche depuis la requête
    $disponibilite = $request->input('disponibilite');
    $fonction = $request->input('fonction');
    $genre = $request->input('genre');
    $competence = $request->input('competences');
    $langue = $request->input('langues');
   // $experience = $request->input('experiences');
    $formation = $request->input('formations');

    // Construire la requête de recherche avec les jointures nécessaires
    $query = Candidat::with(['competences', 'langues', 'formations', 'experiences'])
    ->where('cabinet_id', null)
        ->when($disponibilite, function ($query, $disponibilite) {
            return $query->where('disponibilite' , 'like', '%' .$disponibilite . '%');
        })
        ->when($fonction, function ($query, $fonction) {
            return $query->where('fonction', 'like', '%' .$fonction . '%');
        })
        ->when($genre, function ($query, $genre) {
            return $query->where('genre', $genre);
        })
        ->when($competence, function ($query, $competence) {
            return $query->whereHas('competences', function ($subQuery) use ($competence) {
                $subQuery->where('nomcompetence', 'like', '%' . $competence . '%');
            });
        })
        ->when($langue, function ($query, $langue) {
            return $query->whereHas('langues', function ($subQuery) use ($langue) {
                $subQuery->where('nomlangue', 'like', '%' . $langue . '%');
            });
        })
       // ->when($experience, function ($query, $experience) {
           // return $query->whereHas('experiences', function ($subQuery) use ($experience) {
               // $subQuery->where('missionexperience', 'like', '%' . $experience . '%');
           // });
       // })
        ->when($formation, function ($query, $formation) {
            return $query->whereHas('formations', function ($subQuery) use ($formation) {
                $subQuery->where('niveauformation', 'like', '%' . $formation . '%');
            });
        });
    
    $candidats = $query->get();
   
    //return $candidats;
    //return redirect()->back()->with('success', 'le candidat a été ajouté avec succès');

    // Renvoyer les résultats à la vue avec les critères de recherche
     return view('offres.show', [
        'offre' => $offre,
        'candidatures' => $candidatures,
        'candidats' => $candidats,
          'search' => [
             'disponibilite' => $disponibilite,
             'fonction' => $fonction,
             'genre' => $genre,
             'competences' => $competence,
             'langues' => $langue,
            // 'experiences' => $experience,
             'formations' => $formation,
         ]
      ]);
}
 //changer le status de la candidature recrute ou non :entreprise
 public function updatecandidaturecrute( $id)
 {

     $candidature = Candidature::findOrFail($id);
     $candidature->recrute = !$candidature->recrute;
     $candidature->save();

     $candidature->candidat->user->notify(new RecruteCandidatureNotification($candidature->candidat->user));
     $admin = User::where('role', 'Admin')->first();
     $admin->notify(new AdminCandidatureNotification($admin));
     return redirect()->back()->with('success', 'le status a été modifié avec succes');
     
 }
 // voir les offres encours pour le entreprise
public function offreencoursentreprise()
{
   
   $user = Auth::user();
    $entreprise = Entreprise::where('user_id', $user->id)->first();
    $encours = Offre::where('entreprise_id', $entreprise->id)->where('statusoffre', 0)->get();

    return view('entreprises.offreencours', compact('encours'));
}
// voir les offres expirée pour le entreprise
public function offreexpireentreprise()
{
   
   $user = Auth::user();
    $entreprise = Entreprise::where('user_id', $user->id)->first();
    $expires = Offre::where('entreprise_id', $entreprise->id)->where('statusoffre', 1)->get();

    return view('entreprises.offreexpire', compact('expires'));
}
    //liste des offres pour le cabinets
    public function indexcabinet()
    {
        $user = Auth::user();
        $entreprise = Entreprise::where('user_id', $user->id)->first();
        $offres = Offre::with('entreprise.user')->where('statuscabinet', 1)->get();
        return view('cabinets.offre', compact('offres'));
    }
    
    //show un offre pour le cabinet
    public function showcabinet(string $id)
    {
        $user = Auth::user();
        $cabinet = Cabinet::where('user_id', $user->id)->first();
        $offre = Offre::findOrFail($id);
        $candidats = Candidat::with('user', 'competences', 'experiences', 'formations', 'langues')->where('cabinet_id',  $cabinet->id)->get();
        $propositions = Proposition::with('candidat.user')->where('offre_id', $offre->id)->get();
        return view('cabinets.candidatoffre', compact('offre', 'candidats', 'propositions'));
    }
    
    
    //show l'ensemble des offres pour le candidat
    public function showcandidat()
    {
        $user = Auth::user();
        $candidat = Candidat::where('user_id', $user->id)->first();
        $candidatures = Candidature::with('offre.entreprise.user')->where('candidat_id', $candidat->id)->whereNotNull('heurecandidature')->get();

        return view('candidatvip.offre', compact('candidatures'));
    }
    
    //show un offre pour le candidat
    public function showcandidatoffre(string $id)
    {
        $candidature = Candidature::with('offre.entreprise.user')->findOrFail($id);
        return view('candidatvip.offreshow', compact('candidature'));
    }
    
    // voir les offres encours pour le candidat
    public function offreencours()
    {
       
       $user = Auth::user();
        $candidat = Candidat::where('user_id', $user->id)->first();
        $encours = Candidature::with('offre.entreprise.user')
    ->where('candidat_id', $candidat->id)->where('recrute', 0)
    ->where('decline', 0)
    ->whereHas('offre', function ($query) {
            $query->where('statusoffre', 0);
            })->get();

        return view('candidatvip.offreencours', compact('encours'));
    }
// voir les offres déclinées pour le candidat
public function offredecline()
{
   
   $user = Auth::user();
    $candidat = Candidat::where('user_id', $user->id)->first();
    $declines = Candidature::with('offre.entreprise.user')
->where('candidat_id', $candidat->id)
->where('decline', 1)->get();

    return view('candidatvip.offredecline', compact('declines'));
}
// voir les offres recrutées pour le candidat
public function offrerecrute()
{
   
   $user = Auth::user();
    $candidat = Candidat::where('user_id', $user->id)->first();
    $recrutes = Candidature::with('offre.entreprise.user')
->where('candidat_id', $candidat->id)
->where('recrute', 1)->get();

    return view('candidatvip.offrerecrute', compact('recrutes'));
}
    /**
     * Display the specified resource.
     */

    public function getcandidat(string $id)
    {
        // $user = Auth::user();
        // $entreprise = Entreprise::where('user_id', $user->id)->first();
        // $offre = Offre::where('entreprise_id', $entreprise->id)->findOrFail($id);
        $offre = Offre::findOrFail($id);
        $candidats = Candidat::with('user', 'competences', 'experiences', 'formations', 'langues')->where('cabinet_id', null)->get();
        return view('offres.getcandidat', compact('candidats', 'offre'));
    }
    
    
    
   
    //refus d'un canndidat pour une offre
    public function updatecandidaturedecline( $id)
    {

        $candidature = Candidature::findOrFail($id);
        $candidature->decline = 1;
        $candidature->save();
        return redirect()->back()->with('success', 'le status a été modifié avec succes');
        
    }
    
     //refus d'un cabinet pour une offre
    public function updatepropositiondecline( $id)
    {
        $proposition = Proposition::findOrFail($id);
        $proposition->declineproposition = !$proposition->declineproposition;
        $proposition->save();
        return redirect()->back()->with('success', 'le status a été modifié avec succes');
        
    }
    public function getcandidatselectionne(Request $request, $id)
    {
        $user = Auth::user();
        $entreprise = Entreprise::where('user_id', $user->id)->first();
        $offre = Offre::where('entreprise_id', $entreprise->id)->findOrFail($id);
        $candidats = Candidat::with('user')->where('cabinet_id', null)->get();
        $candidatures = Candidature::with('candidat.user')->where('offre_id', $offre->id)->get();

        return view('offres.getcandidat', compact('candidatures', 'offre', 'candidats'));
    }
    public function propositionselectionne(Request $request, $id)
    {
        $user = Auth::user();
        $entreprise = Entreprise::where('user_id', $user->id)->first();
        $offre = Offre::where('entreprise_id', $entreprise->id)->findOrFail($id);
        $candidats = Candidat::with('user')->where('cabinet_id', null)->get();
        $propositions = Proposition::with('candidat.user')->where('offre_id', $offre->id)->get();

        return view('cabinets.candidatoffre', compact('propositions', 'offre', 'candidats'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $offre = Offre::findOrFail($id);
        return view('offres.edit', compact('offre'));
    }
    
    public function deletecandidature(string $id)
    {
        $candidature = Candidat::findOrFail($id);
  
        $candidature->delete();
  
        return redirect()->route('$candidature')->with('success', 'Le candi$candidature a été supprimé');
    }
    
    public function updateStatus($id)
    {
        $offre = Offre::findOrFail($id);
        $offre->statusoffre = !$offre->statusoffre;
        $offre->save();
        return redirect()->back()->with('success', 'le status a été modifié avec succes');

        // return response()->json(['message' => 'Le statut de l\'offre a été mis à jour avec succès'], 200);
    }
    public function updateStatuscabinet($id)
    {
        $offre = Offre::findOrFail($id);
        $offre->statuscabinet = 1;
        $offre->save();
        
        $cabinet = Cabinet::first();
        $cabinet->user->notify(new AppelCandidatureNotification($cabinet->user));
     $admin = User::where('role', 'Admin')->first();
     $admin->notify(new AppelCandidatureNotification($admin));
     return redirect()->back()->with('success', 'le status a été modifié avec succes');
     
        return redirect()->back()->with('success', 'le status a été modifié avec succes');

        // return response()->json(['message' => 'Le statut de l\'offre a été mis à jour avec succès'], 200);
    }
    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $request->validate([
            'datedebut' => 'nullable|date|after:tomorrow',
            'datecloture' => 'required|date|after:tomorrow', 
        ], [
            'datedebut.after' => 'La date de prise de service doit être postérieure à la date d\'aujourd\'hui.',
            'datecloture.after' => 'La date de clôture doit être postérieure à la date d\'aujourd\'hui.',
        ]);

        // $user = Auth::user();
        $offre = Offre::findOrFail($id);
        $offre->update($request->all());

        // Enregistrer les modifications
        $offre->save();
        return redirect()->back()->with('success', 'les données ont été modifiées avec succes');
    }

    
    
    

//recherche de candidat pour le cabinet
    public function searchWithCabinet(Request $request, $id)
    {
        $offre = Offre::findOrFail($id);
        $propositions = Proposition::with('candidat.user')->where('offre_id', $offre->id)->get();
        $user = Auth::user();
        $cabinet = Cabinet::where('user_id', $user->id)->first();
        // Récupérer les critères de recherche depuis la requête
        // Ajoutez d'autres critères de recherche si nécessaire
        $criteria = $request->all();

        // Construire la requête de recherche
        $query = Candidat::where('cabinet_id', $cabinet->id);

        // Appliquer les critères de recherche à la requête
        foreach ($criteria as $key => $value) {
            if (!empty($value)) {
                $query->where($key, 'like', '%' . $value . '%');
            }
        }

        // Exécuter la requête
        $candidats = $query->get();

        // Renvoyer les résultats à la vue appropriée
        return view('cabinets.candidatoffre', compact('candidats', 'offre', 'propositions'));

       
    }

     // afficher un offre selection  partie: candidature pour un admin 
    public function showoffreadmin(string $id)
    {
       
        $offre = Offre::findOrFail($id);
        $candidats = Candidat::with('user', 'competences', 'experiences', 'formations', 'langues')->where('cabinet_id', null)->get();
        $candidatures = Candidature::with('candidat.user')->where('offre_id', $offre->id)->get();
        return view('admin.showoffre', compact('offre', 'candidats', 'candidatures'));
    }
     // afficher un offre selection partie: proposition pour un admin 
     public function showoffrepropadmin(string $id)
     {
        
         $offre = Offre::findOrFail($id);
         $candidats = Candidat::with('user', 'competences', 'experiences', 'formations', 'langues')->where('cabinet_id', null)->get();
         $propositions = Proposition::with('candidat.user')->where('offre_id', $offre->id)->get();
        
         return view('admin.showoffreprop', compact('offre', 'candidats', 'propositions'));
     }

     // afficher un cv detaille candidat : pour pour un admin 
     public function showcvdetaille(string $id)
     {
        $can = Candidat::with('user', 'competences', 'experiences', 'formations', 'langues', 'references')->findOrFail($id);
        return view('admin.showcvdetaille', compact('can'));
     }
      // afficher un cv detaille candidat : pour  une entreprise 
      public function showcvdetailleese(string $id)
      {
         $can = Candidat::with('user', 'competences', 'experiences', 'formations', 'langues', 'references')->findOrFail($id);
         return view('entreprises.showcvdetaille', compact('can'));
      }

      // voir les offres encours pour l' admin
public function offreencoursadmin()
{
   
    $offres = Offre::where('statusoffre', 0)->get();

    return view('admin.offreencours', compact('offres'));
}
// voir les offres expirée pour l' admin
public function offreexpireadmin()
{

    $offres = Offre::where('statusoffre', 1)->get();

    return view('admin.offreexpire', compact('offres'));
}
 // voir les offres encours pour l' cabinet
 public function offreencourscabinet()
 {
    
     $offres = Offre::where('statusoffre', 0)->where('statuscabinet', 1)->get();
 
     return view('cabinets.offreencours', compact('offres'));
 }
 // voir les offres expirée pour l' cabinet
 public function offreexpirecabinet()
 {
 
     $offres = Offre::where('statusoffre', 1)->where('statuscabinet', 1)->get();
 
     return view('cabinets.offreexpire', compact('offres'));
 }
 

}
