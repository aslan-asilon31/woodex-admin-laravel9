<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shipment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        Alert::success('Sukses', 'Data Berhasil Ditambahkan');
        return redirect('/settings');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function show(Shipment $shipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipment $shipment)
    {
        return view('shipment.edit', [
            'shipment' => $shipment
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shipment $shipment)
    {
        $rules = [
            'name'            => 'required|min:3',
            'phone_number'    => 'required|min:11|max:13',
            'address'         => 'required|min:20'
        ];

        $validateData = $request->validate($rules);

        Shipment::where('id', $shipment->id)
            ->update($validateData);

        Alert::success('Sukses', 'Data Berhasil Diperbarui');
        return redirect('/settings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shipment  $shipment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shipment = Shipment::where('id', $id)->first();

        $shipment->delete();

        Alert::success('Sukses', 'Alamat Berhasil Dihapus');
        return redirect('/settings');
    }
}
