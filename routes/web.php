<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CabinetController;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\CompetenceController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\InterlocuteurcbtController;
use App\Http\Controllers\InterlocuteureseController;
use App\Http\Controllers\LangueController;
use App\Http\Controllers\MotCleController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\ReferenceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/clear-cache', function() {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return "Cache is cleared";

});
Route::get('/storage-link', function() {
Artisan::call('storage:link');
    return "storage is linked";

});

Route::get('/', function () {
    return view('moonawahome');
});
Route::get('/notifications/{id}/mark-as-read', [AuthController::class, 'markAsRead'])->name('notifications.mark.as.read');

Route::get('pass', function () {
    return view('layouts.password');
})->name('pass');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('unauthorized', [AuthController::class, 'unauthorized'])->name('unauthorized');
Route::post('login', [AuthController::class, 'loginAction'])->name('login.action'); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('show/{id}', [UserController::class, 'store'])->name('user.profile.store');
Route::get('intrus', [AuthController::class, 'intrus'])->name('intrus');
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('candidatures/{id}', [OffreController::class, 'deletecandidature'])->name('candidatures.destroy');
Route::put('updateprop-decline/{id}', [OffreController::class, 'updatepropositiondecline'])->name('updateDeclineprop');
Route::put('update-offre-status/{id}',[OffreController::class, 'updateOffreStatus'])->name('update-offre-status');
Route::put('show', [CabinetController::class, 'update'])->name('cabinets.update');
Route::post('show', [CandidatController::class, 'storeavatar'])->name('candidatvip.shows');


//superadmin
Route::get('registerSuperadmin', [AuthController::class, 'registerSuperadmin'])->name('registerSuperadmin');
Route::post('registerSuperadmin', [AuthController::class, 'registerSaveSuperadmin'])->name('registerSuperadmin.save'); 
Route::get('dashboardSuperadmin', [AuthController::class, 'dashboardSuperadmin'])->name('dashboardSuperadmin');

//admin
Route::group(['middleware' => ['role:Admin']], function () {

Route::get('candidats/import', [CandidatController::class, 'showImportForm'])->name('candidats.import');
Route::post('candidats/import', [CandidatController::class, 'import'])->name('candidats.import.post');



Route::get('registeradmin', [AuthController::class, 'registeradmin'])->name('registeradmin');
Route::post('registeradmin', [AuthController::class, 'registerSaveadmin'])->name('registeradmin.save'); 
Route::get('dashboardadmin', [AuthController::class, 'dashboardadmin'])->name('dashboardadmin');
Route::get('dashboardadmin', [AdminController::class, 'count'])->name('dashboardadmin');
Route::get('cvdetaille/{id}', [OffreController::class, 'showcvdetaille'])->name('cvdetaille');
Route::controller(AdminController::class)->prefix('admin')->group(function () {
    Route::get('listoffreadmin', 'listoffreadmin')->name('admin.listoffreadmin');
    Route::get('listentrepriseadmin', 'listentrepriseadmin')->name('admin.listentrepriseadmin');
    Route::get('listcabinetadmin', 'listcabinetadmin')->name('admin.listcabinetadmin');
    Route::get('listcandidatadmin', 'listcandidatadmin')->name('admin.listcandidatadmin');
    Route::get('listvipadmin', 'listvipadmin')->name('admin.listvipadmin');
    Route::get('listnonvipadmin', 'listnonvipadmin')->name('admin.listnonvipadmin');
    Route::get('listcandidatnonadmin', 'listcandidatnonadmin')->name('admin.listcandidatnonadmin');
    Route::get('show', 'show')->name('admin.show');
    Route::put('updateUser/{id}', 'updateUser')->name('admin.updateUser');
    Route::get('admin', 'admin')->name('admin.admin');
    Route::get('listinterentrepriseadmin/{id}', 'listinterentrepriseadmin')->name('admin.listinterentrepriseadmin');
    Route::get('listintercabinetadmin/{id}', 'listintercabinetadmin')->name('admin.listintercabinetadmin');
    Route::put('updatevip/{id}',  'updatevip')->name('admin.updatevip');
});
Route::put('updateStatusentreprise/{id}', [AdminController::class, 'updateStatusEntreprise'])->name('updateStatusentreprise');
Route::put('updateStatusCabinet/{id}', [AdminController::class, 'updateStatusCabinet'])->name('updateStatusCabinet');
Route::put('updateStatusadmin/{id}', [AdminController::class, 'updateStatusAdmin'])->name('updateStatusadmin');
Route::get('searchadmin',[AdminController::class, 'searchadmin'])->name('searchadmin');
Route::get('showoffreadmin/{id}', [OffreController::class, 'showoffreadmin'])->name('showoffreadmin');
Route::get('showoffredeclineadmin/{id}', [OffreController::class, 'showoffredeclineadmin'])->name('showoffredeclineadmin');
Route::get('showoffrerecruteadmin/{id}', [OffreController::class, 'showoffrerecruteadmin'])->name('showoffrerecruteadmin');
Route::get('showoffrerefuseadmin/{id}', [OffreController::class, 'showoffrerefuseadmin'])->name('showoffrerefuseadmin');
Route::get('showoffrepropadmin/{id}', [OffreController::class, 'showoffrepropadmin'])->name('showoffrepropadmin');
Route::get('showoffrerecrutepropadmin/{id}', [OffreController::class, 'showoffrerecrutepropadmin'])->name('showoffrerecrutepropadmin');
Route::get('showoffrerefusepropadmin/{id}', [OffreController::class, 'showoffrerefusepropadmin'])->name('showoffrerefusepropadmin');
Route::get('offreencoursadmin', [OffreController::class, 'offreencoursadmin'])->name('offreencoursadmin');
Route::get('offreexpireadmin', [OffreController::class, 'offreexpireadmin'])->name('offreexpireadmin');
});


//entreprise
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'registerSave'])->name('register.save'); 
Route::group(['middleware' => ['role:Entreprise']], function () {
    Route::put('updateprop-recrute/{id}', [OffreController::class, 'updatepropositioncrute'])->name('updateRecruteprop');
    Route::put('updateprop-lieu/{id}', [OffreController::class, 'updatepropositionlieu'])->name('updateLieuprop');
    Route::put('updateprop-date/{id}', [OffreController::class, 'updateproposition'])->name('updateDateprop');
    Route::get('candidats/{id}',[OffreController::class, 'search'])->name('search');
    Route::put('updatePropositionRvLieu/{id}', [OffreController::class, 'updatePropositionRvLieu'])->name('updatePropRvLieu');
    Route::put('rv-lieu/{id}', [OffreController::class, 'updateCandidatureRendezvousLieu'])->name('updateRvLieu');
    Route::put('update-date/{id}', [OffreController::class, 'updatecandidature'])->name('updateDate');
    Route::put('update-lieu/{id}', [OffreController::class, 'updatecandidaturelieu'])->name('updateLieu');
    Route::put('update-recrute/{id}', [OffreController::class, 'updatecandidaturecrute'])->name('updateRecrute');
    Route::put('offres/{id}/update-status', [OffreController::class, 'updateStatus'])->name('updateStatus');
    Route::put('updateStatuscabinet/{id}/update-updateStatuscabinet', [OffreController::class, 'updateStatuscabinet'])->name('updateStatuscabinet');
    Route::get('indexproposition/{id}', [OffreController::class, 'indexproposition'])->name('indexproposition');
    Route::post('/offres/{offre}/duplicate', [OffreController::class, 'duplicate'])->name('offres.duplicate');
    Route::controller(OffreController::class)->prefix('offres')->group(function () {
        Route::get('', 'index')->name('offres');
        Route::get('create', 'create')->name('offres.create');
        Route::post('store', 'store')->name('offres.store');
        Route::get('show/{id}', 'show')->name('offres.show');
        Route::get('edit/{id}', 'edit')->name('offres.edit');
        Route::put('edit/{id}', 'update')->name('offres.update');
        Route::delete('destroy/{id}', 'destroy')->name('offres.destroy');
        Route::get('getcandidat/{id}', 'getcandidatselectionne')->name('offres.getcandidat');
        Route::post('getcandidatstore', 'getcandidatstore')->name('offres.getcandidatstore');
    });
    Route::get('cvdetailleese/{id}', [OffreController::class, 'showcvdetailleese'])->name('cvdetailleese');
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('dashboard', [OffreController::class, 'indexcount'])->name('dashboard');
    Route::get('indexinter', [InterlocuteureseController::class, 'index'])->name('indexinter');
    Route::post('registerInterlo', [InterlocuteureseController::class, 'registerInterlo'])->name('registerInterlo');
    Route::controller(EntrepriseController::class)->prefix('entreprises')->group(function () {
        Route::get('', 'index')->name('entreprises');
        Route::get('create', 'create')->name('entreprises.create');
        Route::post('store', 'store')->name('entreprises.store');
        Route::get('show/{id}', 'show')->name('entreprises.show');
        Route::get('inter/{id}', 'inter')->name('entreprises.inter');
        Route::get('edit/{id}', 'edit')->name('entreprises.edit');
        Route::put('update', 'update')->name('entreprises.update');
        Route::put('updateInter/{id}', 'updateInter')->name('entreprises.updateInter');
        Route::put('logo', 'logo')->name('entreprises.logo');
        Route::delete('destroy/{id}', 'destroy')->name('entreprises.destroy');
        Route::post('rc', 'storefile')->name('entreprises.rc');
    });
    Route::get('offreencoursentreprise', [OffreController::class, 'offreencoursentreprise'])->name('offreencoursentreprise');
    Route::get('offreexpireentreprise', [OffreController::class, 'offreexpireentreprise'])->name('offreexpireentreprise');
    Route::get('offrestandbyentreprise', [OffreController::class, 'offrestandbyentreprise'])->name('offrestandbyentreprise');
    Route::get('candidatrecrute/{id}', [OffreController::class, 'candidatrecrute'])->name('candidatrecrute');
    Route::get('candidatrefuse/{id}', [OffreController::class, 'candidatrefuse'])->name('candidatrefuse');
    Route::put('commentaireese/{id}', [OffreController::class, 'commentaireese'])->name('commentaireese');
    Route::get('proposerecrute/{id}', [OffreController::class, 'proposerecrute'])->name('proposerecrute');
    Route::get('proposerefuse/{id}', [OffreController::class, 'proposerefuse'])->name('proposerefuse');
    Route::put('commentaireeseproposition/{id}', [OffreController::class, 'commentaireeseproposition'])->name('commentaireeseproposition');
});


//candidatvip

Route::get('registercandidat', [AuthController::class, 'registercandidat'])->name('registercandidat');
Route::post('registercandidat', [AuthController::class, 'registerSavecandidatvip'])->name('registercandidat.save'); 
Route::group(['middleware' => ['role:CandidatVIP']], function () {
   
    Route::get('showcandidatoffre/{id}', [OffreController::class, 'showcandidatoffre'])->name('showcandidatoffre');
    Route::put('confirmerv/{id}', [OffreController::class, 'candidatureconfirmerv'])->name('confirmeVipRv');
    Route::put('commentaire/{id}', [OffreController::class, 'candidaturecommentairerv'])->name('commentaireVipRv');
    Route::put('update-decline/{id}', [OffreController::class, 'updatecandidaturedecline'])->name('updateDecline');
    Route::get('showcandidat', [OffreController::class, 'showcandidat'])->name('showcandidat');
    Route::get('dashboardcandidatvip', [AuthController::class, 'dashboardcandidatvip'])->name('dashboardcandidatvip');
    Route::get('dashboardcandidatvip', [FormationController::class, 'indexcount'])->name('dashboardcandidatvip');
    Route::get('offreencourscandidat', [OffreController::class, 'offreencours'])->name('offreencourscandidat');
    Route::get('offredeclinecandidat', [OffreController::class, 'offredecline'])->name('offredeclinecandidat');
    Route::get('offrerecrutecandidat', [OffreController::class, 'offrerecrute'])->name('offrerecrutecandidat');
    Route::get('cvdetaillecandidat/{id}', [CandidatController::class, 'showcvdetaille'])->name('cvdetaillecandidat');
    Route::controller(CandidatController::class)->prefix('candidatvip')->group(function () {
        Route::get('', 'index')->name('candidatvip');
        Route::get('create', 'create')->name('candidatvip.create');
        Route::post('store', 'store')->name('candidatvip.store');
        Route::get('show/{id}', 'show')->name('candidatvip.show');
        Route::get('edit/{id}', 'edit')->name('candidatvip.edit');
        Route::put('show/{id}', 'update')->name('candidatvip.update');
        Route::delete('destroy/{id}', 'destroy')->name('candidatvip.destroy');
        Route::post('cv', [CandidatController::class, 'storefile'])->name('candidatvip.cvs');
        Route::get('/cv/{id}/download',[CandidatController::class, 'download'] )->name('candidatvip.cv.download');
        Route::get('generate-pdf/{id}', [CandidatController::class, 'generatePDF'])->name('candidatvip.cvPdf');
    });
    Route::controller(MotCleController::class)->prefix('motCles')->group(function () {
        Route::get('', 'index')->name('motCles');
        Route::post('store', 'store')->name('motCles.store');
        Route::put('edit/{id}', 'update')->name('motCles.update');
        Route::delete('destroy/{id}', 'destroy')->name('motCles.destroy');

    });
    Route::controller(LangueController::class)->prefix('langues')->group(function () {
        Route::get('', 'index')->name('langues');
        Route::get('create', 'create')->name('langues.create');
        Route::post('store', 'store')->name('langues.store');
        Route::get('show/{id}', 'show')->name('langues.show');
        Route::get('edit/{id}', 'edit')->name('langues.edit');
        Route::put('edit/{id}', 'update')->name('langues.update');
        Route::delete('destroy/{id}', 'destroy')->name('langues.destroy');

    });
    Route::controller(ExperienceController::class)->prefix('experiences')->group(function () {
        Route::get('', 'index')->name('experiences');
        Route::get('create', 'create')->name('experiences.create');
        Route::post('store', 'store')->name('experiences.store');
        Route::get('show/{id}', 'show')->name('experiences.show');
        Route::get('edit/{id}', 'edit')->name('experiences.edit');
        Route::put('edit/{id}', 'update')->name('experiences.update');
        Route::delete('destroy/{id}', 'destroy')->name('experiences.destroy');
    });
    Route::controller(FormationController::class)->prefix('formations')->group(function () {
        Route::get('', 'index')->name('formations');
        Route::get('create', 'create')->name('formations.create');
        Route::post('store', 'store')->name('formations.store');
        Route::get('show/{id}', 'show')->name('formations.show');
        Route::get('edit/{id}', 'edit')->name('formations.edit');
        Route::put('edit/{id}', 'update')->name('formations.update');
        Route::delete('destroy/{id}', 'destroy')->name('formations.destroy');
    });
    Route::controller(ReferenceController::class)->prefix('references')->group(function () {
        Route::get('', 'index')->name('references');
        Route::get('create', 'create')->name('references.create');
        Route::post('store', 'store')->name('references.store');
        Route::get('show/{id}', 'show')->name('references.show');
        Route::get('edit/{id}', 'edit')->name('references.edit');
        Route::put('edit/{id}', 'update')->name('references.update');
        Route::delete('destroy/{id}', 'destroy')->name('references.destroy');
    });
    Route::controller(CompetenceController::class)->prefix('competences')->group(function () {
        Route::get('', 'index')->name('competences');
        Route::get('create', 'create')->name('competences.create');
        Route::post('store', 'store')->name('competences.store');
        Route::get('show/{id}', 'show')->name('competences.show');
        Route::get('edit/{id}', 'edit')->name('competences.edit');
        Route::put('edit/{id}', 'update')->name('competences.update');
        Route::delete('destroy/{id}', 'destroy')->name('competences.destroy');

    });
});
Route::get("search",[CompetenceController::class,'search'])->name('competences.search');
Route::get("suggestions",[CompetenceController::class,'suggestions'])->name('suggestions');

//cabinet
Route::get('registercabinet', [AuthController::class, 'registercabinet'])->name('registercabinet');
Route::post('registercabinet', [AuthController::class, 'registerSavecabinet'])->name('registercabinet.save'); 
Route::group(['middleware' => ['role:Cabinet']], function () {
    Route::get('cabinetoffre/{id}',[OffreController::class, 'searchWithCabinet'])->name('searchWithCabinet');
    Route::get('showcabinet/{id}', [OffreController::class, 'showcabinet'])->name('showcabinet');
    Route::get('indexcabinet', [OffreController::class, 'indexcabinet'])->name('indexcabinet');
    Route::post('propositionstore',[OffreController::class, 'propositionstore'])->name('offres.propositionstore');
    Route::post('propositionstoreshow',[OffreController::class, 'propositionstoreshow'])->name('offres.propositionstoreshow');
    Route::get('dashboardcabinet', [AuthController::class, 'dashboardcabinet'])->name('dashboardcabinet');
    Route::get('dashboardcabinet', [CabinetController::class, 'candidatcount'])->name('dashboardcabinet');
    Route::get('indexintercbt', [InterlocuteurcbtController::class, 'index'])->name('indexintercbt');
    Route::post('registerInterlocbt', [InterlocuteurcbtController::class, 'registerInterlocbt'])->name('registerInterlocbt');
    Route::get('offreencourscabinet', [OffreController::class, 'offreencourscabinet'])->name('offreencourscabinet');
    Route::get('offreexpirecabinet', [OffreController::class, 'offreexpirecabinet'])->name('offreexpirecabinet');
    Route::controller(CabinetController::class)->prefix('cabinets')->group(function () {
        Route::get('', 'index')->name('cabinets');
        Route::get('vivier', 'vivier')->name('cabinets.vivier');
        Route::put('updateIntercbt/{id}', 'updateIntercbt')->name('cabinets.updateIntercbt');
        Route::get('create', 'create')->name('cabinets.create');
        Route::post('store', 'store')->name('cabinets.store');
        Route::get('show/{id}', 'show')->name('cabinets.show');
        Route::get('intercbt/{id}', 'intercbt')->name('cabinets.intercbt');
        Route::get('edit/{id}', 'edit')->name('cabinets.edit');
        Route::put('updateinfo', 'updateinfo')->name('cabinets.updateinfo');
        Route::put('logocbt', 'logocbt')->name('cabinets.logocbt');
        Route::delete('destroy/{id}', 'destroy')->name('cabinets.destroy');
        Route::post('ninea',  'storefile')->name('cabinets.ninea');
        Route::get('candidatcabinet', 'candidat')->name('candidatcabinet');
        Route::get('candidatstore', 'createcandidat')->name('cabinets.candidatcreate');
        Route::post('candidatstore', 'registerSavecandidat')->name('cabinets.candidat');
        Route::delete('destroycandidat/{id}', 'destroycandidat')->name('cabinets.destroycandidat');
    });
    Route::get('proposition', [CabinetController::class, 'proposition'])->name('proposition');
    Route::get('selec', [CabinetController::class, 'selec'])->name('selec');
    Route::get('recru', [CabinetController::class, 'recru'])->name('recru');
});