@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="mt-3">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                Add Shipment
                            </h4>
                            <hr>
                            <form class="form" method="post" action="{{route('admin.store.shipments')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group m-t-40 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">
                                        Description:
                                    </label>
                                    <div class="col-md-10">
                                        <textarea name="description" id="" class="form-control"></textarea>
                                        @error('description')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="example-email-input"  class="col-md-2 col-form-label">
                                        Address: </label>
                                    <div class="col-md-10">
                                        <input class="form-control"  name="address" type="text"
                                               id="">
                                        @error('address')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-url-input" class="col-md-2 col-form-label">
                                        Courier :
                                    </label>
                                    <div class="col-md-10">
                                        <select class="form-control"  name="courier_id" id="">
                                            <option value="">Choose</option>
                                            @foreach($courier as $courier)
                                                <option value="{{$courier->id}}">{{$courier->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('courier_id')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-url-input" class="col-md-2 col-form-label">
                                        Products :
                                    </label>
                                    <div class="col-md-10">
                                        <select class="select2 m-b-10 select2-multiple" required name="products[]" style="width: 100%" multiple="multiple" data-placeholder="Choose">
                                            @foreach($products as $product)
                                                <option value="{{$product->id}}">{{$product->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('products.*')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-url-input" class="col-md-2 col-form-label">
                                        Status :
                                    </label>
                                    <div class="col-md-10">
                                        <select class="form-control"  name="status" id="">
                                            <option value="">Choose</option>
                                            <option value="pending">pending</option>
                                            <option value="picked bu courier">picked bu courier</option>
                                            <option value="out for delivery">out for delivery</option>
                                            <option value="delivered">delivered</option>
                                        </select>
                                        @error('status')
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
@section('scripts')
    <!-- ============================================================== -->
    <!-- Plugins for this page -->
    <!-- ============================================================== -->
    <!-- jQuery file upload -->

    <script src="{{ asset('/assets/plugins/dropify/dist/js/dropify.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            // Basic
            $('.dropify').dropify();

            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'Désolé, le fichier trop volumineux'
                }
            });

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function (event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function (event, element) {
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function (event, element) {
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function (e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });
    </script>
@endsection
