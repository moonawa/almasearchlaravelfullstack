<?php

namespace App\Http\Controllers;

use App\Models\AttestionBac;
use App\Models\AutresDiplomes;
use App\Models\Candidat;
use App\Models\Certificat;
use App\Models\Doctorat;
use App\Models\Licence;
use App\Models\Master;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LicenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexCNI()
    {
        $user = Auth::user();
         $candidat = Candidat::where('user_id', $user->id)->first();
         return view('candidatvip.cni', compact('candidat'));
    }
    public function indexLicence()
    {
        $user = Auth::user();
         $candidat = Candidat::where('user_id', $user->id)->first();
         $licences = Licence::where('candidat_id', $candidat->id)->get();  

         return view('candidatvip.document', compact('licences'));
    }
    public function indexMaster()
    {
        $user = Auth::user();
         $candidat = Candidat::where('user_id', $user->id)->first();
         $masters = Master::where('candidat_id', $candidat->id)->get();   
         return view('candidatvip.master', compact( 'masters',));
    } 
    public function indexDoctorat()
    {
        $user = Auth::user();
         $candidat = Candidat::where('user_id', $user->id)->first(); 
         $doctorats = Doctorat::where('candidat_id', $candidat->id)->get();   
         return view('candidatvip.doctorat', compact('doctorats'));
    }
    public function indexAutre()
    {
        $user = Auth::user();
         $candidat = Candidat::where('user_id', $user->id)->first();
        $autres = AutresDiplomes::where('candidat_id', $candidat->id)->get();   

         return view('candidatvip.autrediplome', compact( 'autres'));
    }
    public function indexAttestation()
    {
        $user = Auth::user();
         $candidat = Candidat::where('user_id', $user->id)->first();
        $attestations = AttestionBac::where('candidat_id', $candidat->id)->get();   

         return view('candidatvip.attestation', compact( 'attestations'));
    }
    public function indexCertificat()
    {
        $user = Auth::user();
         $candidat = Candidat::where('user_id', $user->id)->first();
        $certificats = Certificat::where('candidat_id', $candidat->id)->get();   

         return view('candidatvip.certificat', compact('certificats'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }
    public function storeCNI(Request $request)
    {
        $request->validate([
            'cni' => 'sometimes|mimes:pdf,docx,jpg,jpeg,png|max:2048',
        ], [
            'cni.max' => 'La taille maximale autorisée pour le fichier est de 2 Mo.',
       
            'cni.mimes' => 'Le document doit etre au format: pdf ou docx ou jpg ou jpeg ou png.',
        ]);
        if ($request->hasFile('cni')) {
        $cniName = time().'.'.$request->cni->extension();  
        $request->cni->move(public_path('uploads'), $cniName);
        }
        $user = Auth::user();
        $candidat = Candidat::where('user_id', $user->id)->firstOrFail();
        
         if (isset($cniName)) {
            $candidat->cni = $cniName;
        }
         $candidat->save();
         return redirect()->route('cni')->with('success', 'Document ajouté avec succès');
    }
    public function storePasseport(Request $request)
    {
        $request->validate([
            'passeport' => 'sometimes|mimes:pdf,docx,jpg,jpeg,png|max:2048',
        ], [
            'passeport.max' => 'La taille maximale autorisée pour le fichier est de 2 Mo.',
        
            'passeport.mimes' => 'Le document doit etre au format: pdf ou docx ou jpg ou jpeg ou png.',
        ]);
        if ($request->hasFile('passeport')) {
        $passeportName = time().'.'.$request->passeport->extension();  
        $request->passeport->move(public_path('uploads'), $passeportName);
        }
        $user = Auth::user();
        $candidat = Candidat::where('user_id', $user->id)->firstOrFail();
        
         if (isset($passeportName)) {
            $candidat->passeport = $passeportName;
        }
         $candidat->save();
         return redirect()->route('cni')->with('success', 'Document ajouté avec succès');
    }
    public function storeCasier(Request $request)
    {
        $request->validate([
            'casier' => 'sometimes|mimes:pdf,docx,jpg,jpeg,png|max:2048',
        ], [
            'casier.max' => 'La taille maximale autorisée pour le fichier est de 2 Mo.',
        
            'casier.mimes' => 'Le document doit etre au format: pdf ou docx ou jpg ou jpeg ou png.',
        ]);
        if ($request->hasFile('casier')) {
        $casierName = time().'.'.$request->casier->extension();  
        $request->casier->move(public_path('uploads'), $casierName);
        }
        $user = Auth::user();
        $candidat = Candidat::where('user_id', $user->id)->firstOrFail();
        
         if (isset($casierName)) {
            $candidat->casier = $casierName;
        }
         $candidat->save();
         return redirect()->route('cni')->with('success', 'Document ajouté avec succès');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function storeLicence(Request $request)
    {
        $request->validate([
            'licence' => 'sometimes|mimes:pdf,docx,jpg,jpeg,png|max:2048',
        ], [
            'licence.mimes' => 'Le document doit être au format : pdf, docx, jpg, jpeg ou png.',
            'licence.max' => 'La taille maximale autorisée pour le fichier est de 2 Mo.',
        ]);
        
        if ($request->hasFile('licence')) {
        $licenceName = time().'.'.$request->licence->extension();  
        $request->licence->move(public_path('uploads'), $licenceName);
        }
        $user = Auth::user();
         $candidat = Candidat::where('user_id', $user->id)->first();
         $licence = new Licence();
         $licence->nomlicence = $request->nomlicence;
         $licence->candidat_id = $candidat->id;
         if (isset($licenceName)) {
            $licence->licence = $licenceName;
        }
         $licence->save();
         return redirect()->route('documents')->with('success', 'Document ajouté avec succès');
    }
    public function storeMaster(Request $request)
    {
        $request->validate([
            'master' => 'sometimes|mimes:pdf,docx,jpg,jpeg,png|max:2048',
        ], [
            'master.max' => 'La taille maximale autorisée pour le fichier est de 2 Mo.',
        
        
            'master.mimes' => 'Le document doit etre au format: pdf ou docx ou jpg ou jpeg ou png.',
        ]);
        if ($request->hasFile('master')) {
        $masterName = time().'.'.$request->master->extension();  
        $request->master->move(public_path('uploads'), $masterName);
        }
        $user = Auth::user();
         $candidat = Candidat::where('user_id', $user->id)->first();
         $master = new Master();
         $master->nommaster = $request->nommaster;
         $master->candidat_id = $candidat->id;
         if (isset($masterName)) {
            $master->master = $masterName;
        }
         $master->save();
         return redirect()->route('masters')->with('success', 'Document ajouté avec succès');
    }
    public function storeDoctorat(Request $request)
    {
        $request->validate([
            'doctorat' => 'sometimes|mimes:pdf,docx,jpg,jpeg,png|max:2048',
        ], [
            'doctorat.max' => 'La taille maximale autorisée pour le fichier est de 2 Mo.',
       
            'doctorat.mimes' => 'Le document doit etre au format: pdf ou docx ou jpg ou jpeg ou png.',
        ]);
        if ($request->hasFile('doctorat')) {
        $doctoratName = time().'.'.$request->doctorat->extension();  
        $request->doctorat->move(public_path('uploads'), $doctoratName);
        }
        $user = Auth::user();
         $candidat = Candidat::where('user_id', $user->id)->first();
         $doctorat = new Doctorat();
         $doctorat->nomdoctorat = $request->nomdoctorat;
         $doctorat->candidat_id = $candidat->id;
         if (isset($doctoratName)) {
            $doctorat->doctorat = $doctoratName;
        }
         $doctorat->save();
         return redirect()->route('doctorats')->with('success', 'Document ajouté avec succès');
    }
    public function storeAttessation(Request $request)
    {
        $request->validate([
            'attestion' => 'sometimes|mimes:pdf,docx,jpg,jpeg,png|max:2048',
        ], [
            'attestion.max' => 'La taille maximale autorisée pour le fichier est de 2 Mo.',
        
            'attestion.mimes' => 'Le document doit etre au format: pdf ou docx ou jpg ou jpeg ou png.',
        ]);
        if ($request->hasFile('attestion')) {
        $attestionName = time().'.'.$request->attestion->extension();  
        $request->attestion->move(public_path('uploads'), $attestionName);
        }
        $user = Auth::user();
         $candidat = Candidat::where('user_id', $user->id)->first();
         $attestion = new AttestionBac();
         $attestion->nomattestion = $request->nomattestion;
         $attestion->candidat_id = $candidat->id;
         if (isset($attestionName)) {
            $attestion->attestion = $attestionName;
        }
         $attestion->save();
         return redirect()->route('attestations')->with('success', 'Document ajouté avec succès');
    }
    public function storeCertificat(Request $request)
    {
        $request->validate([
            'certificat' => 'sometimes|mimes:pdf,docx,jpg,jpeg,png|max:2048',
        ], [
            'certificat.max' => 'La taille maximale autorisée pour le fichier est de 2 Mo.',
        
            'certificat.mimes' => 'Le document doit etre au format: pdf ou docx ou jpg ou jpeg ou png.',
        ]);
        if ($request->hasFile('certificat')) {
        $certificatName = time().'.'.$request->certificat->extension();  
        $request->certificat->move(public_path('uploads'), $certificatName);
        }
        $user = Auth::user();
         $candidat = Candidat::where('user_id', $user->id)->first();
         $certificat = new Certificat();
         $certificat->nomcertificat = $request->nomcertificat;
         $certificat->candidat_id = $candidat->id;
         if (isset($certificatName)) {
            $certificat->certificat = $certificatName;
        }
         $certificat->save();
         return redirect()->route('certificats')->with('success', 'Document ajouté avec succès');
    }
    public function storeAutre(Request $request)
    {
        $request->validate([
            'autrediplome' => 'sometimes|mimes:pdf,docx,jpg,jpeg,png|max:2048',
        ], [
            'autrediplome.max' => 'La taille maximale autorisée pour le fichier est de 2 Mo.',
        
            'autrediplome.mimes' => 'Le document doit etre au format: pdf ou docx ou jpg ou jpeg ou png.',
        ]);
        if ($request->hasFile('autrediplome')) {
        $autreName = time().'.'.$request->autrediplome->extension();  
        $request->autrediplome->move(public_path('uploads'), $autreName);
        }
        $user = Auth::user();
         $candidat = Candidat::where('user_id', $user->id)->first();
         $autrediplome = new AutresDiplomes();
         $autrediplome->nomautre = $request->nomautre;
         $autrediplome->candidat_id = $candidat->id;
         if (isset($autreName)) {
            $autrediplome->autrediplome = $autreName;
        }
         $autrediplome->save();
         return redirect()->route('autrediplomes')->with('success', 'Document ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Licence $licence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Licence $licence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Licence $licence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyLicence(string $id)
    {
        $licence = Licence::findOrFail($id);
        $licence->delete();
        return redirect()->route('candidatvip.document')->with('success', 'Document supprimé ');
    }
    public function destroyMaster(string $id)
    {
        $master = Master::findOrFail($id);
        $master->delete();
        return redirect()->route('candidatvip.document')->with('success', 'Document supprimé ');
    }
    public function destroyDoctorat(string $id)
    {
        $doctorat = Doctorat::findOrFail($id);
        $doctorat->delete();
        return redirect()->route('candidatvip.document')->with('success', 'Document supprimé ');
    }
    public function destroyAttestation(string $id)
    {
        $attestion = AttestionBac::findOrFail($id);
        $attestion->delete();
        return redirect()->route('candidatvip.document')->with('success', 'Document supprimé ');
    }

    public function destroyAutre(string $id)
    {
        $autre = AutresDiplomes::findOrFail($id);
        $autre->delete();
        return redirect()->route('candidatvip.document')->with('success', 'Document supprimé ');
    }
    public function destroyCertificat(string $id)
    {
        $certificat = Certificat::findOrFail($id);
        $certificat->delete();
        return redirect()->route('candidatvip.document')->with('success', 'Document supprimé ');
    }
}
