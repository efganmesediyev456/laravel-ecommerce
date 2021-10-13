<div>
        
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Admin Order View</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">DataTables</li>
                    </ol>
                </div>
                </div>
            </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="col-12">
                
                    <!-- /.card -->

                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DataTable with default features</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                                    <div class="row">
                                        <div class="col-5 col-sm-3">
                                            <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link active" id="order-items-tab" data-toggle="pill" href="#order-items" role="tab" aria-controls="order-items" aria-selected="true">Order Items</a>
                                            <a class="nav-link" id="shippings-tab" data-toggle="pill" href="#shippings" role="tab" aria-controls="shippings" aria-selected="false">Shippings</a>
                                            <a class="nav-link" id="transaction-tab" data-toggle="pill" href="#transaction" role="tab" aria-controls="transaction" aria-selected="false">Transaction</a>
                                            </div>
                                        </div>
                                        <div class="col-7 col-sm-9">
                                            <div class="tab-content" id="vert-tabs-tabContent">
                                                    <div class="tab-pane text-left fade show active" id="order-items" role="tabpanel" aria-labelledby="order-items-tab">
                                                       <div class="table-responsive">
                                                       <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            Id
                                                                        </th>
                                                                        <th>
                                                                            Image
                                                                        </th>
                                                                        <th>
                                                                            Product Name
                                                                        </th>
                                                                        <th>
                                                                            Short Description 
                                                                        </th>
                                                                        <th>
                                                                            Description
                                                                        </th>
                                                                        <th>
                                                                            Regular Price
                                                                        </th>
                                                                        <th>
                                                                            Sale Price
                                                                        </th>
                                                                        <th>
                                                                            Sku
                                                                        </th>
                                                                        <th>
                                                                            Stock status
                                                                        </th>
                                                                        <th>
                                                                            featured
                                                                        </th>
                                                                        <th>
                                                                            quantity
                                                                        </th>
                                                                        <th>
                                                                            Order Id
                                                                        </th>
                                                                        <th>
                                                                            Price
                                                                        </th>
                                                                        <th>
                                                                            Quantity
                                                                        </th>
                                                                        
                                                                        <th>
                                                                            Created At
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                        @foreach($order->order_items as $ord)
                                                                            <tr>
                                                                                <td>
                                                                                    {{$ord->id}}
                                                                                </td>
                                                                                <td>
                                                                                <img  src="{{ asset('assets/images/products') }}/{{$ord->product->image}}"/>
                                
                                                                                </td>
                                                                                    <td>
                                                                                        {{$ord->product->name}}
                                                                                    </td>
                                                                                    <td>
                                                                                    {{ \Illuminate\Support\Str::limit($ord->product->short_description, 50, $end='...') }}
                                                                                    
                                                                                     </td>
                                                                                  <td>
                                                                                  {{ \Illuminate\Support\Str::limit($ord->product->description, 50, $end='...') }}
                                                                                  </td>
                                                                                  <td>
                                                                                      {{$ord->product->regular_price}}
                                                                                  </td>
                                                                                  <td>
                                                                                      {{$ord->product->sale_price}}
                                                                                  </td>
                                                                                  <td>
                                                                                      {{$ord->product->SKU}}
                                                                                  </td>
                                                                                  <td>
                                                                                      {{$ord->product->stock_status}}
                                                                                  </td>
                                                                                  <td>
                                                                                      {{$ord->product->featured}}
                                                                                  </td>
                                                                                  <td>
                                                                                      {{$ord->order_id}}
                                                                                  </td>
                                                                                  <td>
                                                                                      {{$ord->price}}
                                                                                  </td>
                                                                                  <td>
                                                                                      {{$ord->quantity}}
                                                                                  </td>
                                                                                  <td>
                                                                                      {{$ord->created_at}}
                                                                                  </td>
                                                                                  
                                                                            </tr>
                                                                        @endforeach
                                                                </tbody>
                                                                <tfoot>
                                                                <tr>
                                                                        <th>
                                                                            Id
                                                                        </th>
                                                                        <th>
                                                                            Image
                                                                        </th>
                                                                        <th>
                                                                            Product Name
                                                                        </th>
                                                                        <th>
                                                                            Short Description 
                                                                        </th>
                                                                        <th>
                                                                            Description
                                                                        </th>
                                                                        <th>
                                                                            Regular Price
                                                                        </th>
                                                                        <th>
                                                                            Sale Price
                                                                        </th>
                                                                        <th>
                                                                            Sku
                                                                        </th>
                                                                        <th>
                                                                            Stock status
                                                                        </th>
                                                                        <th>
                                                                            featured
                                                                        </th>
                                                                        <th>
                                                                            quantity
                                                                        </th>
                                                                        <th>
                                                                            Order Id
                                                                        </th>
                                                                        <th>
                                                                            Price
                                                                        </th>
                                                                        <th>
                                                                            Quantity
                                                                        </th>
                                                                        
                                                                        <th>
                                                                            Created At
                                                                        </th>
                                                                    </tr>
                                                                </tfoot>
                                                        </table>
                                                       </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="shippings" role="tabpanel" aria-labelledby="shippings-tab">
                                                                <div class="card ">
                                                                            <div class="card-header">
                                                                                Featured
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <div>
                                                                                <p class="float-left">Subtotal</p>
                                                                                <p class="float-right">{{ $order->subtotal }}</p>
                                                                                </div>
                                                                                <div class="clearfix"></div>
                                                                                <div>
                                                                                <p class="float-left">Tax</p>
                                                                                <p class="float-right">{{ $order->tax }}</p>
                                                                                </div>
                                                                                <div class="clearfix"></div>
                                                                                <div>
                                                                                @if($order->is_shipping_different)
                                                                                <p class="float-left">Sipping</p>
                                                                                <p class="float-right">Free Shipping</p>
                                                                                @endif
                                                                                </div>
                                                                                <div class="clearfix"></div>
                                                                                <div>
                                                                                <p class="float-left">Total</p>
                                                                                <p class="float-right">{{ $order->total }}</p>
                                                                                </div>
                                                                                <div class="clearfix"></div>
                                                                                <div>
                                                                                <p class="float-left">Name</p>
                                                                                <p class="float-right">{{ $order->shipping->firstname }}</p>
                                                                                </div>

                                                                                <div class="clearfix"></div>
                                                                                <div>
                                                                                <p class="float-left">Lastname</p>
                                                                                <p class="float-right">{{ $order->shipping->lastname }}</p>
                                                                                </div>

                                                                                <div class="clearfix"></div>
                                                                                <div>
                                                                                <p class="float-left">Mobile</p>
                                                                                <p class="float-right">{{ $order->shipping->mobile }}</p>
                                                                                </div>

                                                                                <div class="clearfix"></div>
                                                                                <div>
                                                                                <p class="float-left">Email</p>
                                                                                <p class="float-right">{{ $order->shipping->email }}</p>
                                                                                </div>
                                                                                
                                                                                <div class="clearfix"></div>
                                                                                <div>
                                                                                <p class="float-left">Line1</p>
                                                                                <p class="float-right">{{ $order->shipping->line1 }}</p>
                                                                                </div>

                                                                                <div class="clearfix"></div>
                                                                                <div>
                                                                                <p class="float-left">Line2</p>
                                                                                <p class="float-right">{{ $order->shipping->line2 }}</p>
                                                                                </div>

                                                                                <div class="clearfix"></div>
                                                                                <div>
                                                                                <p class="float-left">City</p>
                                                                                <p class="float-right">{{ $order->shipping->city }}</p>
                                                                                </div>

                                                                                <div class="clearfix"></div>
                                                                                <div>
                                                                                <p class="float-left">Province</p>
                                                                                <p class="float-right">{{ $order->shipping->province }}</p>
                                                                                </div>

                                                                                <div class="clearfix"></div>
                                                                                <div>
                                                                                <p class="float-left">Country</p>
                                                                                <p class="float-right">{{ $order->shipping->country }}</p>
                                                                                </div>

                                                                                <div class="clearfix"></div>
                                                                                <div>
                                                                                <p class="float-left">Zipcode</p>
                                                                                <p class="float-right">{{ $order->shipping->zipcode }}</p>
                                                                                </div>

                                                                                <div class="clearfix"></div>
                                                                                <div>
                                                                                <p class="float-left">Created at</p>
                                                                                <p class="float-right">{{ $order->shipping->created_at }}</p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="card-footer text-muted">
                                                                            {{ $order->shipping->created_at->diffForHumans() }}
                                                                            </div>
                                                                </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="transaction" role="tabpanel" aria-labelledby="transaction-tab">
                                                    
                                                    <div class="card ">
                                                                            <div class="card-header">
                                                                                Featured
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <div>
                                                                                <p class="float-left">Mode</p>
                                                                                <p class="float-right">{{ $order->transaction->mode }}</p>
                                                                                </div>
                                                                                <div class="clearfix"></div>
                                                                                <div>
                                                                                <p class="float-left">Status</p>
                                                                                <p class="float-right">{{ $order->transaction->status }}</p>
                                                                                </div>
                                                                                <div class="clearfix"></div>
                                                                                <div>
                                                                                <p class="float-left">Created At</p>
                                                                                <p class="float-right">{{ $order->created_at }}</p>
                                                                                </div>
                                                                                

                                                                               
                                                                               
                                                                            </div>
                                                                            <div class="card-footer text-muted">
                                                                            {{ $order->transaction->created_at->diffForHumans() }}
                                                                            </div>
                                                                </div>

                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </section>
        </div>
</div>