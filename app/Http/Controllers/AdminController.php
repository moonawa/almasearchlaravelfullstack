<?php

namespace App\Http\Controllers;

use App\Models\Cabinet;
use App\Models\Candidat;
use App\Models\Candidature;
use App\Models\Entreprise;
use App\Models\Interlocuteurcbt;
use App\Models\Interlocuteurese;
use App\Models\Offre;
use App\Models\User;
use App\Notifications\StatusNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin()
    {
        
        $admin = User::where('alma', 1)->latest()->paginate(10);
        $admincount = User::where('alma', 1)->count();
        return view('admin.listadmin', compact('admin', 'admincount'));
    }
    // list des offres pour l'admin
    public function listoffreadmin()
    {
        $offres= Offre::with('entreprise.user')->latest()->paginate(10);
        $offrescount= Offre::with('entreprise.user')->count();
        $encours = Offre::where('statusoffre', 0)->count();
        $expire = Offre::where('statusoffre', 1)->count();
        return view('admin.listoffre', compact('offres', 'offrescount', 'encours','expire'));
    }
    // list des entreprises pour l'admin
    public function listentrepriseadmin()
    {
        $entreprises = Entreprise::with('interlocuteureses.user')->latest()->paginate(10);
        $entreprisescount = Entreprise::with('interlocuteureses.user')->count();

        return view('admin.listentreprise', compact('entreprises', 'entreprisescount'));
    }
     // list des interlocuteurs d'une entreprise pour l'admin
     public function listinterentrepriseadmin(string $id)
     {
         $entreprise = Entreprise::with('interlocuteureses')->findOrFail($id);
         $inters = Interlocuteurese::with('user')->where('entreprise_id', $entreprise->id)->latest()->paginate(5);
         $offres = Offre::where('entreprise_id', $entreprise->id)->latest()->paginate(5);
         $interscount = Interlocuteurese::with('user')->where('entreprise_id', $entreprise->id)->count();
         $offrescount = Offre::where('entreprise_id', $entreprise->id)->count();
         return view('admin.listinterentreprise', compact('entreprise', 'interscount', 'offrescount', 'inters', 'offres'));
     }
     // list des interlocuteurs d'un cabinet pour l'admin
     public function listintercabinetadmin(string $id)
     {
         $entreprise = Cabinet::with('interlocuteurcbts')->findOrFail($id);
         $inters = Interlocuteurcbt::with('user')->where('cabinet_id', $entreprise->id)->latest()->paginate(5);
         $offres = Candidat::where('cabinet_id', $entreprise->id)->latest()->paginate(5);
         $interscount = Interlocuteurcbt::with('user')->where('cabinet_id', $entreprise->id)->count();
         $offrescount = Candidat::where('cabinet_id', $entreprise->id)->count();
         return view('admin.listintercabinet', compact('entreprise', 'interscount', 'offrescount', 'inters', 'offres'));
     }
    // list des cabinets pour l'admin
    public function listcabinetadmin()
    {
        $cabinets  =  Cabinet::with('interlocuteurcbts.user')->latest()->paginate(10);
        $cabinetscount  =  Cabinet::with('interlocuteurcbts.user')->count();

        return view('admin.listcabinet', compact('cabinets', 'cabinetscount'));


       // $cabinets = Cabinet::withCount('candidats')
        //    ->with('user')
          //  ->get()
            //->map(function ($rs) {
              //  $rs->proposition_count = $rs->candidats->sum(function ($candidat) {
                //    return $candidat->propositions->count();
                //});
                //return $rs;
            //});

        //$cabinets = Cabinet::with('candidats.candidatures')->with('user')->paginate(10);
    }
  
    // list des candidats  pour l'admin
    public function listcandidatadmin()
    {
        $candidats = Candidat::withCount('candidatures')->with('user')->where('cabinet_id', null)->latest()->paginate(10);
        $candidatscount = Candidat::withCount('candidatures')->with('user')->where('cabinet_id', null)->count();
        $vipcount = Candidat::withCount('candidatures')->with('user')->where('cabinet_id', null)->where('vip', 'oui')->count();
        $nonvipcount = Candidat::withCount('candidatures')->with('user')->where('cabinet_id', null)->where('vip', 'non')->count();

        return view('admin.listcandidatvip', compact('candidats', 'candidatscount', 'vipcount', 'nonvipcount' ));
    }
    // list des candidats vip pour l'admin
    public function listvipadmin()
    {
        $candidats = Candidat::withCount('candidatures')->with('user')->where('cabinet_id', null)->where('vip', 'oui')->latest()->paginate(10);
        $candidatscount = Candidat::withCount('candidatures')->with('user')->where('cabinet_id', null)->count();
        $vipcount = Candidat::withCount('candidatures')->with('user')->where('cabinet_id', null)->where('vip', 'oui')->count();
        $nonvipcount = Candidat::withCount('candidatures')->with('user')->where('cabinet_id', null)->where('vip', 'non')->count();

        return view('admin.listcandidatvipoui', compact('candidats', 'candidatscount', 'vipcount', 'nonvipcount' ));
    }
    // list des candidats non vip pour l'admin
    public function listnonvipadmin()
    {
        $candidats = Candidat::withCount('candidatures')->with('user')->where('cabinet_id', null)->where('vip', 'non')->latest()->paginate(10);
        $candidatscount = Candidat::withCount('candidatures')->with('user')->where('cabinet_id', null)->count();
        $vipcount = Candidat::withCount('candidatures')->with('user')->where('cabinet_id', null)->where('vip', 'oui')->count();
        $nonvipcount = Candidat::withCount('candidatures')->with('user')->where('cabinet_id', null)->where('vip', 'non')->count();

        return view('admin.listcandidatvipnon', compact('candidats', 'candidatscount', 'vipcount', 'nonvipcount' ));
    }
    
    public function updatevip(Request $request, $id)
    {
    $candidat = Candidat::findOrFail($id);
    $candidat->vip = $request->input('vip');
    $candidat->save();
    return redirect()->back()->with('success', 'le status du candidat a été modifié avec succes');
    }
    // list des candidats pour l'admin
    public function listcandidatnonadmin()
    {
        $candidats = Candidat::with('cabinet.user')->whereNotNull('cabinet_id')->latest()->paginate(10);
        $candidatscount = Candidat::with('cabinet.user')->whereNotNull('cabinet_id')->count();

        return view('admin.listcandidat', compact('candidats', 'candidatscount'));
    }
    public function count()
    {
        $candidatcount = Candidat::with('user')->whereNotNull('cabinet_id')->count();
        $candidatvipcount = Candidat::with('user')->where('cabinet_id', null)->count();
        $cabinetcount = Cabinet::with('user')->count();
        $entreprisecount = Entreprise::with('user')->count();
        $offrecount = Offre::with('entreprise.user')->count();
        $offreencourscount = Offre::where('statusoffre', 0)->count();
        $offreexpirecount = Offre::where('statusoffre', 1)->count();
        $admin = User::where('alma', 1)->count();
        //TOP CABINET
        $topcabinets = Cabinet::orderBy('view_count', 'desc')->take(5)->get();
        return view('admin.dashboardadmin', compact('topcabinets','candidatcount', 'candidatvipcount', 'admin', 'cabinetcount', 'entreprisecount', 'offrecount','offreencourscount', 'offreexpirecount'));
    }

    // profil admin
    public function show()
    {
        $user = Auth::user();
        return view('admin.show', compact('user'));
    }

    //modifier le status de l'entreprise
    public function updateStatusEntreprise($id)
    {
// Récupérer l'entreprise
$entreprise = Entreprise::findOrFail($id);

// Récupérer le premier interlocuteur
$interlocuteur = $entreprise->interlocuteureses()->first();

if ($interlocuteur) {
    // Récupérer le user associé à cet interlocuteur
    $user = $interlocuteur->user;

    // Inverser le statut du user
    $user->status = !$user->status ;
    $user->save();
$user->notify(new StatusNotification());

    return back()->with('success', 'Le statut de l\'interlocuteur a été mis à jour.');
} else {
    return back()->with('error', 'Aucun interlocuteur trouvé pour cette entreprise.');
}
       // if ($entreprise) {
       // $user->status = !$user->status == 'active' ? 'blocked' : 'active';

         //   $entreprise->user->status = !$entreprise->user->status;
           // $entreprise->user->save();

           // $entreprise->user->notify(new StatusNotification());
          //  return redirect()->back()->with('success', 'le status de l\'entreprise a été modifié avec succes');

      //  } else {
           // return redirect()->back()->with('', 'le status de l\'entreprise a été modifié avec succes');
       // }

}

    //modifier le status de l'entreprise
    public function updateStatusCabinet(Request $request ,$id)
    {
        $cabinet = Cabinet::findOrFail($id);
        $interlocuteur = $cabinet->interlocuteurcbts()->first();
        if ($interlocuteur) {
            // Récupérer le user associé à cet interlocuteur
            $user = $interlocuteur->user;
        
            // Inverser le statut du user
            $user->status = !$user->status ;
            $user->save();
        $user->notify(new StatusNotification());
        
            return back()->with('success', 'Le statut de l\'interlocuteur a été mis à jour.');
        } else {
            return back()->with('error', 'Aucun interlocuteur trouvé pour cette entreprise.');
        }
        //if ($cabinet) {
          //  $cabinet->user->status = !$cabinet->user->status;
           // $cabinet->user->save();

            //$cabinet->user->notify(new StatusNotification());

         //   return redirect()->back()->with('success', 'le status de l\'cabinet a été modifié avec succes');
        //} else {
          //  return redirect()->back()->with('', 'le status de l\'cabinet a été modifié avec succes');
       // }

}
//modifier le status de l'entreprise
public function updateStatusAdmin(Request $request ,$id)
{
    $user = User::findOrFail($id);
    $user->status = !$user->status;
    $user->save();
    return redirect()->back()->with('success', 'le status a été modifié avec succes');
    
   

}
}

