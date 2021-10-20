@if ($shipment)


    <div class="row">
        <div class="col-12">
            <div class="table-responsive ">
                <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Description</th>
                        <th>Address</th>
                        <th>Courier</th>
                        <th>Products</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$shipment->description}}</td>
                            <td>
                                {{$shipment->address}}
                            </td>
                            <td>
                                {{$shipment->couriers->name}}
                            </td>
                            <td>
                                <ul class="list-unstyled">
                                @foreach($shipment->products as $pro)
                                    @php
                                        $products = \App\Models\Product::where('id',$pro)->get();
                                    @endphp
                                    @foreach($products as $index => $product)

                                        <li>
                                            {{$product->name}}
                                        </li>
                                    @endforeach
                                @endforeach
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@else
    <div class="alert alert-danger">Shipment Not Found</div>
@endif


