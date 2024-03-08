<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Event;


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

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');
Route::get('/', [EventController::class, 'index'])->name('home');

Route::get('/pdf/{id}', function ($id) {
    $reservation = DB::table('event_reservation')
        ->where('id', $id)
        ->first();
    $event = Event::find($reservation->event_id);
    $pdf = Pdf::loadView('events.ticketPDF', compact('event', 'reservation'));
    return $pdf->download('ticket.pdf');
})->name('pdf');

Route::resource('events', EventController::class)->withTrashed();
Route::get('my_events', [EventController::class, 'my_events'])->name('my_events');
Route::post('/restore/{event}', [EventController::class, 'restore'])->name('events.restore')->withTrashed();
Route::get('/search', [EventController::class, 'search'])->name('events.search');
Route::post('/reserve/{event}', [EventController::class, 'reserve'])->name('events.reserve');
Route::get('/reserve_affiche/{id}', [EventController::class, 'reservation_show'])->name('reservation.show');
Route::get('/ticket/{id}', [EventController::class, 'ticket_show'])->name('ticket.show');
Route::get('/reservations', [EventController::class, 'reservations'])->name('reservations.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/be_organizer', [ProfileController::class, 'be_organizer'])->name('profile.be_organizer');
});

require __DIR__ . '/auth.php';
