<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\TicketDetailsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/events', [EventsController::class, 'index'])->name('events.index');

//===== Events Routes =====//
Route::get("events/{eventID}", [EventsController::class, "viewEventDetails"]);
Route::get("book/{eventID}",[TicketsController::class,"viewBookTicketPage"])->middleware("isLoggedIn");
Route::post("book/{eventID}",[TicketsController::class,"bookTicket"])->middleware("isLoggedIn");

//==== Profile Routes ===//
Route::get("profile", [ProfileController::class, "viewProfilePage"])->middleware("isLoggedIn")->name("profile");//name("profile") is for dropdown at navbar
Route::get("profile/update/password",[ProfileController::class,"viewUpdatePasswordPage"])->middleware("isLoggedIn");
Route::post("profile/update/password",[ProfileController::class,"updatePassword"])->middleware("isLoggedIn");
Route::get("profile/deactivate",[ProfileController::class,"deactivateAccount"])->middleware("isLoggedIn");

//==== Ticket Routes ===//
Route::get("ticket/view/{ticketID}",[TicketDetailsController::class,"viewTicketDetailsPage"])->middleware("isLoggedIn");
Route::get("ticket/edit/{ticketID}",[TicketDetailsController::class,"viewEditTicketPage"])->middleware("isLoggedIn");
Route::post("ticket/edit/{ticketID}",[TicketDetailsController::class,"editTicket"])->middleware("isLoggedIn");
Route::get("ticket/cancel/{ticketID}",[TicketDetailsController::class,"cancelTicket"])->middleware("isLoggedIn");

//==== Admin Routes//====//
Route::get("admin", [AdminController::class, "viewAdminDashboard"])->middleware("isLoggedIn","isAdmin")->name("adminDashboard");
Route::get("admin/event/create", [AdminController::class, "viewCreateEventsPage"])->middleware("isLoggedIn","isAdmin");
Route::post("admin/event/create", [AdminController::class, "createEvents"])->middleware("isLoggedIn","isAdmin");
Route::get("admin/event/edit/{eventID}", [AdminController::class, "viewEditEventsPage"])->middleware("isLoggedIn","isAdmin");
Route::post("admin/event/edit/{eventID}", [AdminController::class, "editEvents"])->middleware("isLoggedIn","isAdmin");
Route::get("admin/event/delete/{eventID}", [AdminController::class, "deleteEvents"])->middleware("isLoggedIn","isAdmin");

//==== Not authorized ===//
Route::view("noaccess","noaccess");
