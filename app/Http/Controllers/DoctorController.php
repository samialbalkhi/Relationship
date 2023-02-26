<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Service;
use App\Models\Hospital;
use Illuminate\Http\Request;
use Symfony\Component\Console\Command\DumpCompletionCommand;

class DoctorController extends Controller
{
    public function get_doctor_hospital()
    {
        $hospital = Hospital::with('doctors')->find(1);

        //    return  $hospital->doctors; // get doctor ->hosptil
        $doctors = $hospital->doctors;

        // foreach($doctors as $doctor){
        //   echo  $doctor ->name .'<br>';
        // }

        $doctor = Doctor::find(3);

        return $doctor->hospital->name;
    }

    public function hosptals()
    {
        $hospital = Hospital::select('id', 'name', 'address')->get();
        return view('doctor.hospital', compact('hospital'));
    }

    public function Doctor($id)
    {

        $hospital = Hospital::find($id);

        $doctor = $hospital->doctors;
        return view('doctor.Doctor', compact('doctor'));
    }
    public function hospital_dosnt_have_employees()
    {
        $hospetial=Hospital::whereHas('doctors')->get();
        
        return $hospetial ;
    }
    
    public function hospital_get_doctor_where_male()
    {
        // Doctor::where('gender',Doctor::FEMALE);
       $hospital=Hospital::withwhereHas('doctors',function($query){
        $query->where('gender',Doctor::MALE);
       })->get();

       return $hospital; 
    }

    public function hospital_get_not_doctor()
    {
        $hospetial=Hospital::whereDoesntHave('doctors')->get();
        return $hospetial ;
    }

    public function delete_hospitals($id)
    {
         $hospital=Hospital::findOrFail($id);
         //delete doctore  -> hospetial
         $hospital->doctors()->delete();

         //delete hospetial
         $hospital->delete();

         return response('deleted successfully');
    }
    public function doctor_services()
    {
        $doctor=Doctor::with('srevice')->find(5);
        return $doctor;
    }   
    public function services_doctor()
    {
        $doctor=Service::with('doctor')-> find(1);
        return $doctor;
    }
    public function get_doctors_services($id)
    {
        $doctor=Doctor::find($id);
        $srevice=$doctor->srevice;

        $doctors=Doctor::select('id','name')->get();
        $srevices=Service::select('id','name')->get();

    
        return view('doctor.srevice', compact(['srevice','doctors','srevices']));

    }

    public function save_services_todoctor(Request $request)
    {
        $doctor=Doctor::find($request->doctor);

        //sync Add delete old
        //attach   insert 
        //syncwithoutdetaching   Add a new one without deleting the old one
        $doctor->srevice()->syncwithoutdetaching($request->srevices);
        
        return 'success';
    }
    
}
