<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use Illuminate\Http\Request;

class BillingController extends Controller
{
   
    public function getBillings()
    {
        $billings = Billing::with('patient', 'appointment')->get();
        return response()->json($billings);
    }

   
    public function getBillingById($id)
    {
        $billing = Billing::with('patient', 'appointment')->find($id);

        if (!$billing) {
            return response()->json(['message' => 'Billing record not found.'], 404);
        }

        return response()->json($billing);
    }

   
    public function addBilling(Request $request)
    {
        $validatedData = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'appointment_id' => 'required|exists:appointments,id',
            'amount' => 'required|numeric|min:0',
            'description' => 'required|string|max:255',
            'billing_date' => 'required|date',
        ]);

        $billing = Billing::create($validatedData);

        return response()->json([
            'message' => 'Billing record created successfully.',
            'data' => $billing
        ], 201);
    }

    
    public function editBilling(Request $request, $id)
    {
        $billing = Billing::find($id);

        if (!$billing) {
            return response()->json(['message' => 'Billing record not found.'], 404);
        }

        $validatedData = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'appointment_id' => 'required|exists:appointments,id',
            'amount' => 'required|numeric|min:0',
            'description' => 'required|string|max:255',
            'billing_date' => 'required|date',
        ]);

        $billing->update($validatedData);

        return response()->json([
            'message' => 'Billing record updated successfully.',
            'data' => $billing
        ]);
    }

  
    public function deleteBilling($id)
    {
        $billing = Billing::find($id);

        if (!$billing) {
            return response()->json(['message' => 'Billing record not found.'], 404);
        }

        $billing->delete();

        return response()->json(['message' => 'Billing record deleted successfully.']);
    }
}