<?php

namespace App\Models;

use PDO;
use App\Models\Doctor;
use App\Models\Medical;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;
    protected $fillable=['name','age','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];

    public function doctor()
    {
        return $this->hasOneThrough(Doctor::class,Medical::class);
    }
}
