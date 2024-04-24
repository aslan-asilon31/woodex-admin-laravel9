<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Shipment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function index(Request $request, Order $order)
    {
        $orders = Order::where('user_id', Auth::user()->id)->where('status', 1)->latest()->filter(request(['search']))->paginate(10);
        $orders->appends($request->all()); //agar searching ikut di paginasi
        return view('catalogorder.order', compact('orders'));
    }

    public function order(Request $request, $id)
    {
        $product = Product::where('id', $id)->first();
        $order_date = Carbon::now();

        $validateData = $request->validate([
            'length'         => 'required|numeric|min:10',
            'height'         => 'required|numeric|min:10',
        ]);

        if ($request->qty_order < 1) {
            Alert::error('Gagal', 'Jumlah produk tidak boleh kurang dari 1');
            return redirect('product/detail/' . $product->slug);
        }

        $cek_order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
        if (empty($cek_order)) {
            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->order_date = $order_date;
            $order->status = 0;
            $order->order_code = 'TKP-';
            // $order->kode_unik = mt_rand(1, 999);
            $order->total_price = 0;
            $order->dp_price = 0;
            $order->remaining_payment = 0;
            $order->save();
            // $order->total_harga=$order->kode_unik;
            $order->order_code = $order->order_code . Auth::user()->id . '-' . $order->id;
            $order->update();
        }

        $order_baru = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $cek_order_detail = OrderDetail::where('product_id', $product->id)->where('order_id', $order_baru->id)->first();
        if (empty($cek_order_detail)) {
            $orderDetail = new OrderDetail;
            $orderDetail->product_id = $product->id;
            $orderDetail->order_id = $order_baru->id;
            $orderDetail->qty_order = $request->qty_order;
            $orderDetail->length = $request->length;
            $orderDetail->height = $request->height;
            $orderDetail->save($validateData);
        }
        $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
        if ($request->length && $request->height > 99) {
            $order->total_price = $order->total_price + $product->price_meter * $request->qty_order * ($request->length / 100) * ($request->height / 100);
        } else {
            $order->total_price = $order->total_price + $product->price_meter * $request->qty_order * $request->length * $request->height;
        }
        $order->dp_price = $order->total_price * 50 / 100;
        $order->remaining_payment = $order->total_price - $order->dp_price;
        $order->update();
        Alert::success('Sukses', 'Produk berhasil dipesan');
        return redirect('orderform');
    }

    public function orderDetail(Order $order)
    {
        $orderdetails = OrderDetail::where('order_id', $order->id)->get();
        return view('catalogorder.orderdetail', compact('order', 'orderdetails'));
    }

    public function evidencetf(Order $order)
    {
        $orderdetails = OrderDetail::where('order_id', $order->id)->get();
        return view('catalogorder.evidencetf', compact('order', 'orderdetails'));
    }

    public function confirm_evidencetf(Request $request, $id)
    {
        $validateData = $request->validate([
            'evidencetf' => 'required|image|file|max:1024'
        ]);
        if ($request->file('evidencetf')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['evidencetf'] = $request->file('evidencetf')->store('buktif-tf');
        }
        Order::find($id)->update($validateData);

        Alert::success('Sukses', 'Bukti Transfer Berhasil di Upload');
        return redirect('orders');
    }

    public function evidencetf2(Order $order)
    {
        $orderdetails = OrderDetail::where('order_id', $order->id)->get();
        return view('catalogorder.evidencetf2', compact('order', 'orderdetails'));
    }

    public function confirm_evidencetf2(Request $request, $id)
    {
        $validateData = $request->validate([
            'evidencetf2' => 'required|image|file|max:1024'
        ]);
        if ($request->file('evidencetf2')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['evidencetf2'] = $request->file('evidencetf2')->store('buktif-tf-2');
        }
        Order::find($id)->update($validateData);

        Alert::success('Sukses', 'Bukti Transfer Berhasil di Upload');
        return redirect('orders');
    }

    public function showpay(Order $order)
    {
        return view('catalogorder.fullpayment', compact('order'));
    }

    public function fullpayment(Request $request, $id)
    {
        $validateData = $request->validate([
            'full_payment' => 'required'
        ]);

        Order::find($id)->update($validateData);

        Alert::success('Sukses', 'Opsi Pelunasan Berhasil Disimpan');
        return redirect('orders');
    }
}
