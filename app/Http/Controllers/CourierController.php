<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourierRequest;
use App\Models\Courier;
use App\Models\Shipment;
use Illuminate\Http\Request;

class CourierController extends Controller
{

    public function index() {
        $couriers = Courier::all();
        return view('courier.index', compact('couriers'));
    }

    public function create() {
        return view('courier.create');
    }

    public function store(CourierRequest  $request) {
         $data = $request->all();
        unset($data['password_confirmation']);
        Courier::create($data);
        return redirect()->route('admin.couriers')->with(['success' => 'Courier Add Successfully']);
    }

    public function edit($id) {
        $courier = Courier::find($id);
        return view('courier.edit' , compact('courier'));
    }
    public function update( CourierRequest  $request , $id) {
        $data = $request->all();
        $courier = Courier::find($id);
        if(!$courier)
            return redirect()->route('admin.couriers')->with(['success' => 'Courier Not Found']);


        if(isset($request->password) || $request->password !== "")
            $data['password'] = bcrypt($request->password);
        else
            $data['password'] =  $courier->password;

        unset($data['password_confirmation']);
        unset($data['_token']);

        Courier::where('id' , $id)->update($data);
        return redirect()->route('admin.couriers')->with(['success' => 'Courier Updated Successfully']);
    }

    public function delete($id) {
        $courier = Courier::find($id);
        if(!$courier)
            return redirect()->route('admin.couriers')->with(['success' => 'Courier Not Found']);

        $shipment_courier = Shipment::where('courier_id', $id)->first();

        if($shipment_courier)
            return redirect()->route('admin.couriers')->with(['error' => 'You cannot delete it because it transfers commercial documents']);

        $courier->delete();
        return redirect()->route('admin.couriers')->with(['success' => 'Courier Deleted Successfully']);
    }
}
