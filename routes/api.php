<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PatientController;
use App\Http\Controllers\API\MedicineController;
use App\Http\Controllers\API\MedicinePatientController;
use App\Http\Controllers\API\DoctorVisitController;
use App\Http\Controllers\API\ClinicalNoteController;
use App\Http\Controllers\API\VitalController;
use App\Http\Controllers\API\ScheduleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function () {
    // Default user route
    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });

    // Authentication
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    // Users list (only for logged-in users)
    Route::get('/users', [AuthController::class, 'index'])
        ->middleware('auth:sanctum');

    // Protected resources
    Route::middleware('auth:sanctum')->group(function () {
        Route::apiResource('patients', PatientController::class);
        Route::apiResource('medicines', MedicineController::class);
        Route::apiResource('doctor-visits', DoctorVisitController::class);
        Route::apiResource('vitals', VitalController::class);
        Route::apiResource('clinical-notes', ClinicalNoteController::class);
        Route::apiResource('schedules', ScheduleController::class);
        Route::apiResource('medicine-patient', MedicinePatientController::class);
    });
});