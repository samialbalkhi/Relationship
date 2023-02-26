<?php

namespace App\Models;

use App\Models\Service;
use App\Models\Hospital;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable=['name','medical_id','title','hospital_id','gender','created_at','updated_at'];
    protected $hidden=['created_at','updated_at','pivot'];

    const FEMALE=0;
    const MALE=1;
    
    public function hospital()
    {
        return $this->belongsTo(Hospital::class,'hospital_id');
    }

    public function srevice()
    {
      return $this->belongsToMany(Service::class,'doctor_services');
    }
}
