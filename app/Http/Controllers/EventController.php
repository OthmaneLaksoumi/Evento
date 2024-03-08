<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use SimpleSoftwareIO\QrCode\Facades\QrCode;


use function Laravel\Folio\{withTrashed};


class EventController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth::user();
        $events = Event::paginate(3)->withPath('?page=');

        return view('events.index', compact('user', 'events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth::user();
        $user = User::find($user->id);

        if (!$user->hasRole('organizer')) {
            abort(403, 'You are not an organizer');
        }
        $categories = Category::all();
        return view('events.create', compact('user', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255|min:5',
            'description' => 'required|min:5',
            'location' => 'required|string|min:5',
            'start_date' => 'date',
            'end_date' => 'date',
            'category_id' => 'required|exists:categories,id',
            'organizer_id' => 'required|exists:users,id',
            'total_seats' => 'required|integer',
            'auto_acceptance' => 'required|boolean'
        ]);
        $validated['available_seats'] = $validated['total_seats'];
        $event = Event::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return to_route('events.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $user = auth::user();
        $categories = Category::all();
        return view('events.edit', compact('user', 'event', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|max:255|min:5',
            'description' => 'required|min:5',
            'location' => 'required|string|min:5',
            'start_date' => 'date',
            'end_date' => 'date',
            'category_id' => 'required|exists:categories,id',
            'organizer_id' => 'required|exists:users,id',
            'available_seats' => 'required|integer',
            'auto_acceptance' => 'required|boolean'
        ]);
        $event->fill($validated)->save();

        return to_route('my_events');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return to_route('my_events');
    }

    public function restore(Event $event)
    {
        $event->restore();

        return to_route('my_events');
    }

    public function my_events()
    {
        $user = auth::user();
        $events = Event::withTrashed()
            ->where('organizer_id', '=', $user->id)
            ->paginate(2)
            ->withPath('my_events' . '/?page=');
        return view('events.index', compact('user', 'events'));
    }

    public function search(Request $request)
    {
        $user = auth::user();
        $query = $_GET['query'];
        $events = Event::where('title', 'like', '%' . $query . '%')->paginate(4)->withPath('?query=' . $query . "&page=");
        // dd($events);    
        return view('events.index', compact('user', 'events'));
    }

    public function reserve(Event $event)
    {
        $user = auth::user();
        // dd($event);
        $reservationId = DB::table('event_reservation')
            ->insertGetId([
                'event_id' => $event->id,
                'user_id' => $user->id,
                'QrCode' => null,
                'created_at' => date('Y-m-d H:i:s', time()),
            ]);
        if ($event->auto_acceptance === 1) {
            // Decreament number of seats for the event
            $event->available_seats = $event->available_seats - 1;
            $event->save();

            $qrCode = QrCode::size(200)->generate(route('ticket.show', ['id' => $reservationId]));

            DB::table('event_reservation')
                ->where('id', $reservationId)
                ->update([
                    'accteptable' => true,
                    'QrCode' => $qrCode,
                ]);
            return to_route('reservation.show', $reservationId);
        }



        return back()->with('wait', 'Please wait the organizer accepte your reservation.');
    }

    public function reservation_show($id)
    {
        $reservation = DB::table('event_reservation')
            ->where('id', $id)
            ->first();
        $event = Event::find($reservation->event_id);

        return view('events.QrCodeTicket', compact('event', 'reservation'));
    }

    public function ticket_show($id)
    {
        $reservation = DB::table('event_reservation')
            ->where('id', $id)
            ->first();
        $event = Event::find($reservation->event_id);

        return view('events.ticket', compact('event', 'reservation'));
    }

    public function reservations()
    {
        $user = auth::user();
        $events = Event::where('organizer_id', '=', $user->id)
        ->get();

        // $events = DB::table('events')
        //     ->join('event_reservation', 'events.id', '=', 'event_reservation.event_id')
        //     ->select(DB::raw('COUNT(event_reservation.id) as reservations_count'))
        //     ->where('events.id', '=', '1')
        //     ->first();

       


        return view('events.reservations', compact('events'));
    }
}
