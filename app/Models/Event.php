<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;


class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'location',
        'category_id',
        'organizer_id',
        'available_seats',
        'auto_acceptance',
    ];

    public function category() {
        $category_id = $this->category_id;
        return Category::find($category_id);
    }

    public function user() {
        $organizer_id = $this->organizer_id;
        return User::find($organizer_id);
    }

    public function number_of_reservations() {
        $nbr = DB::table('events')
        ->join('event_reservation', 'events.id', '=', 'event_reservation.event_id')
        ->select(DB::raw('COUNT(event_reservation.id) as reservations_count'))
        ->where('events.id', '=', $this->id)
        ->first()
        ->reservations_count;

        return $nbr;
    }
}
