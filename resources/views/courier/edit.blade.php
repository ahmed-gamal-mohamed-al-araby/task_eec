@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="mt-3">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                Edit Courier
                            </h4>
                            <hr>
                            <form class="form" method="post" action="{{route('admin.update.couriers',$courier->id)}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$courier->id}}">
                                <div class="form-group m-t-40 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">
                                        Name:
                                    </label>
                                    <div class="col-md-10">
                                        <input class="form-control" value="{{$courier->name}}"  name="name" type="text"
                                               id="">
                                        @error('name')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="example-email-input"  class="col-md-2 col-form-label">
                                        Email: </label>
                                    <div class="col-md-10">
                                        <input class="form-control" value="{{$courier->email}}"  name="email" type="email"
                                               id="">
                                        @error('email')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-url-input" class="col-md-2 col-form-label">
                                        Phone :
                                    </label>
                                    <div class="col-md-10">
                                        <input class="form-control" value="{{$courier->phone}}"  name="phone" type="text"
                                               id="">
                                        @error('phone')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-tel-input" class="col-md-2 col-form-label">
                                        Password
                                    </label>
                                    <div class="col-md-10">
                                        <input class="form-control" name="password" type="password" autocomplete="new-password"
                                               id="">
                                        @error('password')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-tel-input" class="col-md-2 col-form-label">
                                        Password Confirmation
                                    </label>
                                    <div class="col-md-10">
                                        <input class="form-control" name="password_confirmation" type="password"
                                               id="">
                                        @error('password_confirmation')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group m-t-40 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">
                                        Address:
                                    </label>
                                    <div class="col-md-10">
                                        <input class="form-control" value="{{$courier->address}}"  name="address" type="text"
                                               id="">
                                        @error('address')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success">
                                        Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </div>
@endsection
