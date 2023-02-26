<?php

namespace App\Http\Controllers;

use App\Models\Countre;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function has_one_through()
    {
        $patian=Patient::find(1);
        return $patian->doctor;
    }
    public function has_many_through()
    {
        $country=Countre::find(1);
        return $country->doctors;
    }
}
