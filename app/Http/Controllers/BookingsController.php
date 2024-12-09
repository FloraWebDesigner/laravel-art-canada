<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Booking;
use App\Models\User;
use App\Models\Facility;

class BookingsController extends Controller
{

    public function list()
    {
        return view('bookings.list', [
            'bookings' => Booking::all()
        ]);
    }

    public function addForm()
    {
        return view('bookings.add',[
            'users' => User::all(),
            'facilities' => Facility::all(),
        ]);
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'user_id' => 'required',
            'group_member' => 'required|integer',
            'reservation_date' => 'required|date',
            'facility_id' => 'required',
        ]);

        $booking = new Booking();
        $booking->user_id = $attributes['user_id'];
        $booking->group_member = $attributes['group_member'];
        $booking->reservation_date = $attributes['reservation_date'];
        $booking->facility_id = $attributes['facility_id'];

        $booking->save();

        return redirect('/console/bookings/list')
            ->with('message', 'Booking has been added!');
    }

    public function editForm(Booking $booking)
    {
        return view('bookings.edit', [
            'booking' => $booking,
            'users' => User::all(), 
            'facilities' => Facility::all(),  
        ]);
    }

    public function edit(Booking $booking)
    {

        $attributes = request()->validate([
            'user_id' => 'required',
            'group_member' => 'required|integer',
            'reservation_date' => 'required|date',
            'facility_id' => 'required',
        ]);

        $booking->user_id = $attributes['user_id'];
        $booking->group_member = $attributes['group_member'];
        $booking->reservation_date = $attributes['reservation_date'];
        $booking->facility_id = $attributes['facility_id'];

        $booking->save();

        return redirect('/console/bookings/list')
            ->with('message', 'Booking has been edited!');
    }

    public function delete(Booking $booking)
    {
        $booking->delete();
        
        return redirect('/console/bookings/list')
            ->with('message', 'Booking has been deleted!');        
    }

}
