<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Booking;
use App\Models\Department;
use App\Models\Disease;
use App\Models\Drug;
use App\Models\Hospital;
use App\Models\Prescription;
use App\Models\Time;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{

    public function index(Request $request)
    {
        $departments = Department::all();
        date_default_timezone_set('America/New_York');
        if($request->department_id !=0 && !$request->date){
            $doctors = User::where('department_id',$request->department_id)->get('id');
            $doctors = Appointment::with('doctor')->whereIn('user_id',$doctors)->get();
            return view('patient.booking.view', compact('doctors','departments'));

        }
        if ($request->date) {
            $formatDate = date('Y-m-d', strtotime($request->date));
            if($request->department_id !=0){
                $doctors = User::where('department_id',$request->department_id)->get('id');
                $doctors = Appointment::with('doctor')->whereIn('user_id',$doctors)->where('date', $formatDate)->get();
            }else{
                $doctors = Appointment::with('doctor')->where('date', $formatDate)->get();
            }
            return view('patient.booking.view', compact('doctors', 'formatDate','departments'));
        }
        $doctors = Appointment::where('date', date('Y-m-d'))->get();
        return view('patient.booking.view', compact('doctors','departments'));
    }
    public function myBook(){
        $appointments = Booking::latest()->where('user_id', auth()->user()->id)->get();
        return view('patient.booking.booking-list', compact('appointments'));

    }
    public function myBookDoctor(Request $request){
        if(isset($request->date)){
            $appointments = Booking::latest()->where('date',$request->date)->where('doctor_id', auth()->user()->id)->get();
            return view('doctor.appointment.my-appointment', compact('appointments'));
        }
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
            ->whereDate('date', date('Y-m-d'))
            ->where('status',0)
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
        $drugs = Drug::all();
        $diseases = Disease::all();
        return view('doctor.appointment.create-prescription',compact('booking','drugs','diseases'));
    }
    public function PrescriptionStore(Request $request,Booking $booking){
        $prescriptions = $request->all();
        $count = count($request->disease_id);
        if ($count !=NULL) {
            for ($i=0; $i <$count ; $i++) {
                $prescription = new Prescription();
                $prescription->user_id = $booking->user_id;
                $prescription->doctor_id = Auth()->user()->id;
                $prescription->book_id = $booking->id;
                $prescription->disease_id = $request->disease_id[$i];

                $prescription->drug_id = $request->drug_id[$i];
                $prescription->usage_instruction = $request->usage_instruction[$i];
                $prescription->feedback = $request->feedback[$i];
                $prescription->save();

            }
        }
        return redirect()->route('appointments.my-book-doctor')->with('message', 'Your appointment was booked for ');
    }
    public function ShowPrescription(Booking $booking){
        $prescriptions = Prescription::where('book_id',$booking->id)->get();
        return view('doctor.appointment.show-prescription',compact('prescriptions','booking'));
    }
    public function UpdateStatusBooking(Booking $booking){
        $booking->update(['status'=>1]);
        return redirect()->route('appointments.my-book-doctor')->with('message', 'Your appointment was booked for ');

    }
    public function showAppointment($doctorId, $date){
        $appointment = Appointment::with('clinic')->where('user_id', $doctorId)->where('date', $date)->first();
        $times = Time::where('appointment_id', $appointment->id)->where('status', 0)->get();
        $user = User::with(['department','hospital'])->where('id', $doctorId)->first();
        $sum_rating_by_doctor = Booking::where('doctor_id',$doctorId)->get(['rate']);
        $avg_rate = collect($sum_rating_by_doctor)->avg('rate');
        $doctor_id = $doctorId;

        return view('patient.appointment.appointment-by-doctor', compact('times', 'date', 'user', 'doctor_id','avg_rate','appointment'));

    }
    public function ShowPrescriptionP(Booking $booking){
        $prescriptions = Prescription::where('book_id',$booking->id)->get();
        return view('patient.booking.show-prescription',compact('prescriptions','booking'));
    }
    public function rate_view(Booking $booking){
        return view('patient.booking.view-rate',compact('booking'));
    }
    public function rate(Request $request,Booking $booking){
    $booking->update(['rate'=>$request->star]);
    return redirect()->route('mybook');
    }
}
