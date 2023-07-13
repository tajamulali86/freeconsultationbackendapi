<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $patients = Patient::all();
        return response($patients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //.
        
        $patient = new Patient;
        // Set the patient attributes based on the request data
        $patient->name = $request->input('name');
        $patient->email = $request->input('email');
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('files'); // Adjust the storage path as needed
            $patient->file_path = $path; // Save the file path to the patient model
        }
        if ($request->hasFile('profileimg')) {
            $file = $request->file('profileimg');
            $path = $file->store('profileimg'); // Adjust the storage path as needed
            $patient->profileimg = $path; // Save the file path to the patient model
        }

        // ... set other attributes as needed
        
        // Save the patient to the database
        $patient->save();
        
        return response("new request saved");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
        return response($patient);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        //
        $patient->name = $request->input('name');
        $patient->email = $request->input('email');
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('files'); // Adjust the storage path as needed
            $patient->file_path = $path; // Save the file path to the patient model
        }
        if ($request->hasFile('profileimg')) {
            $file = $request->file('profileimg');
            $path1= $file->store('profileimg'); // Adjust the storage path as needed
            $patient->profileimg = $path; // Save the file path to the patient model
        }
        // Save the patient to the database
        $patient->save();

        // ... update other attributes as needed
        
        // Save the updated patient to the database
        $patient->save();
        
        return response("patient updated");
    }

    /**
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
        $patient->delete();
        
        return response("patient record deleted");
    }
}
