<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\FullCustom;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shipment;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $category = Category::where('name', '!=', null)->count();
        $product = Product::where('name', '!=', null)->count();
        $fcustom = FullCustom::where('status', 1)->count();
        $dppay = Order::where('status', 1)->where('payment_status', 'DP 50%')->count();
        $clearpay = Order::where('status', 1)->where('payment_status', 'Lunas')->count();
        $proces = Order::where('status', 1)->where('order_status', 'Diproses')->count();
        $ready = Order::where('status', 1)->where('order_status', 'Jadi')->count();
        $send = Order::where('status', 1)->where('order_status', 'Dikirim')->count();
        $accept = Order::where('status', 1)->where('order_status', 'Diterima')->count();
        $free = Order::where('shipping_method', 'Gratis Pengiriman')->count();
        $ekspedisi = Order::where('shipping_method', 'Ekspedisi')->count();
        $user = User::where('roles', 'user')->count();
        return view('admin.index', compact('category', 'product', 'fcustom', 'dppay', 'clearpay', 'proces', 'ready', 'send', 'accept', 'free', 'ekspedisi', 'user'));
    }
}
