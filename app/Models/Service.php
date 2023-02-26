<?php

namespace App\Models;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;
    protected $fillable=['id', 'name','created_at', 'updated_at'];
    protected $hidden=['created_at', 'updated_at','pivot'];
    

    public function doctor()
    {
        return $this-> belongsToMany(Doctor::class,'doctor_services');
    }
}
