<?php

namespace App\Models;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Countre extends Model
{
    use HasFactory;
    protected $fillable=['name','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];


    public  function doctors()
    {
        return $this->hasManyThrough(Doctor::class,Hospital::class);
    }
}
