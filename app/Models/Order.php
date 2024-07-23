<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'madh',
        'nguoidat_ten',
        'nguoidat_email',
        'nguoinhan_ten',
        'nguoinhan_tel',
        'nguoinhan_diachi',
        'total',
        'tongthanhtoan'
    ];

    public function scopegetdata($query,$id){
        return $query->where('user_id',$id)->orderBy('created_at','desc')->get();
    }
    public function scopegetdetail($query,$id){
        $query = Bill::where('idorders',$id)->get();
        return $query;
    }
}
