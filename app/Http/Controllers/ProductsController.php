<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function product(){
        $cata = Categories::all();
        $pro = Products::allpro();

        return response()->json($pro);
    }
    public function productman(){
        $cata = Categories::all();
        $pro = Products::getproductcata(11);

        return response()->json($pro);
    }
    public function productwomen(){
        $cata = Categories::all();
        $pro = Products::getproductcata(12);

        return response()->json($pro);
    }
    public function productkid(){
        $cata = Categories::all();
        $pro = Products::getproductcata(12);

        return response()->json($pro);
    }
    public function category(){
        $cata = Categories::all();
        return response()->json($cata);
    }
    public function productadupdateform(Request $request,$id){
        $product = Products::find($id);
        return $product;
    }
    public function productadupdate(Request $request,){
        $data = $request->only(['name', 'price','Categories_id','img']);
        if ($request->hasFile('img')) {
            $imagePath = $request->file('img');
            $imageName = time() . '.' . $imagePath->getClientOriginalExtension();
            $request->img->move(public_path('uploads'), $imageName);
            $data['img'] = $imageName;
        }
        $id = $request->id;
        $product = Products::find($id);
        $imagePath = 'uploads/'.$product->img;
        if(file_exists($imagePath)){
            unlink($imagePath);
        }
        $product->update($data);
        return response()->json($product,200);
    }

    public function productads(Request $request){
        $cata = Categories::all();
        $pro = Products::allpro();
        $data = $request->only(['name', 'price','Categories_id','img']);
        if ($request->hasFile('img')) {
            $imagePath = $request->file('img');
            $imageName = time() . '.' . $imagePath->getClientOriginalExtension();
            $request->img->move(public_path('uploads'), $imageName);
            $data['img'] = $imageName;
        }
        $product = Products::create($data);

        return response()->json($product,200);
    }
    public function productaddel($id){
        $product = Products::find($id);
        $imgPath = "uploads/".$product->img;
        if(file_exists($imgPath)){
            unlink($imgPath);
        }
        $product->delete();
        return response()->json(null,204);
    }
}
