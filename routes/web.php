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
use App\Http\Controllers\LangueController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\ReferenceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('moonawahome');
});


Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginAction'])->name('login.action'); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('show/{id}', [UserController::class, 'store'])->name('user.profile.store');

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

//admin
Route::get('registeradmin', [AuthController::class, 'registeradmin'])->name('registeradmin');
Route::post('registeradmin', [AuthController::class, 'registerSaveadmin'])->name('registeradmin.save'); 
Route::get('dashboardadmin', [AuthController::class, 'dashboardadmin'])->name('dashboardadmin');
Route::get('dashboardadmin', [AdminController::class, 'count'])->name('dashboardadmin');

Route::controller(AdminController::class)->prefix('admin')->group(function () {
    Route::get('listoffreadmin', 'listoffreadmin')->name('admin.listoffreadmin');
    Route::get('listentrepriseadmin', 'listentrepriseadmin')->name('admin.listentrepriseadmin');
    Route::get('listcabinetadmin', 'listcabinetadmin')->name('admin.listcabinetadmin');
    Route::get('listcandidatadmin', 'listcandidatadmin')->name('admin.listcandidatadmin');
    Route::get('listcandidatnonadmin', 'listcandidatnonadmin')->name('admin.listcandidatnonadmin');
    Route::get('show', 'show')->name('admin.show');
    Route::get('admin', 'admin')->name('admin.admin');

});
Route::put('updateStatusentreprise/{id}', [AdminController::class, 'updateStatusEntreprise'])->name('updateStatusentreprise');
Route::put('updateStatusCabinet/{id}', [AdminController::class, 'updateStatusCabinet'])->name('updateStatusCabinet');
Route::put('updateStatusadmin/{id}', [AdminController::class, 'updateStatusAdmin'])->name('updateStatusadmin');

//superadmin
Route::get('registerSuperadmin', [AuthController::class, 'registerSuperadmin'])->name('registerSuperadmin');
Route::post('registerSuperadmin', [AuthController::class, 'registerSaveSuperadmin'])->name('registerSuperadmin.save'); 
Route::get('dashboardSuperadmin', [AuthController::class, 'dashboardSuperadmin'])->name('dashboardSuperadmin');


//entreprise
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'registerSave'])->name('register.save'); 
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('dashboard', [OffreController::class, 'indexcount'])->name('dashboard');

Route::controller(EntrepriseController::class)->prefix('entreprises')->group(function () {
    Route::get('', 'index')->name('entreprises');
    Route::get('create', 'create')->name('entreprises.create');
    Route::post('store', 'store')->name('entreprises.store');
    Route::get('show/{id}', 'show')->name('entreprises.show');
    Route::get('edit/{id}', 'edit')->name('entreprises.edit');
    Route::put('show', 'update')->name('entreprises.update');
    Route::delete('destroy/{id}', 'destroy')->name('entreprises.destroy');
    Route::post('rc', 'storefile')->name('entreprises.rc');

});

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
    Route::post('propositionstore', 'propositionstore')->name('offres.propositionstore');
    Route::post('propositionstoreshow', 'propositionstoreshow')->name('offres.propositionstoreshow');

    Route::put('update-offre-status/{id}', 'updateOffreStatus')->name('update-offre-status');

});
Route::get('indexproposition/{id}', [OffreController::class, 'indexproposition'])->name('indexproposition');
Route::get('showcandidat', [OffreController::class, 'showcandidat'])->name('showcandidat');
Route::get('indexcabinet', [OffreController::class, 'indexcabinet'])->name('indexcabinet');
Route::get('candidatures/{id}', [OffreController::class, 'deletecandidature'])->name('candidatures.destroy');
Route::put('offres/{id}/update-status', [OffreController::class, 'updateStatus'])->name('updateStatus');
Route::put('updateStatuscabinet/{id}/update-updateStatuscabinet', [OffreController::class, 'updateStatuscabinet'])->name('updateStatuscabinet');
Route::put('update-date/{id}', [OffreController::class, 'updatecandidature'])->name('updateDate');
Route::put('update-lieu/{id}', [OffreController::class, 'updatecandidaturelieu'])->name('updateLieu');
Route::put('update-recrute/{id}', [OffreController::class, 'updatecandidaturecrute'])->name('updateRecrute');
Route::put('update-decline/{id}', [OffreController::class, 'updatecandidaturedecline'])->name('updateDecline');
Route::get('candidats/{id}',[OffreController::class, 'search'])->name('search');
Route::get('showcabinet/{id}', [OffreController::class, 'showcabinet'])->name('showcabinet');
Route::get('cabinetoffre/{id}',[OffreController::class, 'searchWithCabinet'])->name('searchWithCabinet');
Route::get('showcandidatoffre/{id}', [OffreController::class, 'showcandidatoffre'])->name('showcandidatoffre');
Route::put('updateprop-date/{id}', [OffreController::class, 'updateproposition'])->name('updateDateprop');
Route::put('updateprop-lieu/{id}', [OffreController::class, 'updatepropositionlieu'])->name('updateLieuprop');
Route::put('updateprop-recrute/{id}', [OffreController::class, 'updatepropositioncrute'])->name('updateRecruteprop');
Route::put('updateprop-decline/{id}', [OffreController::class, 'updatepropositiondecline'])->name('updateDeclineprop');
//candidat
Route::get('offreencourscandidat', [OffreController::class, 'offreencours'])->name('offreencourscandidat');
Route::get('offredeclinecandidat', [OffreController::class, 'offredecline'])->name('offredeclinecandidat');
Route::get('offrerecrutecandidat', [OffreController::class, 'offrerecrute'])->name('offrerecrutecandidat');
Route::get('cvdetaillecandidat/{id}', [CandidatController::class, 'showcvdetaille'])->name('cvdetaillecandidat');

//admin 
Route::get('showoffreadmin/{id}', [OffreController::class, 'showoffreadmin'])->name('showoffreadmin');
Route::get('showoffrepropadmin/{id}', [OffreController::class, 'showoffrepropadmin'])->name('showoffrepropadmin');
Route::get('cvdetaille/{id}', [OffreController::class, 'showcvdetaille'])->name('cvdetaille');
Route::get('cvdetailleese/{id}', [OffreController::class, 'showcvdetailleese'])->name('cvdetailleese');
Route::get('offreencoursadmin', [OffreController::class, 'offreencoursadmin'])->name('offreencoursadmin');
Route::get('offreexpireadmin', [OffreController::class, 'offreexpireadmin'])->name('offreexpireadmin');

//entreprise
Route::get('offreencoursentreprise', [OffreController::class, 'offreencoursentreprise'])->name('offreencoursentreprise');
Route::get('offreexpireentreprise', [OffreController::class, 'offreexpireentreprise'])->name('offreexpireentreprise');

//cabinet
Route::get('offreencourscabinet', [OffreController::class, 'offreencourscabinet'])->name('offreencourscabinet');
Route::get('offreexpirecabinet', [OffreController::class, 'offreexpirecabinet'])->name('offreexpirecabinet');

//candidatvip
Route::get('registercandidat', [AuthController::class, 'registercandidat'])->name('registercandidat');
Route::post('registercandidat', [AuthController::class, 'registerSavecandidatvip'])->name('registercandidat.save'); 
Route::get('dashboardcandidatvip', [AuthController::class, 'dashboardcandidatvip'])->name('dashboardcandidatvip');
Route::get('dashboardcandidatvip', [FormationController::class, 'indexcount'])->name('dashboardcandidatvip');
Route::controller(CandidatController::class)->prefix('candidatvip')->group(function () {
    Route::get('', 'index')->name('candidatvip');
    Route::get('create', 'create')->name('candidatvip.create');
    Route::post('store', 'store')->name('candidatvip.store');
    Route::get('show/{id}', 'show')->name('candidatvip.show');
    Route::get('edit/{id}', 'edit')->name('candidatvip.edit');
    Route::put('show/{id}', 'update')->name('candidatvip.update');
    Route::delete('destroy/{id}', 'destroy')->name('candidatvip.destroy');
    Route::post('show', [CandidatController::class, 'storeavatar'])->name('candidatvip.shows');
    Route::post('cv', [CandidatController::class, 'storefile'])->name('candidatvip.cvs');

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

//cabinet
Route::get('registercabinet', [AuthController::class, 'registercabinet'])->name('registercabinet');
Route::post('registercabinet', [AuthController::class, 'registerSavecabinet'])->name('registercabinet.save'); 
Route::get('dashboardcabinet', [AuthController::class, 'dashboardcabinet'])->name('dashboardcabinet');
Route::get('intrus', [AuthController::class, 'intrus'])->name('intrus');
Route::get('dashboardcabinet', [CabinetController::class, 'candidatcount'])->name('dashboardcabinet');

Route::controller(CabinetController::class)->prefix('cabinets')->group(function () {
    Route::get('', 'index')->name('cabinets');
    Route::get('create', 'create')->name('cabinets.create');
    Route::post('store', 'store')->name('cabinets.store');
    Route::get('show/{id}', 'show')->name('cabinets.show');
    Route::get('edit/{id}', 'edit')->name('cabinets.edit');
    Route::put('show', 'update')->name('cabinets.update');
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
