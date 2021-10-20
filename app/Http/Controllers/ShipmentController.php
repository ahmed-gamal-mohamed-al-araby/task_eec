<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShipmentRequest;
use App\Models\Courier;
use App\Models\Product;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Str;
class ShipmentController extends Controller
{

    public function index(){
        $shipments = Shipment::with('couriers')->get();
        return view('shipment.index', compact('shipments'));
    }

    public function create(){
        $products = Product::all();
        $courier = Courier::all();
        return view('shipment.create', compact('products' , 'courier'));
    }

    public function store(ShipmentRequest  $request) {
        $data = $request->all();
        $data['shipment_number'] = Str::random(10);;
        Shipment::create($data);
        return redirect()->route('admin.shipments')->with(['success' => 'Shipment Add Successfully']);
    }
    public function edit($id) {
        $courier = Courier::all();
        $products = Product::all();
        $shipment = Shipment::find($id);
        return view('shipment.edit' , compact('shipment' , 'courier' , 'products'));
    }

    public function update( ShipmentRequest  $request ,  $id) {
        $shipment = Shipment::find($id);
        if(!$shipment)
            return redirect()->route('admin.shipments')->with(['success' => 'Shipment Not Found']);
        $data = $request->all();
        unset($data['_token']);
       Shipment::where('id',$id)->update($data);
        return redirect()->route('admin.shipments')->with(['success' => 'Shipment Updated Successfully']);
    }

    public function delete($id) {
        $shipment = Shipment::find($id);
        if(!$shipment)
            return redirect()->route('admin.shipments')->with(['success' => 'Shipment Not Found']);
        $shipment->delete();
        return redirect()->route('admin.shipments')->with(['success' => 'Shipment Deleted Successfully']);
    }

}
