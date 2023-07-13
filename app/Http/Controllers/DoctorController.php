<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $doctors = Doctor::all();
        return response($doctors);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $doctor = new Doctor;
        // Set the doctor attributes based on the request data
        $doctor->name = $request->input('name');
        $doctor->email = $request->input('email');
        $doctor->phone = $request->input('phone');
        $doctor->degree = $request->input('degree');
        $doctor->experiance = $request->input('experiance');
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('doctor/file', 'public');

            $doctor->file_path = $path; // Save the file path to the patient model
        }
        // ... set other attributes as needed
        
        // Save the doctor to the database
        $doctor->save();
        
        return response("new request saved");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
        return response($doctor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
        $doctor->name = $request->input('name');
        $doctor->email = $request->input('email');
        $doctor->phone = $request->input('phone');
        $doctor->degree = $request->input('degree');
        $doctor->experiance = $request->input('experiance');
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('doctor/file', 'public');
            $doctor->file_path = $path; // Save the file path to the patient model
        }
        // ... update other attributes as needed
        
        // Save the updated doctor to the database
        $doctor->save();
        
        return response("doctor updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
        $doctor->delete();
        
        return response("doctor record deleted");
    }
}
