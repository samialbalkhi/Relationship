<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\User;
use Illuminate\Http\Request;

class RelationshipController extends Controller
{

    public function hasRelationship()
    {
        $users = User::with(['phone' => function ($q) {

            $q->select('phone', 'code', 'user_id');
        }])->find(1);
        // return $users->phone->phone;
         return $users;
    }
    public function hasRelationship_reserve()
    {
        $phone = Phone::with(['user' => function ($q) {
            $q->select('name', 'id');
        }])->find(1);
        return $phone;
    }
    public function get_user_phone()
    {
        return User::whereHas('phone')->get();
    }
    public function get_user_wher_not_phone()
    {
        return User::whereDoesntHave('phone')->get();
    }
    public function get_user_where_code()
    {
        return User::whereHas('phone', function ($query) {
            $query->where('code', '626226');
        })->get();
    }
}
