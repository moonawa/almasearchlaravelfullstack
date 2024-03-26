<?php

namespace App\Http\Controllers;

use App\Models\Cabinet;
use App\Models\Candidat;
use App\Models\Entreprise;
use App\Models\Offre;
use App\Models\User;
use App\Notifications\StatusNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin()
    {
        
        $admin = User::where('alma', 1)->get();
        return view('admin.listadmin', compact('admin'));
    }
    // list des offres pour l'admin
    public function listoffreadmin()
    {
        $offres= Offre::with('entreprise.user')->get();
        return view('admin.listoffre', compact('offres'));
    }
    // list des entreprises pour l'admin
    public function listentrepriseadmin()
    {
        $entreprises = Entreprise::with('user')->get();
        return view('admin.listentreprise', compact('entreprises'));
    }
    // list des cabinets pour l'admin
    public function listcabinetadmin()
    {
        $cabinets = Cabinet::with('user')->get();
        return view('admin.listcabinet', compact('cabinets', ));
    }
    
    // list des candidats vip pour l'admin
    public function listcandidatadmin()
    {
        $candidats = Candidat::with('user')->where('cabinet_id', null)->get();
        return view('admin.listcandidatvip', compact('candidats'));
    }
    // list des candidats pour l'admin
    public function listcandidatnonadmin()
    {
        $candidats = Candidat::with('cabinet.user')->whereNotNull('cabinet_id')->get();
        return view('admin.listcandidat', compact('candidats'));
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

        return view('admin.dashboardadmin', compact('candidatcount', 'candidatvipcount', 'admin', 'cabinetcount', 'entreprisecount', 'offrecount','offreencourscount', 'offreexpirecount'));
    }

    // profil admin
    public function show()
    {
        $user = Auth::user();
        return view('admin.show', compact('user'));
    }

    //modifier le status de l'entreprise
    public function updateStatusEntreprise(Request $request ,$id)
    {
        $entreprise = Entreprise::findOrFail($id);

        if ($entreprise) {
            $entreprise->user->status = !$entreprise->user->status;
            $entreprise->user->save();

            $entreprise->user->notify(new StatusNotification());
            return redirect()->back()->with('success', 'le status de l\'entreprise a été modifié avec succes');

        } else {
            return redirect()->back()->with('', 'le status de l\'entreprise a été modifié avec succes');
        }

}

    //modifier le status de l'entreprise
    public function updateStatusCabinet(Request $request ,$id)
    {
        $cabinet = Cabinet::findOrFail($id);

        if ($cabinet) {
            $cabinet->user->status = !$cabinet->user->status;
            $cabinet->user->save();

            $cabinet->user->notify(new StatusNotification());

            return redirect()->back()->with('success', 'le status de l\'cabinet a été modifié avec succes');
        } else {
            return redirect()->back()->with('', 'le status de l\'cabinet a été modifié avec succes');
        }

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

