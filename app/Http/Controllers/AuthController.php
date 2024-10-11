<?php

namespace App\Http\Controllers;

use App\Models\Cabinet;
use App\Models\Candidat;
use App\Models\Entreprise;
use App\Models\Interlocuteur;
use App\Models\Interlocuteurcbt;
use App\Models\Interlocuteurese;
use App\Models\User;
use App\Notifications\InscriptionCabinet;
use App\Notifications\InscriptionEntreprise;
use App\Notifications\NotificationMail;
use App\Notifications\RegisteredNotification;
use Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
     //register admin
     public function registeradmin()
     {
         return view('auth/registeradmin');
     }
    public function registerSaveadmin(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = 'Admin';
        $user->telephone = $request->telephone;
        $user->alma = 1;
        $user->status = 1;
        $user->posteuser = $request->posteuser;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', 'l utilisateur a été ajouté avec succès');
    }
     //register Superadmin
     public function registerSuperadmin()
     {
         return view('auth/registersuperadmin');
     }
     public function registerSaveSuperadmin(Request $request)
     {
         $user = new User();
         $user->name = $request->name;
         $user->email = $request->email;
         $user->role = 'SuperAdmin';
         $user->telephone = $request->telephone;
         $user->alma = 1;
         $user->status = 1;
         $user->password = Hash::make($request->password);
         $user->save();

         return redirect()->back()->with('success', 'l utilisateur  a été ajouté avec succès');
     }
     //register entreprise
    public function register()
    {
        return view('auth/registerentreprise');
    }
    public function registerSave(Request $request)
    {
        $user = new User();
        $user->name = $request->first_name . ' ' . $request->last_name;
        $user->email = $request->email;
        $user->role = 'Entreprise';
        $user->telephone = $request->telephone;
        $user->alma = 0;
        $user->status = 0;
        $user->password = Hash::make("A#w!88a32");
        $user->save();

        $pass= $user->password;

        $nineaName = null;
        $rcName = null;
        if($request->hasFile('ninea')) {
            $nineaName = time().'.'.$request->ninea->extension();
            $request->ninea->move(public_path('uploads'), $nineaName);
        }
        if($request->hasFile('rc')) {
            $rcName = time().'.'.$request->rc->extension();
            $request->rc->move(public_path('uploads'), $rcName);
        }
        $ese = new Entreprise();
        $ese->rc = $rcName;
        $ese->ninea = $nineaName;
        $ese->secteuractivite =  $request->secteuractivite;
        $ese->nomentreprise =  $request->nomentreprise;
        $ese->des =  $request->des;
        $ese->save();

        $inter = new Interlocuteurese();
        $inter->fonction = $request->fonction;
        $inter->user_id = $user->id;
        $inter->entreprise_id = $ese->id;
        $inter->save();
        $inter->user->notify(new RegisteredNotification());


        // envoi mail a l'admin
        $admin = User::where('role', 'Admin')->get();
        foreach ($admin as $ad) {
            $ad->notify(new InscriptionEntreprise($ese));
            $ad->notify(new NotificationMail($admin));
        }
       
           
        return redirect()->back()->with('success', 'Votre inscription a été bien enregistré vous serez avertit par mail des que votre compte sera validé .');
   // $details = [
             //   'title' => 'Nouvelle inscription entreprise',
             //   'body' => 'Une nouvelle entreprise s\'est inscrite sur la plateforme'
            //];
           // Mail::to($admin->email)->send(new NotificationMail($details));
            //Mail::send('email.creationcompte', ['details' => $details], function($message) use($admin) {
            //    $message->to($admin->email);
           //     $message->subject('Création de compte');
           // });
       // return redirect()->route('login');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function markAsRead(Request $request, $id)
    {
        $notification = auth()->user()->unreadNotifications->find($id);
        $notification->markAsRead();

        return back()->with('success', 'Marqué comme lu.');
    }
public function unauthorized(){
    return view('auth.unauthorized');
}
    //register candidatvip
    public function registercandidat()
    {
        return view('auth/registercandidatvip');
    }
    public function registerSavecandidatvip(Request $request)
    {
        $request->validate([
            'birthday' => 'required|date|before_or_equal:' . \Carbon\Carbon::now()->subYears(18)->format('Y-m-d'),
        ],
        [
            'birthday.before_or_equal' => 'Vous devez avoir au moins 18 ans pour vous inscrire.',
        ]); 
         // Vérification si un utilisateur avec cet email ou ce numéro de téléphone existe déjà
    $userExistant = User::where('email', $request->email)
    ->orWhere('telephone', $request->telephone)
    ->first();

if ($userExistant) {
    // Vérifier si cet utilisateur est déjà associé à un autre cabinet (via la table candidats)
    $candidatExistant = Candidat::where('user_id', $userExistant->id)->first();

    if ($candidatExistant) {
        return redirect()->back()->withErrors(['error' => 'Vous avez deja été inscrit dans la plateforme (soit par un cabinet soit par vous même).']);
    }
}
else{
        $user = new User();
        $user->name = $request->first_name . ' ' . $request->last_name;
        $user->email = $request->email;
        $user->role = 'CandidatVIP';
        $user->telephone = $request->telephone;
        $user->alma = 0;
        $user->status = 1;
        $user->password = Hash::make($request->password);
        $user->save();

        $cvName = null;
        if ($request->hasFile('cv')) {
            $cvName = time().'.'.$request->cv->extension();
            $request->cv->move(public_path('uploads'), $cvName);
        }
        $candidat = new Candidat();
        $candidat->nationnalite = $request->nationnalite;
        $candidat->genre = $request->genre;
        $candidat->disponibilite = $request->disponibilite;
        $candidat->birthday =  $request->birthday;
        $candidat->user_id = $user->id;
        $candidat->cv = $cvName;
        $candidat->save();
        return redirect()->route('login')->with('success', 'Votre inscription a été bien enregistré vous pouvez vous connecter sur votre profile .');   
    }

    }

    //register cabinet
    public function registercabinet()
    {
        return view('auth/registercabinet');
    }
    public function registerSavecabinet(Request $request)
    {
        
            $user = User::create([
                'name' => $request->first_name . ' ' . $request->last_name,
                'email' => $request->email,
                'role' => 'Cabinet',
                'telephone' => $request->telephone,
                'alma' => 0,
                'status' => 0,
                'password' => Hash::make("A#w!88a32"),
            ]);
            $nineacabinetName = null;
            $rccabinetName = null;
            if ($request->hasFile('nineacabinet')) {
                $nineacabinetName = time().'.'.$request->nineacabinet->extension();
                $request->nineacabinet->move(public_path('uploads'), $nineacabinetName);
            }
            if ($request->hasFile('rccabinet')) {
                $rccabinetName = time().'.'.$request->rccabinet->extension();
                $request->rccabinet->move(public_path('uploads'), $rccabinetName);
            }
            $cabinet = Cabinet::create([
                'secteuractivitecabinet' => $request->secteuractivitecabinet,
                'nineacabinet' => $nineacabinetName,
                'rccabinet' => $rccabinetName,
                'telcbt'  =>  $request->telcbt,
                'descabinet'  =>  $request->descabinet,
                'nomcabinet'  =>  $request->nomcabinet,
                'emailcbt'   => $request->emailcbt
            ]);
            $intercbt =  Interlocuteurcbt::create([
                'fonctioncbt' => $request->fonctioncbt,
                'user_id' => $user->id,
                'cabinet_id' => $cabinet->id,
               
            ]);
            $intercbt->user->notify(new RegisteredNotification());

            $admin = User::where('role', 'Admin')->get();
            foreach ($admin as $ad) {
                $ad->notify(new InscriptionCabinet($cabinet));
                $ad->notify(new NotificationMail($ad));

            }

            $details = [
                'title' => 'Nouvelle inscription entreprise',
                'body' => 'Une nouvelle entreprise s\'est inscrite sur la plateforme.'
            ];
            
            return redirect()->back()->with('success', 'Votre inscription a été bien enregistré vous serez avertit par mail des que votre compte sera validé .');

        
    }
  
    public function login()
    {
        return view('auth/login');
    }
    public function loginAction(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();
  
        $credentials = $request->only('email', 'password');

        // Ajouter la vérification du statut ici
        $credentials['status'] = 1;

        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('Votre email ou mot de passe est invalide.')
            ]);
        }

        $request->session()->regenerate();

// Récupérer l'utilisateur authentifié
$user = Auth::user();

// Rediriger l'utilisateur en fonction de son rôle
switch ($user->role) {
    case 'Admin':
        $user->last_login_at = now();
        $user->save();
        return redirect()->route('dashboardadmin');
        break;
    case 'SuperAdmin':
        $user->last_login_at = now();
        $user->save();
            return redirect()->route('dashboardSuperAdmin');
            break;
    case 'CandidatVIP':
        $user->last_login_at = now();
        $user->save();
        return redirect()->route('dashboardcandidatvip');
        break;
    case 'Entreprise':
        $user->last_login_at = now();
        $user->save();
        return redirect()->route('dashboard');
        break;
    case 'Cabinet':
        $user->last_login_at = now();
        $user->save();
        return redirect()->route('dashboardcabinet');
        break;
    default:
        // Redirection par défaut au cas où le rôle n'est pas reconnu
        return redirect()->route('intrus');
        break;
}
}
        //    return redirect()->route('dashboard');
        
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
  
        $request->session()->invalidate();
  
        return redirect('/');
    }
 
    public function profile()
    {
        return view('profile');
    }

    public function dashboard()
    {
        
        return view('entreprises/dashboard');
    }
    public function dashboardadmin()
    {
        return view('admin/dashboardadmin');
    }
    public function dashboardSuperadmin()
    {
        return view('admin/dashboardsuper');
    }
    public function dashboardcandidatvip()
    {
       
       
        return view('candidatvip/dashboard',);
    }
    public function dashboardcabinet()
    {
        return view('cabinets/dashboard');
    }
    public function intrus()
    {
        return view('auth/intrus');
    }
    public function interlocuteurentreprise(Request $request)
    {
        $connecte = Auth::user();
        $entreprise = Entreprise::where('user_id', $connecte->id)->first();

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'role' => 'Entreprise',
                'telephone' => $request->telephone,
                'alma' => 0,
                'status' => 1,
                'password' => Hash::make($request->password),
            ]);
          
            Interlocuteur::create([
                'entreprise_id' => $entreprise->id,
                'fonction' => $request->fonction,
                'user_id' => $user->id,
               
            ]);
            
            return redirect()->route('login')->with('success', 'Votre compte cabinet a été créé avec succès.');   
        
    }
}
