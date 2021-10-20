@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="mt-3">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a id="add-option" class=" mb-2 btn btn-success" href="{{route('admin.create.shipments')}}">
                                Add Shipment
                            </a>
                            @include('alerts.success')
                            @include('alerts.danger')
                            <div class="table-responsive ">
                                <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Description</th>
                                        <th>Address</th>
                                        <th>Courier</th>
                                        <th>Status</th>
                                        <th>Shipment_Number</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($shipments as $shipment)
                                        <tr>
                                            <td>{{$shipment->description}}</td>
                                            <td>
                                                {{$shipment->address}}
                                            </td>
                                            <td>{{$shipment->couriers->name}}</td>
                                            <td> {{$shipment->status}}</td>
                                            <td> {{$shipment->shipment_number}}</td>
                                            <td>
                                                <a id="" class="btn btn-success" href="{{route('admin.edit.shipments',$shipment->id)}}">
                                                    Edit
                                                </a>
                                                <a id="" class="btn btn-danger"  onclick="return confirm('هل متاكد من حذف هذا')" href="{{route('admin.delete.shipments',$shipment->id)}}">
                                                   Delete
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
