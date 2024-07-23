<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Order;
use App\Models\Users;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class HomeController extends Controller
{
    public function home(){
        $category = Categories::all();
        $bestsell = Products::bestseller();
        $promen = Products::getproductcata(11);
        $prowomen = Products::getproductcata(12);
        $prokid = Products::getproductcata(13);
        return view('home', compact('promen','prowomen','prokid','bestsell','category'));
    }
    public function logout(){
        unset($_SESSION['user']);
        return redirect()->route('home');
    }

    public function profile($id){
        $category = Categories::all();
        $user = Users::findOrFail($id);
        return view('profile',['user'=>$user,'category'=>$category]);
    }
    public function userupdateprofile(Request $request){
        $data = $request->only('name','email');
        $id = $request->id;
        $users = Users::find($id);
        $users->update($data);
        return redirect()->route('profile',$id);
    }
    public function singleproduct($id)
        {
            $category = Categories::all();
            $product = Products::findOrFail($id);
            return view('single-product',['product'=>$product,'category'=>$category]);
        }
    public function login(){
        $category = Categories::all();
        return view('login',['category'=>$category]);
    }

    public function userlogin(Request $request){
            $email = $request->input('email');
            $pass = $request->input('pass');

            $user = Users::getuser($email,$pass)->first();
            if ($user) {
                if ($user->role == 1) {
                    $_SESSION['user']= $user;
                    return redirect()->route('homead');
                }else{
                    $_SESSION['user']= $user;
                    return redirect()->route('home');
                }
            }else{
                return redirect()->route('login');
            }
    }

    public function userregister(Request $request){
        $data = $request->only(['name','email','password']);
        Users::create($data);
        return redirect()->route('login');
    }

    public function register(){
        $category = Categories::all();
        return view('register',['category'=>$category]);
    }
    public function product(Request $request, $cataid){

        $category = Categories::all();
        $categorys = Categories::findOrFail($cataid);
        $kyw = $request->input('query');
        $cataid = $request->input('cataid');
        // $pro = Products::getproductcata($cataid);
        // $pro = Products::simplePaginate(9);
        $pro = $categorys->products()->paginate(9);
        return view('product',['pro'=>$pro,'category'=>$category,'categorys'=>$categorys,'kyw'=>$kyw,'cataid'=>$cataid]);
    }
    public function search(Request $request,$cataid){
        $category = Categories::all();
        $categorys = Categories::findOrFail($cataid);
        $kyw = $request->input('query');
        $cataid = $request->input('cataid');
        $pro = Products::search($request);
        return view('search',['pro'=>$pro,'category'=>$category,'categorys'=>$categorys,'kyw'=>$kyw,'cataid'=>$cataid]);

    }
    public function contact(){
        $category = Categories::all();
        return view('contact',['category'=>$category]);
    }
    public function addToCart(Request $request)
    {
        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'img' => $request->img
        ]);

        return redirect()->route('cart');
    }
    public function removeFromCart(Request $request)
    {
        Cart::remove($request->id);

        return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng!');
    }
    public function cart(){
        $category = Categories::all();
        $cartCollection = Cart::getContent();
        // dd($cartCollection);
        $total = Cart::getTotal();
        $totalQuantity = Cart::getTotalQuantity();
        return view('cart',['category'=>$category,'cartCollection'=>$cartCollection,'total'=>$total,'totalQuantity'=>$totalQuantity]);
    }
    public function cartup($id){
        $cartItem = Cart::get($id);
        if ($cartItem) {
            Cart::update($id, [
                'quantity' => 1,
            ]);
        }
        return redirect()->back();
    }
    public function cartdown($id){
        $cartItem = Cart::get($id);
        if ($cartItem && $cartItem->quantity > 1) {
            Cart::update($id, [
                'quantity' => -1,
            ]);
        }
        return redirect()->back();
    }

    public function about(){
        $category = Categories::all();
        return view('about',['category'=>$category]);
    }
    public function orderform(Request $request){
        $data = Cart::getContent();
        // dd($data);
        $category = Categories::all();
        $total = Cart::getTotal();
        $totalQuantity = Cart::getTotalQuantity();
        return view('order',['category'=>$category,'cartCollection'=>$data,'total'=>$total,'totalQuantity'=>$totalQuantity]);
    }

    public function orderadd(Request $request){
        $data = $request->all();
        // dd($data);
        $order = Order::create($data);
        $orderid = $order->id;
        // dd($orderid);
        $bills = Cart::getContent();
        foreach ($bills as $item) {
            // dd($orderid);
            Bill::create([
                'idpro' => $item->id,
                'idorders' => $orderid,
                'price' => $item->price,
                'name' => $item->name,
                'soluong' => $item->quantity,
                'thanhtien' => $item->getPriceSum()
            ]);
        }
        Cart::clear();
        return redirect()->route('home');
    }

    public function ordershistory(Request $request){
        $count = Order::count();
        $history = Order::getdata($request->id);
        $category = Categories::all();
        return view('ordershistory',['category'=>$category,'history'=>$history,'count'=>$count]);
    }

    public function orderdetail(Request $request){
        $getdetail = Order::getdetail($request->madh);
        $category = Categories::all();
        return view('orderdetail',['category'=>$category,'getdetail'=>$getdetail]);
    }
}
