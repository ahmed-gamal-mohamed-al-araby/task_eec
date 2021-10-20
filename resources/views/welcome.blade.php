<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .product_class li {
                display: inline-block;
            }
        </style>
    </head>
    <body>
        <div class="flex-center mt-5 ">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="">
                    <h3>To get the shipment information</h3>
                    <form action="">
                        <div class="form-group">
                            <label for="">Shipment Number</label>
                            <input type="text" class="form-control mb-2" name="shipment_number" id="shipment_id">
                            <button class="btn btn-sm btn-primary" id="getData">Get Data</button>
                        </div>
                    </form>
                </div>
        </div>
            <div class="container">
                <div id="getShipment">

                </div>
            </div>


        <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap popper Core JavaScript -->
        <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

        <script>
            jQuery(document).ready(function () {
                $('#getData').click(function (e) {
                    e.preventDefault();
                   var shipment_number = $('#shipment_id').val();
                    $.ajax({
                        method: "get",
                        url: "{{route('get_shipment')}}",
                        data: { shipment_number: shipment_number}
                    })
                        .done(function( data ) {
                            console.log(data);

                            $('#getShipment').html(data);
                        });
                });
            });

        </script>

    </body>
</html>
