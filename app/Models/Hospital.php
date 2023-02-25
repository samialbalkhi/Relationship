<?php

namespace App\Models;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hospital extends Model
{
    use HasFactory;

    protected $fillable=['name','address','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];
    public $timestamps=true ;
    
    //// relationship ///////////

    public function doctors()
    {
        return $this->hasMany(Doctor::class,'hospital_id');
    }
}
