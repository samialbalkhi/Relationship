<?php

namespace App\Models;

use App\Models\Hospital;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable=['name','title','hospital_id','gender','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];
    
    const FEMALE=0;
    const MALE=1;
    
    public function hospital()
    {
        return $this->belongsTo(Hospital::class,'hospital_id');
    }

    public function srevice()
    {
        $this->belongsToMany(Service::class,'doctor_services')
    }
}
