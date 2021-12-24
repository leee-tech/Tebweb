<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Booking;
use App\Models\Time;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    public function index(Request $request)
    {
        date_default_timezone_set('America/New_York');
        if (request('date')) {
            $formatDate = date('Y-m-d', strtotime(request('date')));
            $doctors = Appointment::with('doctor')->where('date', $formatDate)->get();
            return view('patient.booking.view', compact('doctors', 'formatDate'));
        };
        $doctors = Appointment::where('date', date('Y-m-d'))->get();
        return view('patient.booking.view', compact('doctors'));
    }
    public function myBook(){
        $appointments = Booking::latest()->where('user_id', auth()->user()->id)->get();
        return view('patient.booking.booking-list', compact('appointments'));

    }
    public function myBookDoctor(){
        $appointments = Booking::latest()->where('doctor_id', auth()->user()->id)->get();
        return view('doctor.appointment.my-appointment', compact('appointments'));
    }
    public function create()
    {
        //
    }
    public function checkBookingTimeInterval()
    {
        return Booking::orderby('id', 'desc')
            ->where('user_id', auth()->user()->id)
            ->whereDate('created_at', date('Y-m-d'))
            ->exists();
    }
    public function store(Request $request)
    {
        // Set timezone
        date_default_timezone_set('America/New_York');

        $request->validate(['time' => 'required']);
        $check = $this->checkBookingTimeInterval();
        if ($check) {
            return redirect()->back()->with('errMessage', 'You already made an appointment');
        }

        $doctorId = $request->doctorId;
        $time = $request->time;
        $appointmentId = $request->appointmentId;
        $date = $request->date;
        Booking::create([
            'user_id' => auth()->user()->id,
            'doctor_id' => $doctorId,
            'time' => $time,
            'date' => $date,
            'status' => 0
        ]);
        $doctor = User::where('id', $doctorId)->first();
        Time::where('appointment_id', $appointmentId)->where('time', $time)->update(['status' => 1]);
        return redirect()->route('bookings.index')->with('message', 'Your appointment was booked for ' . $date . ' at ' . $time . ' with ' . $doctor->name . '.');

    }
    public function show(Booking $booking)
    {
        //
    }
    public function edit(Booking $booking)
    {
        //
    }
    public function update(Request $request, Booking $booking)
    {

    }
    public function destroy(Booking $booking)
    {
        //
    }
    public function createPrescription(Booking $booking){
        return view('doctor.appointment.create-prescription',compact('booking'));
    }
    public function PrescriptionStore(Request $request,Booking $booking){
        dd($request->all());
//        return view('doctor.appointment.create-prescription',compact('booking'));
    }
}
