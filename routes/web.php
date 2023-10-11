<?php

use App\Http\Controllers\LockScreen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\RechercheController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TelechargementController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\Dossiers\DossierController;
use App\Http\Controllers\demmandes\DemmandeController;
use App\Http\Controllers\Personnels\PersonnelController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware'=>'auth'],function()
{
    Route::get('home',function()
    {
        return view('home');
    });
    Route::get('home',function()
    {
        return view('home');
    });

    // Route::get('/edit/profile',function(){
    //     return view('usermanagement\edit_profile');
    // });
                /**pour les personnels */
    Route::post('update/profile',[App\Http\Controllers\Personnels\PersonnelController::class,'updateProfile']);
    Route::get('liste/personnels',[App\Http\Controllers\Personnels\PersonnelController::class,'liste_personnel']);
    Route::get('edit/profile',[App\Http\Controllers\Personnels\PersonnelController::class,'infoPersonnel']);
                /**pour les personnels */

    

            //pour la supprissesion et validation des dossiers
    // Route::get('delete/dossierPedagogique/{id}',[App\Http\Controllers\Dossiers\DossierController::class,'delete_dossierPedagogique_ByAdmin']);
    // Route::get('validate/dossierPedagogique/{id}',[App\Http\Controllers\Dossiers\DossierController::class,'validate_dossierPedagogique_ByAdmin']);
    // Route::get('delete/dossierScientifique/{id}',[App\Http\Controllers\Dossiers\DossierController::class,'delete_dossierScientifique_ByAdmin']);
    // Route::get('validate/dossierScientifique/{id}',[App\Http\Controllers\Dossiers\DossierController::class,'validate_dossierScientifique_ByAdmin']);

                        /**  pour les demmandes */
    Route::get('passer/demmande',[App\Http\Controllers\Demmandes\DemmandeController::class,'passerDemmande']);
    Route::post('save/demmande',[App\Http\Controllers\Demmandes\DemmandeController::class,'saveDemmande']);
    Route::get('liste/demmande',[App\Http\Controllers\Demmandes\DemmandeController::class,'afficheDemmandes']);
    Route::get('valider/demmande/{id}/{user_id}/{type}',[App\Http\Controllers\Demmandes\DemmandeController::class,'valideDemmande']);
    Route::get('delete/demmande/{id}',[App\Http\Controllers\Demmandes\DemmandeController::class,'deleteDemmande']);
    Route::get('/download/{justification}',[App\Http\Controllers\Demmandes\DemmandeController::class,'download']);

                        /**fin du route pour les demmandes */
                        /** pour les attestations */
    Route::get('passer/attestation',[App\Http\Controllers\Attestations\AttestationController::class,'demmanderAttestation']);
    Route::post('save/attestation',[App\Http\Controllers\Attestations\AttestationController::class,'saveAttestation']);
    Route::get('liste/attestation',[App\Http\Controllers\Attestations\AttestationController::class,'afficheAttestation']);
    Route::get('valider/attestation/{id}/{user_id}/{type}',[App\Http\Controllers\Attestations\AttestationController::class, 'valideAttestation']);
    
    // Route::get('delete/attestation',[App\Http\Controllers\Attestations\AttestationController::class,'demmanderAttestation']);

    // Route::get('create-pdf-file', [App\Http\Controllers\DynamicPDFController::class, 'imprimer']);
    // Route::get('view-pdf-file', [App\Http\Controllers\DynamicPDFController::class, 'show']);

                        /** fin pour les attestations */

                        /** pour les statistiques */

    Route::get('statistiques',[App\Http\Controllers\statistiques\StatistiqueController::class,'index']);
                        /** fin pour les statistiques */


});

Auth::routes();

// ----------------------------- home dashboard ------------------------------//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// -----------------------------login----------------------------------------//
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate']);
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// ----------------------------- lock screen --------------------------------//
Route::get('lock_screen', [App\Http\Controllers\LockScreen::class, 'lockScreen'])->middleware('auth')->name('lock_screen');
Route::post('unlock', [App\Http\Controllers\LockScreen::class, 'unlock'])->name('unlock');

// ------------------------------ register ---------------------------------//
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'storeUser'])->name('register');

// ----------------------------- forget password ----------------------------//
Route::get('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'getEmail'])->name('forget-password');
Route::post('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'postEmail'])->name('forget-password');

// ----------------------------- reset password -----------------------------//
Route::get('reset-password/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'getPassword']);
Route::post('reset-password', [App\Http\Controllers\Auth\ResetPasswordController::class, 'updatePassword']);

// ----------------------------- user profile ------------------------------//
Route::get('profile_user', [App\Http\Controllers\UserManagementController::class, 'profile'])->name('profile_user');
Route::post('profile_user/store', [App\Http\Controllers\UserManagementController::class, 'profileStore'])->name('profile_user/store');

// ----------------------------- user userManagement -----------------------//
Route::get('userManagement', [App\Http\Controllers\UserManagementController::class, 'index'])->middleware('auth')->name('userManagement');
Route::get('user/add/new', [App\Http\Controllers\UserManagementController::class, 'addNewUser'])->middleware('auth')->name('user/add/new');
Route::post('user/add/save', [App\Http\Controllers\UserManagementController::class, 'addNewUserSave'])->name('user/add/save');
Route::get('view/detail/{id}', [App\Http\Controllers\UserManagementController::class, 'viewDetail'])->middleware('auth');
Route::post('update', [App\Http\Controllers\UserManagementController::class, 'update'])->name('update');
Route::get('delete_user/{id}', [App\Http\Controllers\UserManagementController::class, 'delete'])->middleware('auth');
Route::get('activity/log', [App\Http\Controllers\UserManagementController::class, 'activityLog'])->middleware('auth')->name('activity/log');
Route::get('activity/login/logout', [App\Http\Controllers\UserManagementController::class, 'activityLogInLogOut'])->middleware('auth')->name('activity/login/logout');

Route::get('change/password', [App\Http\Controllers\UserManagementController::class, 'changePasswordView'])->middleware('auth')->name('change/password');
Route::post('change/password/db', [App\Http\Controllers\UserManagementController::class, 'changePasswordDB'])->name('change/password/db');

// ----------------------------- form staff ------------------------------//
Route::get('form/staff/new', [App\Http\Controllers\FormController::class, 'index'])->middleware('auth')->name('form/staff/new');
Route::post('form/save', [App\Http\Controllers\FormController::class, 'saveRecord'])->name('form/save');
Route::get('form/view/detail', [App\Http\Controllers\FormController::class, 'viewRecord'])->middleware('auth')->name('form/view/detail');
Route::get('form/view/detail/{id}', [App\Http\Controllers\FormController::class, 'viewDetail'])->middleware('auth');
Route::post('form/view/update', [App\Http\Controllers\FormController::class, 'viewUpdate'])->name('form/view/update');
Route::get('delete/{id}', [App\Http\Controllers\FormController::class, 'viewDelete'])->middleware('auth');






//---------------------------Departement--------------------------------//
Route::resource('/departement', DepartementController::class);
Route::get('/liste/departement',[App\Http\Controllers\DepartementController::class, 'liste'])->middleware('auth');
Route::get('/departement/{id}/affecter/personnels',[App\Http\Controllers\DepartementController::class, 'enlever_personnel'])->middleware('auth');
Route::get('/personne/departement/enlevee/{id}',[App\Http\Controllers\DepartementController::class,'enlever'])->middleware('auth');
Route::get('/personne/ajoutee/{id_personnel}/au/departement/{id_departement}',[App\Http\Controllers\DepartementController::class,'ajouter_personnel_au_departement'])->middleware('auth');
Route::get('/edit/departement/{id}',[App\Http\Controllers\DepartementController::class, 'edit_departement'])->middleware('auth');
Route::get('/chef_de_departement/departement',[App\Http\Controllers\DepartementController::class, 'show_departement'])->middleware('auth');

//---------------------------Filiere--------------------------------//
Route::resource('/filiere', FiliereController::class);
Route::get('/edit/filiere/{id}',[App\Http\Controllers\FiliereController::class, 'edit_filiere'])->middleware('auth');
Route::get('/coordinateur/filiere',[App\Http\Controllers\FiliereController::class, 'show_filiere'])->middleware('auth');

//---------------------------Annonces--------------------------------//
Route::resource('/annonce', AnnonceController::class)->middleware('auth');
Route::get('/annonce/download/{fichier}',[App\Http\Controllers\AnnonceController::class,'download'])->middleware('auth');


//---------------------------Telechargements--------------------------------//
Route::resource('/telechargement', TelechargementController::class)->middleware('auth');
Route::get('/Telechargement/download/{fichier}',[App\Http\Controllers\TelechargementController::class,'download'])->middleware('auth');

//---------------------------Gestion des Services/Missions administratives--------------------------------//
Route::resource('/service', ServiceController::class)->middleware('auth');
Route::get('/liste/service',[App\Http\Controllers\ServiceController::class, 'liste'])->middleware('auth');
Route::get('/service/{id}/affecter/personnels',[App\Http\Controllers\ServiceController::class, 'enlever_personnel'])->middleware('auth');
Route::get('/personne/enlevee/{id}',[App\Http\Controllers\ServiceController::class,'enlever'])->middleware('auth');
Route::get('/personne/ajoutee/{id_personnel}/au/service/{id_service}',[App\Http\Controllers\ServiceController::class,'ajouter_personnel_au_service'])->middleware('auth');



//---------------------------Gestion des Entités de Recherche de L'ENSAJ--------------------------------//
Route::resource('/recherche', RechercheController::class)->middleware('auth');
Route::get('/liste/recherche',[App\Http\Controllers\RechercheController::class, 'liste'])->middleware('auth');
Route::get('/recherche/{id}/affecter/personnels',[App\Http\Controllers\RechercheController::class, 'enlever_personnel'])->middleware('auth');
Route::get('/personne/enlevee/{id}',[App\Http\Controllers\RechercheController::class,'enlever'])->middleware('auth');
Route::get('/personne/ajoutee/{id_personnel}/au/recherche/{id_recherche}',[App\Http\Controllers\RechercheController::class,'ajouter_personnel_au_recherche'])->middleware('auth');
