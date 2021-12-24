<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Time;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{

    public function index()
    {
        $myAppointments = Appointment::with('doctor')->latest()->where('user_id', auth()->user()->id)->get();
        return view('doctor.appointment.check', compact('myAppointments'));

    }


    public function create()
    {
        return view('doctor.appointment.appointment-add');
    }


    public function store(Request $request)
    {
        // validation, unique:table,column with the column id == user_id
        $this->validate($request, [
            'date' => 'required|unique:appointments,date,NULL,id,user_id,' . Auth::id(),
            'time' => 'required'
        ]);

        $appointment = Appointment::create([
            'user_id' => auth()->user()->id,
            'date' => $request->date
        ]);
        foreach ($request->time as $time) {
            Time::create([
                'appointment_id' => $appointment->id,
                'time' => $time
                // default status => 0
            ]);
        }
        return redirect()->route('appointments.index')->with('message', 'An appointment created for ' . $request->date);
    }
    public function check(Request $request)
    {
        $date = $request->date;
        $appointment = Appointment::where('date', $date)->where('user_id', auth()->user()->id)->first();
        if (!$appointment) {
            return redirect()->to('doctor/appointments')->with('errMessage', 'Appointment time is not available for this date');
        };
        $appointmentId = $appointment->id;
        $times = Time::where('appointment_id', $appointmentId)->get();
        return view('doctor.appointment.check', compact('times', 'appointmentId', 'date'));
    }
    public function updateTime(Request $request)
    {
        $appointmentId = $request->appointmentId;
        $date = Appointment::where('id', $appointmentId)->get('date')->first()->date;
        Time::where('appointment_id', $appointmentId)->delete();
        foreach ($request->time as $time) {
            Time::create([
                'appointment_id' => $appointmentId,
                'time' => $time,
                'status' => 0
            ]);
        }
        return redirect()->route('appointments.index')->with('message', 'Appointment time for ' . $date . ' is updated successfully!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
    public function showAppointment($doctorId, $date){
        $appointment = Appointment::where('user_id', $doctorId)->where('date', $date)->first();
        $times = Time::where('appointment_id', $appointment->id)->where('status', 0)->get();
        $user = User::with(['department','hospital'])->where('id', $doctorId)->first();
        $doctor_id = $doctorId;
        return view('patient.appointment.appointment-by-doctor', compact('times', 'date', 'user', 'doctor_id'));

    }
}
