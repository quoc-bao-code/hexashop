<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
{
    // Tạo một đơn hàng mới
    $order = new Order();
    
    $order->user_id = auth()->user()->id; // Nếu đăng nhập được yêu cầu
    $order->total_amount = $request->input('total_amount'); // Tổng số tiền đơn hàng
    // Lưu thông tin khác của đơn hàng tùy theo cấu trúc của bạn
    
    // Lưu đơn hàng vào cơ sở dữ liệu
    $order->save();
}
}
