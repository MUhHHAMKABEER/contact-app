<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Settings\ProfileController;


// Route::controller(ContactController::class)->group(function (){
//     route::get("/","index")->name('index');
//     route::get("add_contacts","create")->name('contact.create');
//     route::post("create_contact","store")->name('contact.store');
//     route::get("show_contact/{contact}","show")->name('contact.show');
//     route::get("show_contact/{contact}/edit","edit")->name('contact.edit');
//     route::put("show_contact/{contact}","update")->name('contact.update');
//     route::delete("show_contact/{contact}","destroy")->name('contact.destroy');



// });



Route::redirect('/', '/login');

Auth::routes(['verify' => true]);

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

    Route::get('setting/profile', [ProfileController::class, 'edit'])->name('setting.profile.edit');
    Route::put('setting/profile', [ProfileController::class, 'update'])->name('setting.profile.update');


    Route::resources([
        '/contacts' => ContactController::class,
        '/companies' => CompanyController::class,
    ]);
});
