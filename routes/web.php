<?php

use App\Models\Lead;
use Illuminate\Support\Facades\Route;

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
Route::get('/optimize', function(){
//   \Artisan::call('migrate');
    // \Artisan::call('db:seed');
    \Artisan::call('optimize:clear');
    \Artisan::call('storage:link'); 
});
Route::get('/assign-role', function(){
        // \Spatie\Permission\Models\Role::create(['name' => 'admin']);
        // \Spatie\Permission\Models\Role::create(['name' => 'member']);

        // $admin = \App\Models\User::where('email', 'admin@crm.com')->first();
        // $user = \App\Models\User::where('email', 'member@crm.com')->first();
        // $admin->assignRole('admin');
        // $user->assignRole('member');
        // return('done');
});

Route::get('/', function () {
    
    return view('auth.login');
});

Auth::routes();

Route::get('/test', function (){

//    $user = \App\Models\User::whereHas("roles", function($q) {
//        $q->where("name", "admin");
//    })->first();
    try {
        $lead = Lead::where('id', 1)->first();
        return $lead->member;
    }catch(\Exception $e){
        return $e->getMessage();
    }


});


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/getcities/{state}', [\App\Http\Controllers\HomeController::class, 'getCities'])->name('get.cities');
Route::get('/getstates/{country}', [\App\Http\Controllers\HomeController::class, 'getStates'])->name('get.states');

Route::group(['middleware' => ['role:admin']], function () {
    Route::resource('teams', \App\Http\Controllers\admin\TeamController::class);
    Route::resource('leads', \App\Http\Controllers\admin\LeadController::class);
    Route::resource('leadstages', \App\Http\Controllers\admin\LeadStagesController::class);
    Route::resource('members', \App\Http\Controllers\admin\MemberController::class);
    Route::resource('services', \App\Http\Controllers\admin\ServiceController::class);
    Route::get('/services/{id}/changestatus', [\App\Http\Controllers\admin\ServiceController::class, 'changeStatus'])->name('services.change.status');
    Route::put('/services/status/update', [\App\Http\Controllers\admin\ServiceController::class, 'updateStatus'])->name('services.update.status');
    Route::get('/leads/{id}/changestatus', [\App\Http\Controllers\admin\LeadController::class, 'changeStatus'])->name('leads.change.status');
    Route::put('/leads/status/update', [\App\Http\Controllers\admin\LeadController::class, 'updateStatus'])->name('leads.update.status');
    Route::resource('leadmessages', \App\Http\Controllers\admin\LeadMessageController::class);
    Route::resource('leadstatus', \App\Http\Controllers\admin\LeadStatusController::class);
});

Route::group(['middleware' => ['role:member']], function () {
    Route::resource('myleads', \App\Http\Controllers\member\LeadController::class);
    Route::get('/myleads/{id}/changestatus', [\App\Http\Controllers\member\LeadController::class, 'changeStatus'])->name('myleads.change.status');
    Route::put('/myleads/status/update', [\App\Http\Controllers\member\LeadController::class, 'updateStatus'])->name('myleads.update.status');
    Route::resource('myleadmessages', \App\Http\Controllers\member\LeadMessageController::class);
});

