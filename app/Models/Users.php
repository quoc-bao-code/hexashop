<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'diachi',
        'dienthoai',
        'role'  
    ];
    
    public function scopegetuser($query,$email,$pass){
        return $query->where('email', $email)
                     ->where('password', $pass);
    }

}
