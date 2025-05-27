<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\User; // Doctor is a user
use Illuminate\Http\Request;

class AppointmentController extends Controller
{ 
    public function getAppointments()
    {
        $appointments = Appointment::with('patient')->get(); 
        return response()->json($appointments); 
    }
   
   
    public function addAppointment(Request $request)
    {
       
        $validatedData = $request->validate([
            'patient_id' => 'required|exists:patients,id', 
            'appointment_date' => 'required|date',
            'reason' => 'nullable|string|max:255',
        ]);

       
        $appointment = Appointment::create($validatedData);

       
        return response()->json([
            'message' => 'Appointment created successfully.',
            'data' => $appointment
        ], 201); 

    }
    public function getAppointmentById($id)
    {
        $appointment = Appointment::with('patient')->findOrFail($id);
        return response()->json($appointment);
    }

    
    public function editAppointment(Request $request, $id)
    {
      
        $appointment = Appointment::findOrFail($id);
     
        $validatedData = $request->validate([
            'patient_id' => 'required|exists:patients,id', 
            'appointment_date' => 'required|date',
            'reason' => 'nullable|string|max:255',
        ]);

       
        $appointment->update($validatedData);
        return response()->json([
            'message' => 'Appointment updated successfully.',
            'data' => $appointment
        ]);
    }

    
    public function deleteAppointment($id)
    {
       
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return response()->json([
            'message' => 'Appointment deleted successfully.'
        ]);
    }
}
  

