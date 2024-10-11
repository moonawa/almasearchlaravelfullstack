<?php

namespace App\Http\Controllers;

use App\Mail\AppelCabinet;
use App\Mail\HeureRvSelection;
use App\Mail\HeureRvSelectionAdmin;
use App\Mail\PropositionMail;
use App\Models\Cabinet;
use App\Models\Candidat;
use App\Models\Candidature;
use App\Models\Entreprise;
use App\Models\Interlocuteur;
use App\Models\Interlocuteurcbt;
use App\Models\Interlocuteurese;
use App\Models\Offre;
use App\Models\Proposition;
use App\Models\User;
use App\Notifications\AdminCandidatureNotification;
use App\Notifications\AppelCabinet as NotificationsAppelCabinet;
use App\Notifications\AppelCandidatureNotification;
use App\Notifications\AppelEntrepriseCabinet;
use App\Notifications\PropositionCabinet;
use App\Notifications\PropositionCabinetAdmin;
use App\Notifications\PropositionCandidatureNotification;
use App\Notifications\RecruteCandidatureNotification;
use App\Notifications\RendezVousAdmin;
use App\Notifications\RendezVousCandidat;
use App\Notifications\ReponseEseVip;
use App\Notifications\ReponseEseVipAdmin;
use App\Notifications\RvPropositionCabinet;
use App\Notifications\SelectionCandidatureNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    // list des offres pour l'entreprise
    public function index()
    {
    $auth = Auth::user(); // Récupérer l'interlocuteur connecté
    $inter = Interlocuteurese::where('user_id', $auth->id)->first();

    $entreprise = $inter->entreprise; // Obtenir l'entreprise associée

    if ($entreprise) {
        $offre = $entreprise->offres()->latest()->paginate(10); 
        $offrecount = $entreprise->offres()->count(); /// Obtenir les offres de l'entreprise
        $encourscount = Offre::where('entreprise_id', $entreprise->id)->where('offrestatu', "En Cours")->count();
        $expirescount = Offre::where('entreprise_id', $entreprise->id)->where('offrestatu', "Cloturée")->count();
        $standbycount = Offre::where('entreprise_id', $entreprise->id)->where('offrestatu', "StandBy")->count();

        return view('offres.index', compact('offre', 'standbycount', 'offrecount','encourscount', 'expirescount')); // Passer les offres à la vue
    } else {
        return redirect()->back()->with('error', 'Vous n\'êtes pas associé à une entreprise.');
    }

        
    }
     //le nombre d'offre pour l'entreprise
     public function indexcount()
     {
        
         $auth = Auth::user(); // Récupérer l'interlocuteur connecté
         $interlocuteur = Interlocuteurese::where('user_id', $auth->id)->first();

        $entreprise = $interlocuteur->entreprise;
         $offres = Offre::where('entreprise_id', $entreprise->id);
         if ($entreprise) {
         $offre = Offre::where('entreprise_id', $entreprise->id)->count();
         $encours = Offre::where('entreprise_id', $entreprise->id)->where('offrestatu', "En Cours")->count();
         $expires = Offre::where('entreprise_id', $entreprise->id)->where('offrestatu', "Cloturée")->count();
         $standBy = Offre::where('entreprise_id', $entreprise->id)->where('offrestatu', "StandBy")->count();

        }
        $interlocuteurcount = $entreprise->interlocuteureses->count();
        $candidatures = Candidature::whereIn('offre_id', $offres->pluck('id'))->whereNotNull('heurecandidature')->count();
        $recrutes = Candidature::whereIn('offre_id', $offres->pluck('id'))->where('reponese', "Recruté")->count();
        $proposition = Proposition::whereIn('offre_id', $offres->pluck('id'))->whereNotNull('selectionproposition')->count();
        $recrutesproposition = Proposition::whereIn('offre_id', $offres->pluck('id'))->where('reponseseproposition', "Recruté")->count();

         return view('entreprises.dashboard', compact('offre','standBy', 'encours' , 'expires', 'candidatures', 'recrutes', 'proposition', 'recrutesproposition', 'interlocuteurcount'));
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
        $auth = Auth::user(); // Récupérer l'interlocuteur connecté
        $interlocuteur = Interlocuteurese::where('user_id', $auth->id)->first();

       $entreprise = $interlocuteur->entreprise;
       $fichierName = null;
  
       if ($request->hasFile('fichierjoint')) {
           $fichierName = time().'.'.$request->fichierjoint->extension();
           $request->fichierjoint->move(public_path('uploads'), $fichierName);
       }
        
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
        $offre->interlocuteurese_id = $interlocuteur->id;
        $offre->offrestatu = "En Cours";
        $offre->statuscabinet = 0;
        $offre->competenceoffre = $request->competenceoffre;
        $offre->fichierjoint = $fichierName;
        $offre->typeeoffre = $request->typeeoffre; //avantage
        $offre->save();
        return redirect()->route('offres')->with('success', 'experience ajouté avec  success');
    }
    /**
     * Display the specified resource.
    */
    // afficher un offre  et selectionner des candidats pour une entreprise
    public function show(string $id)
    {
        $auth = Auth::user(); // Récupérer l'interlocuteur connecté
         $interlocuteur = Interlocuteurese::where('user_id', $auth->id)->first();

        $entreprise = $interlocuteur->entreprise;

        $offre = Offre::with('interlocuteurese.user')->where('entreprise_id', $entreprise->id)->findOrFail($id);
        $candidats = Candidat::with('latestFormation','user', 'competences', 'experiences', 'formations', 'langues')->where('cabinet_id', null)->latest()->paginate(10);
        $candidatures = Candidature::with('candidat.user')->where('offre_id', $offre->id)->latest()->paginate(5);
        $candidaturescount = Candidature::with('candidat.user')->where('offre_id', $offre->id)->count();
        $candidatrecrutecount = Candidature::with('offre.entreprise.user')->where('offre_id', $offre->id)->where('reponese', "Recruté")->count();
        $candidatrefusecount = Candidature::with('offre.entreprise.user')->where('offre_id', $offre->id)->where('reponese', "Refusé")->count();
        $propositionscount = Proposition::with('candidat.cabinet')->where('offre_id', $offre->id)->count();

        return view('offres.show', compact('offre', 'candidats', 'candidatures', 'candidaturescount', 'candidatrecrutecount', 'candidatrefusecount', 'propositionscount'));
    }
//liste des propositions  d'une offre pour l'entreprise
public function indexproposition($id)
{
    $auth = Auth::user(); // Récupérer l'interlocuteur connecté
    $interlocuteur = Interlocuteurese::where('user_id', $auth->id)->first();

    $entreprise = $interlocuteur->entreprise;
    $offre = Offre::where('entreprise_id', $entreprise->id)->findOrFail($id);
    $propositions = Proposition::with('candidat.cabinet')->where('offre_id', $offre->id)->latest()->paginate(5);
    $propositionscount = Proposition::with('candidat.cabinet')->where('offre_id', $offre->id)->count();
    $propositionsrecrutecount = Proposition::with('offre.entreprise.user')->where('offre_id', $offre->id)->where('reponseseproposition', "Recruté")->count();
    $propositionsrefusecount = Proposition::with('offre.entreprise.user')->where('offre_id', $offre->id)->where('reponseseproposition', "Refusé")->count();
    $candidaturescount = Candidature::with('candidat.user')->where('offre_id', $offre->id)->count();

    return view('offres.getcandidat', compact('propositions', 'offre', 'propositionscount', 'propositionsrecrutecount', 'propositionsrefusecount', 'candidaturescount'));
}
//ajout dans la table candidature: entreprise
public function getcandidatstore(Request $request)
{
    $request->validate([
        'offre_id' => 'required|exists:offres,id',
        'candidat_id' => 'required|exists:candidats,id',
    ]);
    
    // Vérifier si la combinaison offre_id et candidat_id existe déjà
    $exists = Candidature::where('offre_id', $request->offre_id)
    ->where('candidat_id', $request->candidat_id)
    ->exists();

    if ($exists) {
    return redirect()->back()->withErrors(['error' => 'Ce candidat est déjà sélectionné pour cette offre.']);
    }
    $auth = Auth::user(); // Récupérer l'interlocuteur connecté
    $inter = Interlocuteurese::where('user_id', $auth->id)->first();
// Créer la candidature
    Candidature::create([
        'offre_id' => $request->offre_id,
        'candidat_id' => $request->candidat_id,
        'selection' => 1,
        'reponese' => "En Cours",
        'interlocuteurese_id' => $inter->id,
       
    ]);
    return redirect()->back()->with('success', 'le candidat a été ajouté avec succès');
}
//ajout en meme temps  dans la table proposition et candidat pour cabinet
public function propositionstoreshow(Request $request)
{
    
        $auth = Auth::user();
        $inter = Interlocuteurcbt::where('user_id', $auth->id)->first();
        $cabinet = $inter->cabinet;
        
        $userExistant = User::where('email', $request->email)
        ->orWhere('telephone', $request->telephone)
        ->first();
        if ($userExistant) {
            // Vérifier si cet utilisateur est déjà associé à un autre cabinet (via la table candidats)
            $candidatExistant = Candidat::where('user_id', $userExistant->id)->first();
        
            if ($candidatExistant) {
                return redirect()->back()->withErrors(['error' => 'Ce candidat est déjà enregistré par un autre cabinet.']);
            }
        }
        else {
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

   $proposition =  Proposition::create([
        'offre_id' => $request->offre_id,
        'candidat_id' => $candidat->id,
        'selectionproposition' => 1,
        'reponseseproposition' => "En Cours",

    ]);
    $inter = $proposition->offre->entreprise->interlocuteureses->all();
    $cabinet = $proposition->candidat->cabinet;
    $offre = $proposition->offre;
    $entreprise = $proposition->offre->entreprise;

    foreach ($inter as $in){
        $in->user->notify(new PropositionCabinet($proposition, $offre, $cabinet, $entreprise));

        Mail::to($in->user)->send(new PropositionMail($cabinet, $offre));
    }
    $admin = User::where('role', 'Admin')->all();
    foreach ($admin as $ad){
        $ad->notify(new PropositionCabinetAdmin($proposition, $offre, $cabinet));

        Mail::to($ad)->send(new PropositionMail($cabinet, $offre));
    }

    return redirect()->back()->with('success', 'le candidat a été ajouté avec succès');
}
}
//ajout dans la table proposition depuis la page show de l'offre pour le cabinet
public function propositionstore(Request $request)
{
    $auth = Auth::user();
        $inter = Interlocuteurcbt::where('user_id', $auth->id)->first();
        $cabinet = $inter->cabinet;

    $request->validate([
        'offre_id' => 'required|exists:offres,id',
        'candidat_id' => 'required|exists:candidats,id',
    ]);
    // Vérifier si la combinaison offre_id et candidat_id existe déjà
    $exists = Proposition::where('offre_id', $request->offre_id)
    ->where('candidat_id', $request->candidat_id)
    ->exists();

    if ($exists) {
    return redirect()->back()->withErrors(['error' => 'Ce candidat est déjà proposé pour cette offre.']);
    }
    $proposition = Proposition::create([
        'offre_id' => $request->offre_id,
        'candidat_id' => $request->candidat_id,
        'selectionproposition' => 1,
        'reponseseproposition' => "En Cours",
        'interlocuteurcbt_id' => $inter->id,
    ]);
    $proposition->candidat->cabinet->increment('view_count'); //le nombre de fois que le cabinet propose
    $inter = $proposition->offre->entreprise->interlocuteureses->all();
    $cabinet = $proposition->candidat->cabinet;
    $offre = $proposition->offre;
    $entreprise = $proposition->offre->entreprise;
    foreach ($inter as $in){
        $in->user->notify(new PropositionCabinet($proposition, $offre, $cabinet));
        Mail::to($in->user)->send(new PropositionMail($cabinet, $offre));

    }
   

    $admin = User::where('role', 'Admin')->get();
    foreach ($admin as $ad){
        $ad->notify(new PropositionCabinetAdmin($proposition, $offre, $cabinet, $entreprise));

        Mail::to($ad)->send(new PropositionMail($cabinet, $offre));
    }


    return redirect()->back()->with('success', 'le candidat a été ajouté avec succès');
}
public function updateCandidatureRendezvousLieu(Request $request, $id)
{
    $request->validate([
        'heurecandidature' => 'nullable|date|after:tomorrow',
    ], [
        'heurecandidature.after' => 'La date du rendez-vous doit être postérieure à la date d\'aujourd\'hui.',
    ]);
    $user = Auth::user();
    $inter = Interlocuteurese::where('user_id', $user->id)->first();
    $entreprise = $inter->entreprise;
    
    $candidature = Candidature::findOrFail($id);
    $candidature->heurecandidature = $request->input('heurecandidature');
    $candidature->lieu = $request->input('lieu');
    $candidature->confirmerv = 0;
    $candidature->commentaireviprv = null;
    $candidature->commentaireese = null;
    $candidature->reponese = "En Cours";
    $candidature->save();
    
    $date= $candidature->heurecandidature;
    $lieu= $candidature->lieu;
    $offre = $candidature->offre;
    $candidat = $candidature->candidat;
    $candidat->user->notify(new RendezVousCandidat($candidature, $offre, $date, $lieu));

    Mail::to($candidature->candidat->user)->send(new HeureRvSelection($entreprise, $offre, $date, $lieu));

    $admin = User::where('role', 'Admin')->get();
    foreach ($admin as $ad){
    $ad->notify(new RendezVousAdmin($candidature, $entreprise, $offre, $date, $lieu));
    Mail::to($ad)->send(new HeureRvSelectionAdmin($entreprise, $offre, $date, $candidat));

}

    return redirect()->back()->with('success', 'La date et le lieu de rendez-vous ont été modifiées avec succès');    
}
//ajout ou modifier une date de rendez-vous pour la candidature : entreprise
public function updatecandidature(Request $request, $id)
{
    $request->validate([
        'heurecandidature' => 'nullable|date|after:tomorrow',
    ], [
        'heurecandidature.after' => 'La date du rendez-vous doit être postérieure à la date d\'aujourd\'hui.',
    ]);
    $user = Auth::user();
    $inter = Interlocuteurese::where('user_id', $user->id)->first();
    $entreprise = $inter->entreprise;
    
    $candidature = Candidature::findOrFail($id);
    $candidature->heurecandidature = $request->input('heurecandidature');
    $candidature->confirmerv = 0;
    $candidature->commentaireviprv = null;
    $candidature->commentaireese = null;
    $candidature->reponese = "En Cours";
    $candidature->save();

    $date= $candidature->heurecandidature;
    $offre = $candidature->offre;
    $candidat = $candidature->candidat;
    Mail::to($candidature->candidat->user)->send(new HeureRvSelection($entreprise, $offre, $date));

    $admin = User::where('role', 'Admin')->get();
    Mail::to($admin)->send(new HeureRvSelectionAdmin($entreprise, $offre, $date, $candidat));

    return redirect()->back()->with('success', 'le rendez-vous a été fixé  et enoyé au candidat avec succès');
    //return response()->json(['message' => ' le rendez-vous a été fixé avec succès']);
    //$candidature->candidat->user->notify(new SelectionCandidatureNotification($candidature->candidat->user));
    //Notification::send($admin, new AdminCandidatureNotification());

}
//ajout ou modifier un lieu de rendez-vous pour la candidature : entreprise
public function updatecandidaturelieu(Request $request, $id)
{
    $candidature = Candidature::findOrFail($id);
    $candidature->lieu = $request->input('lieu');
    $candidature->save();
    $candidature->candidat->user->notify(new SelectionCandidatureNotification($candidature->candidat->user));
    
    return redirect()->back()->with('success', 'le status a été modifié avec succes');
    //return response()->json(['message' => ' le rendez-vous a été fixé avec succès']);

}
public function updatepropositionRvLieu(Request $request, $id){
    $request->validate([
        'heureproposition' => 'nullable|date|after:tomorrow',
    ], [
        'heureproposition.after' => 'La date du rendez-vous doit être postérieure à la date d\'aujourd\'hui.',
    ]);
    $proposition = Proposition::findOrFail($id);
    $proposition->heureproposition = $request->input('heureproposition');
    $proposition->lieuproposition = $request->input('lieuproposition');
    $proposition->save();
    $offre = $proposition->offre;
    $entreprise = $proposition->offre->entreprise;
    $inter = $proposition->candidat->cabinet->interlocuteurcbts->all();
    foreach ($inter as $i){
        $i->user->notify(new RvPropositionCabinet($proposition, $entreprise, $offre));
        $i->user->notify(new SelectionCandidatureNotification($i->user));

    }
    $admin = User::where('role', 'Admin')->get();
    foreach ($admin as $ad){
        $ad->notify(new RvPropositionCabinet($proposition, $entreprise, $offre));
        $ad->notify(new AdminCandidatureNotification($ad));
    
    }
    
    return redirect()->back()->with('success', 'le rendez-vous  a été calé avec succes');

}
//ajout ou modifier une date de rendez-vous pour la proposition  :entreprise
public function updateproposition(Request $request, $id)
{
    $proposition = Proposition::findOrFail($id);
    $proposition->heureproposition = $request->input('heureproposition');
    $proposition->save();

    $inter = $proposition->candidat->cabinet->interlocuteurcbts->first();
    $inter->user->notify(new SelectionCandidatureNotification($inter->user));
    $admin = User::where('role', 'Admin')->get();
    $admin->notify(new AdminCandidatureNotification($admin));
    
    return redirect()->back()->with('success', 'le rendez-vous  a été calé avec succes');

}
//ajout ou modifier un lieu de rendez-vous pour la proposition :entreprise
public function updatepropositionlieu(Request $request, $id)
{
    $proposition = Proposition::findOrFail($id);
    $proposition->lieuproposition = $request->input('lieuproposition');
    $proposition->save();
    return redirect()->back()->with('success', 'le rendez-vous  a été calé avec succes');

}
//changer le status de la proposition recrute ou non  :entreprise
public function updatepropositioncrute(Request $request, $id)
{
    $proposition = Proposition::findOrFail($id);
    $proposition->reponseseproposition = $request->reponseseproposition;
    $proposition->save();

    $inter =  $proposition->candidat->cabinet->interlocuteurcbts->first();
    $inter->user->notify(new RecruteCandidatureNotification($inter->user));
    $admin = User::where('role', 'Admin')->get();
    $admin->notify(new AdminCandidatureNotification($admin));
    
    return redirect()->back()->with('success', 'le status a été modifié avec succes');
    
}
//search pour l'entreprise
public function search(Request $request, $id)
{
    $offre = Offre::findOrFail($id);
    $candidatures = Candidature::with('candidat.user')->where('offre_id', $offre->id)->latest()->paginate(10);

    // Récupérer les critères de recherche depuis la requête
    $disponibilite = $request->input('disponibilite');
    $fonction = $request->input('fonction');
    $genre = $request->input('genre');
    $competence = $request->input('competences');
    $mot_cle = $request->input('mot_cles');
    $langue = $request->input('langues');
   // $experience = $request->input('experiences');
    $formation = $request->input('formations');

    // Construire la requête de recherche avec les jointures nécessaires
   

    $query = Candidat::with(['latestFormation', 'competences', 'langues', 'formations', 'experiences'])
    ->where('cabinet_id', null)
    ->when($disponibilite, function ($query, $disponibilite) {
        return $query->where('disponibilite', 'like', '%' . $disponibilite . '%');
    })
    ->when($fonction, function ($query, $fonction) {
        return $query->where('fonction', 'like', '%' . $fonction . '%');
    })
    ->when($genre, function ($query, $genre) {
        return $query->where('genre', $genre);
    })
    ->when($competence, function ($query, $competence) {
        return $query->whereHas('competences', function ($subQuery) use ($competence) {
            $subQuery->where('nomcompetence', 'like', '%' . $competence . '%');
        });
    })
    ->when($mot_cle, function ($query, $mot_cle) {
        return $query->whereHas('mot_cles', function ($subQuery) use ($mot_cle) {
            $subQuery->where('mot', 'like', '%' . $mot_cle . '%');
        });
    })
    ->when($langue, function ($query, $langue) {
                      

        return $query->whereHas('langues', function ($subQuery) use ($langue) {
            $subQuery->where('nomlangue', 'like', '%' . $langue . '%');
        });
    })
    ->when($formation, function ($query, $formation) {
        return $query->whereHas('formations', function ($subQuery) use ($formation) {
            $subQuery->where('niveauformation', 'like', '%' . $formation . '%');
        });
    });

    $candidats = $query->latest()->paginate(10);
    
    
    // Vérifier les données retournées pour le débogage
    
    
   
    $candidaturescount = Candidature::with('candidat.user')->where('offre_id', $offre->id)->count();
    $propositionscount = Proposition::with('candidat.cabinet')->where('offre_id', $offre->id)->count();
    $candidatrecrutecount = Candidature::with('offre.entreprise.user')->where('offre_id', $offre->id)->where('reponese', "Recruté")->count();
    $candidatrefusecount = Candidature::with('offre.entreprise.user')->where('offre_id', $offre->id)->where('reponese', "Refusé")->count();
  
    //return $candidats;
    //return redirect()->back()->with('success', 'le candidat a été ajouté avec succès');

    // Renvoyer les résultats à la vue avec les critères de recherche
     return view('offres.show', [
        'offre' => $offre,
        'candidatures' => $candidatures,
        'candidaturescount' => $candidaturescount,
        'propositionscount' => $propositionscount,
        'candidatrecrutecount' => $candidatrecrutecount,
        'candidatrefusecount' => $candidatrefusecount,
        'candidats' => $candidats,
          'search' => [
             'disponibilite' => $disponibilite,
             'fonction' => $fonction,
             'genre' => $genre,
             'competences' => $competence,
             'langues' => $langue,
            'mot_cles' => $mot_cle,
             'formations' => $formation,
         ]
      ]);
}
 //changer le status de la candidature recrute ou non :entreprise
 public function updatecandidaturecrute( $id , Request $request)
 {

     $candidature = Candidature::findOrFail($id);
     $candidature->reponese = $request->reponese;
     $candidature->confirmerv = 0;
     $candidature->commentaireviprv = null;
     $candidature->save();

     $offre = $candidature->offre;
     $ese = $candidature->offre->entreprise;
     $candidat = $candidature->candidat;
     $reponese = $candidature->reponse;
     $candidat->user->notify(new ReponseEseVip($candidature, $offre, $reponese, $ese));

     $candidature->candidat->user->notify(new RecruteCandidatureNotification($candidature->candidat->user));
     $admin = User::where('role', 'Admin')->get();
     foreach ($admin as $ad){
        $ad->notify(new ReponseEseVipAdmin($candidature, $offre, $reponese, $ese));

     }
     $admin->notify(new AdminCandidatureNotification($admin));
     return redirect()->back()->with('success', 'le status a été modifié avec succes');
     
 }
 // voir les offres encours pour le entreprise
public function offreencoursentreprise()
{
    $auth = Auth::user(); // Récupérer l'interlocuteur connecté
    $inter = Interlocuteurese::where('user_id', $auth->id)->first();

    $entreprise = $inter->entreprise; 
    $encours = Offre::where('entreprise_id', $entreprise->id)->where('offrestatu', "En Cours")->latest()->paginate(10);
    $encourscount = Offre::where('entreprise_id', $entreprise->id)->where('offrestatu', "En Cours")->count();
    $offrecount = $entreprise->offres()->count(); 
    $expirescount = Offre::where('entreprise_id', $entreprise->id)->where('offrestatu', "Cloturée")->count();
    $standbycount = Offre::where('entreprise_id', $entreprise->id)->where('offrestatu', "StandBy")->count();

    return view('entreprises.offreencours', compact('encours','standbycount', 'encourscount', 'offrecount', 'expirescount'));
}
// voir les offres expirée pour le entreprise
public function offreexpireentreprise()
{
   
    $auth = Auth::user(); // Récupérer l'interlocuteur connecté
    $inter = Interlocuteurese::where('user_id', $auth->id)->first();

    $entreprise = $inter->entreprise; 
    $expires = Offre::where('entreprise_id', $entreprise->id)->where('offrestatu', "Cloturée")->latest()->paginate(10);
    $offrecount = $entreprise->offres()->count(); 
    $encourscount = Offre::where('entreprise_id', $entreprise->id)->where('offrestatu', "En Cours")->count();
    $expirescount = Offre::where('entreprise_id', $entreprise->id)->where('offrestatu', "Cloturée")->count();
    $standbycount = Offre::where('entreprise_id', $entreprise->id)->where('offrestatu', "StandBy")->count();

    return view('entreprises.offreexpire', compact('expires', 'standbycount', 'expirescount', 'encourscount', 'offrecount'));
}
// voir les offres Standby pour le entreprise
public function offrestandbyentreprise()
{
   
    $auth = Auth::user(); // Récupérer l'interlocuteur connecté
    $inter = Interlocuteurese::where('user_id', $auth->id)->first();

    $entreprise = $inter->entreprise; 
    $standby = Offre::where('entreprise_id', $entreprise->id)->where('offrestatu', "StandBy")->latest()->paginate(10);
    $offrecount = $entreprise->offres()->count(); 
    $encourscount = Offre::where('entreprise_id', $entreprise->id)->where('offrestatu', "En Cours")->count();
    $expirescount = Offre::where('entreprise_id', $entreprise->id)->where('offrestatu', "Cloturée")->count();
    $standbycount = Offre::where('entreprise_id', $entreprise->id)->where('offrestatu', "StandBy")->count();

    return view('entreprises.offrestandby', compact('standby', 'standbycount', 'expirescount', 'encourscount', 'offrecount'));
}
    //liste des offres pour le cabinets
    public function indexcabinet()
    {
        
        $offres = Offre::with('entreprise.user')->where('statuscabinet', 1)->latest()->paginate(6);
        $offrescount = Offre::with('entreprise.user')->where('statuscabinet', 1)->count();
        $offresencours = Offre::where('offrestatu', "En Cours")->where('statuscabinet', 1)->count();
        $offresexpire = Offre::where('offrestatu', "Cloturée")->where('statuscabinet', 1)->count();
        $offresstandby = Offre::where('offrestatu', "StandBy")->where('statuscabinet', 1)->count();

        return view('cabinets.offre', compact('offres', 'offresstandby', 'offrescount', 'offresencours', 'offresexpire'));
    }
    
    //show un offre pour le cabinet
    public function showcabinet(string $id)
    {
        $user = Auth::user();
        $inter = Interlocuteurcbt::where('user_id', $user->id)->first();
        $cabinet = $inter->cabinet;
        $offre = Offre::findOrFail($id);
        $candidatscount = Candidat::with('user', 'competences', 'experiences', 'formations', 'langues')->where('cabinet_id',  $cabinet->id)->count();
        $candidats = Candidat::with('user', 'competences', 'experiences', 'formations', 'langues')->where('cabinet_id',  $cabinet->id)->latest()->paginate(10);
        $propositions = Proposition::with('candidat.user', 'interlocuteurcbt')->where('offre_id', $offre->id)->latest()->paginate(5);
        $propositionscount = Proposition::with('candidat.user')->where('offre_id', $offre->id)->count();

        return view('cabinets.candidatoffre', compact('candidatscount','offre', 'candidats', 'propositions', 'propositionscount'));
    }
    //show l'ensemble des candidats selectionés recrutés : entreprise
    public function candidatrecrute($id)
    {
     
        $offre = Offre::findOrFail($id);
        $candidatures = Candidature::with('offre.entreprise.user')->where('offre_id', $offre->id)->where('reponese', "Recruté")->latest()->paginate(5);
        $candidaturescount = Candidature::with('candidat.user')->where('offre_id', $offre->id)->count();
        $candidatrecrutecount = Candidature::with('offre.entreprise.user')->where('offre_id', $offre->id)->where('reponese', "Recruté")->count();
        $candidatrefusecount = Candidature::with('offre.entreprise.user')->where('offre_id', $offre->id)->where('reponese', "Refusé")->count();
        $propositionscount = Proposition::with('candidat.cabinet')->where('offre_id', $offre->id)->count();

        return view('entreprises.candidatrecrute', compact('candidatures', 'offre', 'candidatrecrutecount', 'candidaturescount', 'candidatrefusecount', 'propositionscount'));
    }
    //show l'ensemble des candidats  selectonnés refusé ou décliné : entreprise 
    public function candidatrefuse($id)
    {
       
        $offre = Offre::findOrFail($id);
        $candidatures = Candidature::with('offre.entreprise.user')->where('offre_id', $offre->id)->where('reponese', "Refusé")->latest()->paginate(5);
        $candidaturescount = Candidature::with('candidat.user')->where('offre_id', $offre->id)->count();
        $candidatrecrutecount = Candidature::with('offre.entreprise.user')->where('offre_id', $offre->id)->where('reponese', "Recruté")->count();
        $candidatrefusecount = Candidature::with('offre.entreprise.user')->where('offre_id', $offre->id)->where('reponese', "Refusé")->count();
        $propositionscount = Proposition::with('candidat.cabinet')->where('offre_id', $offre->id)->count();

        return view('entreprises.candidatrefuse', compact('candidatures', 'offre', 'candidatrecrutecount', 'candidaturescount', 'candidatrefusecount', 'propositionscount'));
    }
    //show l'ensemble des candidats proposés recrutés : entreprise
    public function proposerecrute($id)
    {
       
        $offre = Offre::findOrFail($id);
        $propositions = Proposition::with('offre.entreprise.user')->where('offre_id', $offre->id)->where('reponseseproposition', "Recruté")->latest()->paginate(5);
        $propositionscount = Proposition::with('candidat.cabinet')->where('offre_id', $offre->id)->count();
        $propositionsrecrutecount = Proposition::with('offre.entreprise.user')->where('offre_id', $offre->id)->where('reponseseproposition', "Recruté")->count();
        $propositionsrefusecount = Proposition::with('offre.entreprise.user')->where('offre_id', $offre->id)->where('reponseseproposition', "Refusé")->count();
        $candidaturescount = Candidature::with('candidat.user')->where('offre_id', $offre->id)->count();
    
        return view('entreprises.proposerecrute', compact('propositions', 'offre', 'propositionscount', 'propositionsrecrutecount', 'propositionsrefusecount', 'candidaturescount'));
    }
    //show l'ensemble des candidats  proposésrefusé ou décliné : entreprise
    public function proposerefuse($id)
    {
     
        $offre = Offre::findOrFail($id);
        $propositions = Proposition::with('offre.entreprise.user')->where('offre_id', $offre->id)->where('reponseseproposition', "Refusé")->latest()->paginate(5);
        $propositionscount = Proposition::with('candidat.cabinet')->where('offre_id', $offre->id)->count();
        $propositionsrecrutecount = Proposition::with('offre.entreprise.user')->where('offre_id', $offre->id)->where('reponseseproposition', "Recruté")->count();
        $propositionsrefusecount = Proposition::with('offre.entreprise.user')->where('offre_id', $offre->id)->where('reponseseproposition', "Refusé")->count();
        $candidaturescount = Candidature::with('candidat.user')->where('offre_id', $offre->id)->count();
    
        return view('entreprises.proposerefuse', compact('propositions', 'offre', 'propositionscount', 'propositionsrecrutecount', 'propositionsrefusecount', 'candidaturescount'));
    }
    
    //show l'ensemble des offres pour le candidat
    public function showcandidat()
    {
        $user = Auth::user();
        $candidat = Candidat::where('user_id', $user->id)->first();
        $candidatures = Candidature::with('offre.entreprise.user')->where('candidat_id', $candidat->id)->whereNotNull('heurecandidature')->latest()->paginate(10);
        $candidaturescount = Candidature::with('offre.entreprise.user')->where('candidat_id', $candidat->id)->whereNotNull('heurecandidature')->count();
        $encourscount = Candidature::with('offre.entreprise.user')
        ->where('candidat_id', $candidat->id)
        ->where('reponese', "En Cours")->whereNotNull('heurecandidature')
        ->whereHas('offre', function ($query) {
                $query->where('offrestatu', "En Cours");
                })->count();
                $recrutescount = Candidature::with('offre.entreprise.user')
->where('candidat_id', $candidat->id)
->where('reponese', "Recruté")->count();
                $declinescount = Candidature::with('offre.entreprise.user')
->where('candidat_id', $candidat->id)
->where('reponese', "Décliné")->count();
$recrutescount = Candidature::with('offre.entreprise.user')
->where('candidat_id', $candidat->id)
->where('reponese', "Recruté")->count();
        return view('candidatvip.offre', compact('candidatures', 'candidaturescount', 'encourscount', 'declinescount', 'recrutescount'));
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
        $candidaturescount = Candidature::with('offre.entreprise.user')->where('candidat_id', $candidat->id)->whereNotNull('heurecandidature')->count();
        $encourscount = Candidature::with('offre.entreprise.user')
        ->where('candidat_id', $candidat->id)
        ->where('reponese', "En Cours")->whereNotNull('heurecandidature')
        ->whereHas('offre', function ($query) {
                $query->where('offrestatu', "En Cours");
                })->count();
                $recrutescount = Candidature::with('offre.entreprise.user')
->where('candidat_id', $candidat->id)
->where('reponese', "Recruté")->count();
                $declinescount = Candidature::with('offre.entreprise.user')
->where('candidat_id', $candidat->id)
->where('reponese', "Décliné")->count();
        $encours = Candidature::with('offre.entreprise.user')
    ->where('candidat_id', $candidat->id)
    ->where('reponese', "En Cours")->whereNotNull('heurecandidature')
    ->whereHas('offre', function ($query) {
            $query->where('offrestatu', "En Cours");
            })->latest()->paginate(10);

        return view('candidatvip.offreencours', compact('encours', 'candidaturescount', 'encourscount', 'declinescount', 'recrutescount'));
    }
// voir les offres déclinées pour le candidat
public function offredecline()
{
   
   $user = Auth::user();
    $candidat = Candidat::where('user_id', $user->id)->first();
    $candidaturescount = Candidature::with('offre.entreprise.user')->where('candidat_id', $candidat->id)->whereNotNull('heurecandidature')->count();
    $encourscount = Candidature::with('offre.entreprise.user')
    ->where('candidat_id', $candidat->id)
    ->where('reponese', "En Cours")->whereNotNull('heurecandidature')
    ->whereHas('offre', function ($query) {
            $query->where('offrestatu', "En Cours");
            })->count();
            $recrutescount = Candidature::with('offre.entreprise.user')
->where('candidat_id', $candidat->id)
->where('reponese', "Recruté")->count();
    $declines = Candidature::with('offre.entreprise.user')
->where('candidat_id', $candidat->id)
->where('reponese', "Décliné")->latest()->paginate(10);
$declinescount = Candidature::with('offre.entreprise.user')
->where('candidat_id', $candidat->id)
->where('reponese', "Décliné")->count();
    return view('candidatvip.offredecline', compact('declines', 'candidaturescount', 'declinescount', 'encourscount', 'recrutescount'));
}
// voir les offres recrutées pour le candidat
public function offrerecrute()
{
   
   $user = Auth::user();
    $candidat = Candidat::where('user_id', $user->id)->first();
    $candidaturescount = Candidature::with('offre.entreprise.user')->where('candidat_id', $candidat->id)->whereNotNull('heurecandidature')->count();
    $recrutes = Candidature::with('offre.entreprise.user')
->where('candidat_id', $candidat->id)
->where('reponese', "Recruté")->latest()->paginate(10);
$recrutescount = Candidature::with('offre.entreprise.user')
->where('candidat_id', $candidat->id)
->where('reponese', "Recruté")->count();
$declinescount = Candidature::with('offre.entreprise.user')
->where('candidat_id', $candidat->id)
->where('reponese', "Décliné")->count();
$encourscount = Candidature::with('offre.entreprise.user')
    ->where('candidat_id', $candidat->id)
    ->where('reponese', "En Cours")->whereNotNull('heurecandidature')
    ->whereHas('offre', function ($query) {
            $query->where('offrestatu', "En Cours");
            })->count();
    return view('candidatvip.offrerecrute', compact('recrutes', 'candidaturescount', 'declinescount', 'encourscount', 'recrutescount'));
}
    /**
     * Display the specified resource.
     */

    public function getcandidat(string $id)
    {
        $offre = Offre::findOrFail($id);
        $candidats = Candidat::with('user', 'competences', 'experiences', 'formations', 'langues')->where('cabinet_id', null)->get();
        return view('offres.getcandidat', compact('candidats', 'offre'));
    }
    
    
    
   
    //refus d'un canndidat pour une offre
    public function updatecandidaturedecline( $id)
    {

        $candidature = Candidature::findOrFail($id);
        $candidature->reponese = "Décliné";
        $candidature->confirmerv = 0;
        $candidature->commentaireviprv = null;
        $candidature->save();
        return redirect()->back()->with('success', 'le status a été modifié avec succes');
        
    }
    //confirmation d'un rv par un candidat
    public function candidatureconfirmerv( $id)
    {

        $candidature = Candidature::findOrFail($id);
        $candidature->confirmerv = 1;
        $candidature->commentaireviprv = null;
        $candidature->save();
        return redirect()->back()->with('success', 'le status a été modifié avec succes');
        
    }
    //commentair d'une ese pour un candidat vip: entreprise
    public function commentaireese(Request $request, $id)
    {
        $candidature = Candidature::findOrFail($id);
        
        $candidature->commentaireese = $request->input('commentaireese');
        
        $candidature->save();
        return redirect()->back()->with('success', 'Le commentaire a été envoyé ');
        
    }
    //commentair d'une ese pour un candidat d'un cabinet: entreprise
    public function commentaireeseproposition(Request $request, $id)
    {
        $proposition = Proposition::findOrFail($id);
        
        $proposition->commentaireeseproposition = $request->input('commentaireeseproposition');
        
        $proposition->save();
        return redirect()->back()->with('success', 'Le commentaire a été envoyé ');
        
    }
    //refus d'un canndidat pour une rv
    public function candidaturecommentairerv(Request $request, $id)
    {
        $candidature = Candidature::findOrFail($id);
        $candidature->confirmerv = 0;
        $candidature->commentaireviprv = $request->input('commentaireviprv');
        
        $candidature->save();
        return redirect()->back()->with('success', 'Le commentaire a été envoyé ');
        
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
        $auth = Auth::user(); // Récupérer l'interlocuteur connecté
        $interlocuteur = Interlocuteurese::where('user_id', $auth->id)->first();

       $entreprise = $interlocuteur->entreprise;
        $offre = Offre::where('entreprise_id', $entreprise->id)->findOrFail($id);
        $candidats = Candidat::with('user')->where('cabinet_id', null)->latest()->paginate(10);
        $candidatures = Candidature::with('candidat.user')->where('offre_id', $offre->id)->latest()->paginate(5);

        return view('offres.getcandidat', compact('candidatures', 'offre', 'candidats'));
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
  
        return redirect()->route('$candidature')->with('success', 'Le candidat  a été supprimé');
    }
    
    public function updateStatus(Request $request, $id)
    {
        $offre = Offre::findOrFail($id);

        $offre->offrestatu = $request->input('offrestatu');
        
        $offre->save();
        //$offre->statusoffre = !$offre->statusoffre;
        return redirect()->back()->with('success', 'le status a été modifié avec succes');

    }
    public function updateStatuscabinet($id)
    {
        $user = Auth::user();
        $inter = Interlocuteurese::where('user_id', $user->id)->first();
        $entreprise = $inter->entreprise;
        $offre = Offre::findOrFail($id);
        $offre->statuscabinet = 1;
        $offre->save();

        $cabinets = Cabinet::all();
        foreach ($cabinets as $cabinet) { // Itère sur chaque cabinet
            foreach ($cabinet->interlocuteurcbts as $in) { // Itère sur chaque interlocuteur du cabinet
                // Envoyer la notification à l'interlocuteur
                $in->user->notify(new AppelEntrepriseCabinet($offre, $entreprise));
        
                // Envoyer un mail à l'interlocuteur
                Mail::to($in->user)->send(new AppelCabinet($entreprise, $offre));
            }
        }
        $admin = User::where('role', 'Admin')->get();
        foreach ($admin as $ad){
            $ad->notify(new AppelEntrepriseCabinet($offre, $entreprise,));
            Mail::to($admin)->send(new AppelCabinet($entreprise, $offre));

        }

        return redirect()->back()->with('success', 'les cabinets ont recu lappel ');
        //$interlocuteur->user->notify(new AppelCandidatureNotification($interlocuteur->user));
        //$admin->notify(new AppelCandidatureNotification($admin));

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

        $offre = Offre::findOrFail($id);
        $offre->update($request->all());

        // Enregistrer les modifications
        $offre->save();
        return redirect()->back()->with('success', 'les données ont été modifiées avec succes');
    }

    
    public function duplicate(Offre $offre)
    {
        $newoffre = $offre->replicate();
        $newoffre->offrestatu = "En Cours";
        $newoffre->statuscabinet = 0;
        $newoffre->save();

        return redirect()->route('offres.show', $newoffre->id)->with('success', 'Offre dupliquée avec succès.');

    }     

//recherche de candidat pour le cabinet
    public function searchWithCabinet(Request $request, $id)
    {
        $offre = Offre::findOrFail($id);
        $propositions = Proposition::with('candidat.user')->where('offre_id', $offre->id)->latest()->paginate(5);
        $propositionscount = Proposition::with('candidat.user')->where('offre_id', $offre->id)->count();

        $auth = Auth::user();
        $inter = Interlocuteurcbt::where('user_id', $auth->id)->first();
        $cabinet = $inter->cabinet; 

        // Récupérer les critères de recherche depuis la requête
        // Ajoutez d'autres critères de recherche si nécessaire
        $criteria = $request->except('page');

        // Construire la requête de recherche
        $query = Candidat::where('cabinet_id', $cabinet->id);

        // Appliquer les critères de recherche à la requête
        foreach ($criteria as $key => $value) {
            if (!empty($value)) {
                $query->where($key, 'like', '%' . $value . '%'); 
            }
        }

        // Exécuter la requête
       $candidats = $query->latest()->paginate(10); 

        // Renvoyer les résultats à la vue appropriée
        return view('cabinets.candidatoffre', compact('candidats', 'offre', 'propositions', 'propositionscount', ));

       
    }

     // afficher un offre selection  partie: candidature pour un admin 
    public function showoffreadmin(string $id)
    {
       
        $offre = Offre::findOrFail($id);
        $candidats = Candidat::with('user', 'competences', 'experiences', 'formations', 'langues')->where('cabinet_id', null)->get();
        $candidatures = Candidature::with('candidat.user')->where('offre_id', $offre->id)->latest()->paginate(5);
        $candidaturescount = Candidature::with('candidat.user')->where('offre_id', $offre->id)->count();
        $candidatrecrutecount = Candidature::with('offre.entreprise.user')->where('offre_id', $offre->id)->where('reponese', "Recruté")->count();
        $candidatrefusecount = Candidature::with('offre.entreprise.user')->where('offre_id', $offre->id)->where('reponese', "Refusé")->count();
        $candidatdeclinecount = Candidature::with('offre.entreprise.user')->where('offre_id', $offre->id)->where('reponese', "Décliné")->count();
        $propositionscount = Proposition::with('candidat.cabinet')->where('offre_id', $offre->id)->count();

        return view('admin.showoffre', compact('offre', 'candidats', 'candidatures', 'candidaturescount', 'propositionscount', 'candidatrecrutecount', 'candidatrefusecount', 'candidatdeclinecount'));
    }
     // afficher les candidats sélectionnés recrutés  pour un admin 
     public function showoffrerecruteadmin(string $id)
     {
        
         $offre = Offre::findOrFail($id);
         $candidats = Candidat::with('user', 'competences', 'experiences', 'formations', 'langues')->where('cabinet_id', null)->get();
         $candidatures = Candidature::with('candidat.user')->where('offre_id', $offre->id)->where('reponese', "Recruté")->latest()->paginate(5);
         $candidaturescount = Candidature::with('candidat.user')->where('offre_id', $offre->id)->count();
         $candidatrecrutecount = Candidature::with('offre.entreprise.user')->where('offre_id', $offre->id)->where('reponese', "Recruté")->count();
         $candidatrefusecount = Candidature::with('offre.entreprise.user')->where('offre_id', $offre->id)->where('reponese', "Refusé")->count();
         $candidatdeclinecount = Candidature::with('offre.entreprise.user')->where('offre_id', $offre->id)->where('reponese', "Décliné")->count();
         $propositionscount = Proposition::with('candidat.cabinet')->where('offre_id', $offre->id)->count();
 
         return view('admin.candidatrecrute', compact('offre', 'candidats', 'candidatures', 'candidaturescount', 'propositionscount', 'candidatrecrutecount', 'candidatrefusecount', 'candidatdeclinecount'));
     }
     // afficher les candidats sélectionnés refusés  pour un admin 
     public function showoffrerefuseadmin(string $id)
     {
        
         $offre = Offre::findOrFail($id);
         $candidats = Candidat::with('user', 'competences', 'experiences', 'formations', 'langues')->where('cabinet_id', null)->get();
         $candidatures = Candidature::with('candidat.user')->where('offre_id', $offre->id)->where('reponese', "Refusé")->latest()->paginate(5);
         $candidaturescount = Candidature::with('candidat.user')->where('offre_id', $offre->id)->count();
         $candidatrecrutecount = Candidature::with('offre.entreprise.user')->where('offre_id', $offre->id)->where('reponese', "Recruté")->count();
         $candidatrefusecount = Candidature::with('offre.entreprise.user')->where('offre_id', $offre->id)->where('reponese', "Refusé")->count();
         $candidatdeclinecount = Candidature::with('offre.entreprise.user')->where('offre_id', $offre->id)->where('reponese', "Décliné")->count();
         $propositionscount = Proposition::with('candidat.cabinet')->where('offre_id', $offre->id)->count();
 
         return view('admin.candidatrefuse', compact('offre', 'candidats', 'candidatures', 'candidaturescount', 'propositionscount', 'candidatrecrutecount', 'candidatrefusecount', 'candidatdeclinecount'));
     }
     // afficher les candidats sélectionnés declinés  pour un admin 
     public function showoffredeclineadmin(string $id)
     {
        
         $offre = Offre::findOrFail($id);
         $candidats = Candidat::with('user', 'competences', 'experiences', 'formations', 'langues')->where('cabinet_id', null)->get();
         $candidatures = Candidature::with('candidat.user')->where('offre_id', $offre->id)->where('reponese', "Décliné")->latest()->paginate(5);
         $candidaturescount = Candidature::with('candidat.user')->where('offre_id', $offre->id)->count();
         $candidatrecrutecount = Candidature::with('offre.entreprise.user')->where('offre_id', $offre->id)->where('reponese', "Recruté")->count();
         $candidatrefusecount = Candidature::with('offre.entreprise.user')->where('offre_id', $offre->id)->where('reponese', "Refusé")->count();
         $candidatdeclinecount = Candidature::with('offre.entreprise.user')->where('offre_id', $offre->id)->where('reponese', "Décliné")->count();
         $propositionscount = Proposition::with('candidat.cabinet')->where('offre_id', $offre->id)->count();
 
         return view('admin.candidatdecline', compact('offre', 'candidats', 'candidatures', 'candidaturescount', 'propositionscount', 'candidatrecrutecount', 'candidatrefusecount', 'candidatdeclinecount'));
     }
     // afficher un offre selection partie: proposition pour un admin 
     public function showoffrepropadmin(string $id)
     {
        
         $offre = Offre::findOrFail($id);
         $candidats = Candidat::with('user', 'competences', 'experiences', 'formations', 'langues')->where('cabinet_id', null)->get();
         $propositions = Proposition::with('candidat.user')->where('offre_id', $offre->id)->latest()->paginate(5);
         $candidaturescount = Candidature::with('candidat.user')->where('offre_id', $offre->id)->count();
         $propositionscount = Proposition::with('candidat.cabinet')->where('offre_id', $offre->id)->count();
         $propositionsrecrutecount = Proposition::with('offre.entreprise.user')->where('offre_id', $offre->id)->where('reponseseproposition', "Recruté")->count();
         $propositionsrefusecount = Proposition::with('offre.entreprise.user')->where('offre_id', $offre->id)->where('reponseseproposition', "Refusé")->count();
         
         return view('admin.showoffreprop', compact('offre', 'candidats', 'propositions', 'candidaturescount', 'propositionscount','propositionsrecrutecount','propositionsrefusecount'  ));
     }
// afficher un offre selection partie: proposition  recruté pour un admin 
public function showoffrerecrutepropadmin(string $id)
{
   
    $offre = Offre::findOrFail($id);
    $candidats = Candidat::with('user', 'competences', 'experiences', 'formations', 'langues')->where('cabinet_id', null)->get();
    $propositions = Proposition::with('candidat.user')->where('offre_id', $offre->id)->where('reponseseproposition', "Recruté")->latest()->paginate(5);
    $candidaturescount = Candidature::with('candidat.user')->where('offre_id', $offre->id)->count();
    $propositionscount = Proposition::with('candidat.cabinet')->where('offre_id', $offre->id)->count();
    $propositionsrecrutecount = Proposition::with('offre.entreprise.user')->where('offre_id', $offre->id)->where('reponseseproposition', "Recruté")->count();
    $propositionsrefusecount = Proposition::with('offre.entreprise.user')->where('offre_id', $offre->id)->where('reponseseproposition', "Refusé")->count();
    
    return view('admin.showoffrerecruteprop', compact('offre', 'candidats', 'propositions', 'candidaturescount', 'propositionscount','propositionsrecrutecount','propositionsrefusecount'  ));
}
// afficher un offre selection partie: proposition  recruté pour un admin 
public function showoffrerefusepropadmin(string $id)
{
   
    $offre = Offre::findOrFail($id);
    $candidats = Candidat::with('user', 'competences', 'experiences', 'formations', 'langues')->where('cabinet_id', null)->get();
    $propositions = Proposition::with('candidat.user')->where('offre_id', $offre->id)->where('reponseseproposition', "Refusé")->latest()->paginate(5);
    $candidaturescount = Candidature::with('candidat.user')->where('offre_id', $offre->id)->count();
    $propositionscount = Proposition::with('candidat.cabinet')->where('offre_id', $offre->id)->count();
    $propositionsrecrutecount = Proposition::with('offre.entreprise.user')->where('offre_id', $offre->id)->where('reponseseproposition', "Recruté")->count();
    $propositionsrefusecount = Proposition::with('offre.entreprise.user')->where('offre_id', $offre->id)->where('reponseseproposition', "Refusé")->count();
    
    return view('admin.showoffrerefuseprop', compact('offre', 'candidats', 'propositions', 'candidaturescount', 'propositionscount','propositionsrecrutecount','propositionsrefusecount'  ));
}
     // afficher un cv detaille candidat : pour pour un admin 
     public function showcvdetaille(string $id)
     {
        $can = Candidat::with('user', 'competences', 'experiences', 'formations', 'langues', 'references')->findOrFail($id);
        $candidature = Candidature::where('candidat_id', $can->id)->latest()->paginate(5);
        $candidaturecount = Candidature::where('candidat_id', $can->id)->count();

        return view('admin.showcvdetaille',  compact('can', 'candidature', 'candidaturecount'));
     }
      // afficher un cv detaille candidat : pour  une entreprise 
      public function showcvdetailleese(string $id)
      {
         $can = Candidat::with('user', 'competences', 'experiences', 'formations', 'langues', 'references')->findOrFail($id);
         // Incrémenter le compteur de vues
        $can->increment('views_count');
         return view('entreprises.showcvdetaille', compact('can'));
      }

      // voir les offres encours pour l' admin
public function offreencoursadmin()
{
   
    $offres = Offre::where('offrestatu', "En Cours")->latest()->paginate(10);
    $offrescount= Offre::with('entreprise.user')->count();
    $encours = Offre::where('offrestatu', "En Cours")->count();
    $expire = Offre::where('offrestatu', "Cloturée")->count();
    $standby = Offre::where('offrestatu', "StandBy")->count();

    return view('admin.offreencours', compact('offres','encours','expire', 'offrescount'));
}
// voir les offres expirée pour l' admin
public function offreexpireadmin()
{

    $offres = Offre::where('offrestatu', "Cloturée")->latest()->paginate(10);
    $offrescount= Offre::with('entreprise.user')->count();
    $encours = Offre::where('offrestatu', "En Cours")->count();
    $expire = Offre::where('offrestatu', "Cloturée")->count();
    $standBy = Offre::where('offrestatu', "StandBy")->count();

    return view('admin.offreexpire', compact('offres', 'standBy', 'encours','expire', 'offrescount'));
}
 // voir les offres encours pour le cabinet
 public function offreencourscabinet()
 {
    
     $offres = Offre::where('offrestatu', "En Cours")->where('statuscabinet', 1)->orderBy('updated_at', 'desc')->paginate(6);
     $offrescount = Offre::with('entreprise.user')->where('statuscabinet', 1)->count();
     $offresencours = Offre::where('offrestatu', "En Cours")->where('statuscabinet', 1)->count();
     $offresexpire = Offre::where('offrestatu', "Cloturée")->where('statuscabinet', 1)->count();

     return view('cabinets.offreencours', compact('offres', 'offrescount', 'offresencours', 'offresexpire'));
 }
 // voir les offres expirée pour le cabinet
 public function offreexpirecabinet()
 {
 
     $offres = Offre::where('offrestatu', "Cloturée")->where('statuscabinet', 1)->latest()->paginate(6);
     $offrescount = Offre::with('entreprise.user')->where('statuscabinet', 1)->count();
     $offresexpire = Offre::where('offrestatu', "Cloturée")->where('statuscabinet', 1)->count();
     $offresencours = Offre::where('offrestatu', "En Cours")->where('statuscabinet', 1)->count();

     return view('cabinets.offreexpire', compact('offres', 'offrescount', 'offresexpire', 'offresencours'));
 }
 

}
