<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
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
}
