@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="mt-3">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a id="add-option" class=" mb-2 btn btn-success" href="{{route('admin.create.products')}}">
                                Add Product
                            </a>
                            @include('alerts.success')
                            @include('alerts.danger')
                            <div class="table-responsive ">
                                <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{$product->name}}</td>
                                           <td>
                                               <img src="{{$product->image}}" class="img-fluid" style="border-radius: 15px; width: 80px;
height: 80px" alt="">
                                           </td>
                                            <td>
                                                <a id="" class="btn btn-success" href="{{route('admin.edit.products',$product->id)}}">
                                                    Edit
                                                </a>
                                                <a id="" class="btn btn-danger"  onclick="return confirm('هل متاكد من حذف هذا')" href="{{route('admin.delete.products',$product->id)}}">
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
