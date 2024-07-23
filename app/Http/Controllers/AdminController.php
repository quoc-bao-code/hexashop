<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use App\Models\Users;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function homead(){
        return view('homead');
    }
    public function productad(){
        $cata = Categories::all();
        $pro = Products::allpro();
        return view('productad',['pro'=>$pro,'cata'=>$cata]);
    }
    public function productadupdateform(Request $request,$id){
        $cata = Categories::all();
        $pro = Products::allpro();
        $product = Products::find($id);
        return view('updateproductad',['pro'=>$pro,'cata'=>$cata,'product'=>$product]);
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
        return redirect()->route('productad');
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
        Products::create($data);

        return redirect()->route('productad');
    }
    public function usersadd(Request $request){
        $data = $request->only(['name', 'email','password','role']);
        Users::create($data);

        return redirect()->route('usersad');
    }
    public function userupdateform(Request $request){
        $id = $request->id;
        $user = Users::find($id);
        return view('updateuserad',['user'=>$user]);
    }
    public function userupdate(Request $request,){
        $data = $request->only(['name', 'email','password','role']);
        $id = $request->id;
        $user = Users::find($id);
        $user->update($data);
        return redirect()->route('usersad');
    }

    public function productaddel($id){
        $product = Products::find($id);
        $imgPath = "uploads/".$product->img;
        if(file_exists($imgPath)){
            unlink($imgPath);
        }
        $product->delete();
        return redirect()->route('productad');
    }

    public function usersad(){
        return view('usersad');
    }
}
