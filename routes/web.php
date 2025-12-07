<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExemplaireLivreController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\PretController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LivreController::class, 'gohome'])->name('home');
Route::get('/Dashboard', [AuthController::class, 'showDashboard'])->name('dashboard');

Route::get('/register', [AuthController::class, 'ShowSignUp'])->name('register');
Route::post('/register', [AuthController::class, 'SignUp'])->name(name: 'registration.register');
Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name(name: 'login.log');
Route::get('/logout', [AuthController::class, 'logout'])->name(name: 'logout');
Route::get('/catalogue', [LivreController::class, 'index'])->name(name: 'catalogue');
Route::post('/catalogue/create', [LivreController::class, 'create'])->name(name: 'catalogue.create');
Route::put('/catalogue/{livre}', [LivreController::class, 'update'])->name(name: 'catalogue.update');
Route::get('/catalogue/{livre}/update/', [LivreController::class, 'showupdateform'])->name(name: 'catalogue.updateform');

Route::post('/catalogue/{livre}/ajouter/', [ExemplaireLivreController::class, 'create'])->name(name: 'catalogue.addexemplaire');



//Routes des réservations
Route::get('/reservation', [ReservationController::class, 'index'])->name(name: 'reservations');
Route::post('/res', [ReservationController::class, 'create'])->name(name: 'reservations.create');
Route::put('/reservation/validate/{reservation}', [ReservationController::class, 'ValiderReservation'])->name(name: 'reservations.validate');
Route::get('/reservation/{statut}', [ReservationController::class, 'ShowReservationValide'])->name(name: 'reservations.showvalidate');
Route::get('/reserva/form/{livre}', [ReservationController::class, 'showReservationForm'])->name(name: 'reservations.showform');
Route::get('/Mesreservation', [ReservationController::class, 'filter'])->name(name: 'ownreservations');

// Routes des Emprunts
Route::post('/emprunt', [PretController::class, 'create'])->name(name: 'emprunts.create');
Route::get('/emprunt', [PretController::class, 'index'])->name(name: 'emprunts');
Route::get('/Mesemprunt', [PretController::class, 'filter'])->name(name: 'ownemprunts');
Route::get('/Ajoutemprunt/{livre}/{id}', [PretController::class, 'showaddEmpruntForm'])->name(name: 'emprunts.showform');
Route::get('/ShowUpdateemprunt/{pret}', [PretController::class, 'showdateretourform'])->name(name: 'emprunts.showdateretour');
Route::put('/Updateemprunt/{pret}', [PretController::class, 'update'])->name(name: 'emprunts.update');




