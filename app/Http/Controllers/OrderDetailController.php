<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Shipment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class OrderDetailController extends Controller
{
    public function orderform()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
        if (!empty($order)) {
            $orderdetails = OrderDetail::where('order_id', $order->id)->get();
            $shipments = Shipment::where('user_id', Auth::user()->id)->get();
            return view('orderform', compact('order', 'orderdetails', 'user', 'shipments'));
        }
        return view('orderform', compact('order', 'orderdetails', 'user', 'shipments'));
    }

    public function paymentoption(Request $request)
    {
        $validateData = $request->validate([
            'payment_option' => 'required'
        ]);

        Order::where('user_id', Auth::user()->id)->where('status', 0)->first()
            ->update($validateData);

        Alert::success('Sukses', 'Opsi Pembayaran Berhasil Disimpan');
        return redirect('orderform');
    }

    public function delete($id)
    {
        $orderDetail = OrderDetail::where('id', $id)->first();
        $order = Order::where('id', $orderDetail->order_id)->first();
        $order->total_price = $order->total_price - $orderDetail->price;
        $order->update();

        $orderDetail->delete();
        $order->delete();
        Alert::success('Sukses', 'Pesanan Berhasil Dibatalkan');
        return redirect('catalog');
    }

    public function addAddress(Request $request)
    {
        $validateData = $request->validate([
            'name'            => 'required|min:3',
            'phone_number'    => 'required|min:11|max:13|unique:shipments',
            'address'         => 'required|min:20'
        ]);

        $cek_shipment = Shipment::where('user_id', Auth::user()->id)->first();
        if (empty($cek_shipment)) {
            $shipment = new Shipment;
            $shipment->user_id = Auth::user()->id;
            $shipment->name = $request->name;
            $shipment->phone_number = $request->phone_number;
            $shipment->address = $request->address;
            $shipment->save($validateData);
        } else {
            $shipment = new Shipment;
            $shipment->user_id = Auth::user()->id;
            $shipment->name = $request->name;
            $shipment->phone_number = $request->phone_number;
            $shipment->address = $request->address;
            $shipment->save($validateData);
        }

        $validateData2 = $request->validate([
            'phone_number' => 'required|min:11|max:13|unique:user_data'
        ]);

        $user = User::findOrFail(Auth::user()->id);

        $user->userData($validateData2)->updateOrCreate(
            [
                'user_id' => $user->id,
            ],
            [
                'phone_number'   => $request->phone_number
            ]
        );

        Alert::success('Sukses', 'Data Alamat Berhasil Ditambahkan');
        return redirect('orderform');
    }

    public function addressOption(Request $request)
    {
        $validateData = $request->validate([
            'shipment_id' => 'required'
        ]);

        Order::where('user_id', Auth::user()->id)->where('status', 0)->first()
            ->update($validateData);

        Alert::success('Sukses', 'Data Alamat Berhasil Disimpan');
        return redirect('orderform');
    }

    public function confirmation()
    {
        $shipment = Shipment::where('user_id', Auth::user()->id)->first();

        if (empty($shipment->name) || empty($shipment->address) || empty($shipment->phone_number)) {
            Alert::error('Gagal', 'Data Alamat Harap Diisi');
            return redirect('orderform');
        }

        $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();

        $cek_order_details = OrderDetail::where('order_id', $order->id)->first();
        if (empty($cek_order_details)) {
            Alert::error('Gagal', 'Belum ada transaksi');
            return redirect('orderform');
        }
        if (empty($order->shipment_id)) {
            Alert::error('Gagal', 'Alamat Belum Dipilih');
            return redirect('orderform');
        }
        if ($order->payment_option == 'Lunas') {
            $order->remaining_payment = 0;
            $order->payment_status = 'Lunas';
        } else {
            $order->remaining_payment = $order->total_price - $order->dp_price;
        }
        $order->status = 1;
        $order->order_date = now();
        $order->update();

        Alert::success('Sukses', 'Pesanan berhasil di Checkout');
        return redirect('orders');
    }

    public function complete_order()
    {
        $order = Order::where('user_id', Auth::user()->id)->where('status', 1)->first();

        if (!empty($order)) {
            $order->order_status = 'Diterima';
            $order->update();
        }

        Alert::success('Sukses', 'Pesanan Telah Diterima');
        return redirect('orders');
    }
}
