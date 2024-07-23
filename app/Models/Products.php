<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'Categories_id',
        'img',
        'price',
    ];

    public function scopebestseller($query){

        return $query->where('bestseller','>=',6)->orderBy('bestseller', 'desc')->limit(6)->get();
    }

    public function scopesearch($query,$request){
        $search = $request->input('search');

        // Nếu có từ khóa tìm kiếm, lọc các sản phẩm theo từ khóa
        return $query->where('name', 'LIKE', "%$search%")->paginate(9);
    }

    public function scopeallpro($query){
        return $query ->orderBy('updated_at','desc') -> get();
    }

    public function scopegetproductcata($query,$cataid){
        return $query ->  where('Categories_id',$cataid)->get();
    }
    
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

}
