<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Shipment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class AdminOrderController extends Controller
{
    public function incoming_order(Request $request)
    {
        $orders = Order::where('status', 1)->where('order_status', 'Menunggu Konfirmasi')->filter(request(['search']))->paginate(10);
        $orders->appends($request->all());
        $title = 'Hapus Pesanan!';
        $text = "Apakah anda yakin akan menghapus ?";
        confirmDelete($title, $text);
        return view('admin.incoming_order.index', compact('orders'));
    }

    public function detail_incoming_order(Order $order)
    {
        $orderdetails = OrderDetail::where('order_id', $order->id)->get();
        return view('admin.incoming_order.show', compact('order', 'orderdetails'));
    }

    public function proses_incoming_order(Order $order)
    {
        return view('admin.incoming_order.proses', compact('order'));
    }

    public function konfirmasi_incoming_order(Request $request, $id)
    {
        if ($request->order_status == 'Menunggu Konfirmasi') {
            Alert::error('Gagal', 'Pesanan gagal di proses');
            return redirect('/admin/incomingorder');
        }
        if ($request->payment_status == 'Menunggu Pembayaran') {
            Alert::error('Gagal', 'Order gagal di proses');
            return redirect('/admin/incomingorder');
        }
        $order = Order::find($id)->update($request->all());
        Alert::success('Sukses', 'Pesanan berhasil di proses');
        return redirect('/admin/incomingorder');
    }

    public function delete_incoming_order($id)
    {
        $order = Order::where('id', $id)->first();

        if ($order->evidencetf) {
            Storage::delete($order->evidencetf);
        }

        $order->delete();
        Alert::success('Sukses', 'Pesanan berhasil di hapus');
        return redirect('/admin/incomingorder');
    }

    public function all_order(Request $request)
    {
        $orders = Order::where('status', 1)->where('order_status', '!=', 'Menunggu Konfirmasi')->latest()->filter(request(['search']))->paginate(10);
        $orders->appends($request->all());
        $title = 'Hapus Pesanan!';
        $text = "Apakah anda yakin akan menghapus ?";
        confirmDelete($title, $text);
        return view('admin.all_order.index', compact('orders'));
    }

    public function detail_all_order(Order $order)
    {
        $orderdetails = OrderDetail::where('order_id', $order->id)->get();
        return view('admin.all_order.show', compact('order', 'orderdetails'));
    }

    public function edit_all_order(Order $order)
    {
        return view('admin.all_order.edit', compact('order'));
    }

    public function konfirmasi_edit_all_order(Request $request, $id)
    {
        $order = Order::find($id);

        if ($request->order_status != $order->order_status) {
            if ($request->order_status == 'Diproses') {
                $order = Order::find($id)->update($request->all());
                Alert::success('Sukses', 'Pesanan berhasil di edit');
                return redirect('/admin/allorder');
            } elseif ($request->order_status == 'Jadi') {
                $order = Order::find($id)->update($request->all());
                Alert::success('Sukses', 'Pesanan berhasil di edit');
                return redirect('/admin/allorder');
            } elseif ($request->order_status == 'Dikirim') {
                $order = Order::find($id)->update($request->all());
                Alert::success('Sukses', 'Pesanan berhasil di edit');
                return redirect('/admin/allorder');
            } elseif ($request->order_status == 'Diterima') {
                $order = Order::find($id)->update($request->all());
                Alert::success('Sukses', 'Pesanan berhasil di edit');
                return redirect('/admin/allorder');
            }
        }

        if ($request->payment_status != $order->payment_status) {
            if ($request->payment_status == 'Lunas') {
                $order = Order::find($id)->update($request->all());
                Alert::success('Sukses', 'Pesanan berhasil di edit');
                return redirect('/admin/allorder');
            }
        }

        Alert::error('Gagal', 'Pesanan gagal di edit');
        return redirect('/admin/allorder');
    }

    public function delete_all_order($id)
    {
        $order = Order::where('id', $id)->first();

        if ($order->evidencetf) {
            Storage::delete($order->evidencetf);
        }

        if ($order->evidencetf2) {
            Storage::delete($order->evidencetf2);
        }

        $order->delete();

        Alert::success('Sukses', 'Pesanan Berhasil Dihapus');
        return redirect('/admin/allorder');
    }

    public function shipment(Order $order)
    {
        return view('admin.shipment.edit', compact('order'));
    }

    public function updateShipment(Request $request, $id)
    {
        $validateData = $request->validate([
            'shipping_method'  => 'required',
            'resi_number'      => 'min:12',
            'shipping_service' => 'min:3',
            'postage'          => 'numeric'
        ]);

        Order::find($id)->update($validateData);

        Alert::success('Sukses', 'Data Pengiriman Diperbarui');
        return redirect('/admin/allorder');
    }
}
