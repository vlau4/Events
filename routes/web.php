<?php

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;

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

// Common Resource Routes:
// index - Show all events
// show - Show single event
// create - Show form to create new event
// store - Store new event
// edit - Show form to edit event
// update - Update event
// destroy - Delete event

// ______ ADMIN: _____________________________________________________________________________________________

// Manage Users
Route::get('/users/manage', [UserController::class, 'manage'])->middleware('auth');

// Edit User Role
// Route::get('/users/{user}/edit', [UserController::class, 'edit']);

// ______ MANAGER ____________________________________________________________________________________________

// Show Confirm Section
Route::get('/events/confirm', [EventController::class, 'showConfirm'])->middleware('auth');

// Confirm New Events Created by Users
Route::post('/events/{event}/confirmation', [EventController::class, 'confirm'])->middleware('auth');



// ___________________________________________________________________________________________________________

// ______ EVENTS _____________________________________________________________________________________________

// All events
Route::get('/', [EventController::class, 'index']);

// Show Create Form
Route::get('/events/create', [EventController::class, 'create'])->middleware('auth');

// Store Event Data
Route::post('/events', [EventController::class, 'store'])->middleware('auth');

// Show Edit Form
Route::get('/events/{event}/edit', [EventController::class, 'edit'])->middleware('auth');

// Manage Events
Route::get('/events/manage', [EventController::class, 'manage'])->middleware('auth');

// Single Event
Route::get('/events/{event}', [EventController::class, 'show']);

// Update Event
Route::put('/events/{event}', [EventController::class, 'update'])->middleware('auth');

// Delete Event
Route::delete('/events/{event}', [EventController::class, 'destroy'])->middleware('auth');

// ___________________________________________________________________________________________________________

// ______ USERS_ _____________________________________________________________________________________________

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// ___________________________________________________________________________________________________________

// ______ LOCATION ___________________________________________________________________________________________

// Show Locations
Route::get('/locations', [LocationController::class, 'show']);

// Show Create Form
Route::get('/locations/create', [LocationController::class, 'create'])->middleware('auth');

// Store Location Data
Route::post('/locations/store', [LocationController::class, 'store'])->middleware('auth');

// ___________________________________________________________________________________________________________

// ______ CATEGORY ___________________________________________________________________________________________

// Show Categories
Route::get('/categories', [CategoryController::class, 'show']);

// Show Create Form
Route::get('/categories/create', [CategoryController::class, 'create'])->middleware('auth');

// Store Category Data
Route::post('/categories/store', [CategoryController::class, 'store'])->middleware('auth');

// ___________________________________________________________________________________________________________
