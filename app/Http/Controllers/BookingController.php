<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use Illuminate\support\Facades\DB;
use Illuminate\support\Facades\Validator;
use App\Http\Requests\BookingFormRequest;


class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
       $validatore = Validator::make(
           $request->all(),
           [
             'q' => 'bail|string|min:4'
           ]
           );

        if(!$validatore->fails()){
            $bookings = Booking::where('guest_full_name', 'LIKE',"%$request->q%")
            ->get();
        }else{
            $bookings = Booking::all();
        }

        $columns = [
            'id' => 'ID',
            'guest_full_name' => 'Client',
            'guest_credit_card' => 'Credit Card',
            'room' => 'Room',
            'from_date' => 'From date',
            'to_date' => 'To date',
            'more_details' => 'Note',
        ];
         
        return view('booking.index',compact('bookings','columns') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('booking.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingFormRequest $request)
    {

             $data = $request -> validated();

             $newBooking = new Booking();
             $newBooking->guest_full_name = $data['guest_full_name'];
             $newBooking->guest_credit_card = $data['guest_credit_card'];
             $newBooking->room = $data['room'];
             $newBooking->from_date = $data['from_date'];
             $newBooking->to_date = $data['to_date'];
             $newBooking->more_details = $data['more_details'];
             $newBooking->save();

             $booking = Booking::orderBy('id','desc')->first();



        return redirect()->route('booking.show', $booking);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking =  Booking::find($id);
        return view('booking.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $booking= Booking::find($id);
        return view('booking.edit', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookingFormRequest  $request, $id)
    {
              $data = $request -> validated();

             $oldBooking = new Booking();
             $oldBooking->guest_full_name = $data['guest_full_name'];
             $oldBooking->guest_credit_card = $data['guest_credit_card'];
             $oldBooking->room = $data['room'];
             $oldBooking->from_date = $data['from_date'];
             $oldBooking->to_date = $data['to_date'];
             $oldBooking->more_details = $data['more_details'];
             $oldBooking->save();
             return  redirect()->route('booking.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Booking::destroy($id);
       return redirect()->route('booking.index');   
    }
}
