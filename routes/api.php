<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']); 

    Route::middleware('auth:sanctum')->group(function () {


    Route::get('/get-users', [UserController::class, 'getUsers']);
    Route::post('/add-user', [UserController::class, 'addUser']);
    Route::put('/edit-user/{id}', [UserController::class, 'editUser']);
    Route::delete('/delete-user/{id}', [UserController::class, 'deleteUser']);


    // Routes for Patient
    Route::get('/get-patients', [PatientController::class, 'getPatients']);
    Route::post('/add-patient', [PatientController::class, 'addPatient']);  
    Route::put('/edit-patient/{id}', [PatientController::class, 'editPatient']);  
    Route::delete('/delete-patient/{id}', [PatientController::class, 'deletePatient']);  

    // Routes for Appointment
    Route::get('/get-appointments', [AppointmentController::class, 'getAppointments']);  
    Route::post('/add-appointment', [AppointmentController::class, 'addAppointment']);  
    Route::put('/edit-appointment/{id}', [AppointmentController::class, 'editAppointment']); 
    Route::delete('/delete-appointment/{id}', [AppointmentController::class, 'deleteAppointment']); 

    Route::get('/get-billings', [BillingController::class, 'getBillings']);
    Route::post('/add-billing', [BillingController::class, 'addBilling']);
    Route::put('/edit-billing/{id}', [BillingController::class, 'editBilling']);
    Route::delete('/delete-billing/{id}', [BillingController::class, 'deleteBilling']);

   
    Route::post('/logout', [AuthenticationController::class, 'logout']);  
});

