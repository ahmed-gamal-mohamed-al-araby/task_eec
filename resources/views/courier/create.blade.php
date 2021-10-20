@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="mt-3">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                Add Courier
                            </h4>
                            <hr>
                            <form class="form" method="post" action="{{route('admin.store.couriers')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group m-t-40 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">
                                        Name:
                                    </label>
                                    <div class="col-md-10">
                                        <input class="form-control"  name="name" type="text"
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
                                        <input class="form-control"   name="email" type="email"
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
                                        <input class="form-control"  name="phone" type="text"
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
                                        <input class="form-control"  name="address" type="text"
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
