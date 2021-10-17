          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                  </div><!-- /.col -->
                </div><!-- /.row -->
              </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
              <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h3>{{$totalSales}}</h3>

                        <p>Umumi satislarin sayi</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-bag"></i>
                      </div>
                      <a href="{{route('admin.order')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                      <div class="inner">
                        <h3>{{$totalRevenue}}$</h3>

                        <p>Umumi qazanc (butun satislardan)</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                      </div>
                      <a href="{{route('admin.order')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                      <div class="inner">
                        <h3>{{$todaySales}}</h3>

                        <p>Bu gun edilen satislarin sayi</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-person-add"></i>
                      </div>
                      <a href="{{route('admin.order')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->

                 <div class="table-responsive">
                 <table class="table table-bordered table-striped " id="table">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>User</th>
                        <th>Subtotal</th>
                        <th>Discount</th>
                        <th>Tax</th>
                        <th>Total</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Line1</th>
                        <th>Line2</th>
                        <th>City</th>
                        <th>Province</th>
                        <th>Country</th>
                        <th>Zipcode</th>
                        <th>Status</th>
                        <th>Is Shipping Different</th>
                        <th>Created At</th>
                        
                      </tr>
                    </thead>
                    <tbody>

                      @foreach($orders as $order)
                      <tr>
                        <td>
                          {{$order->id}}
                        </td>
                        <td>
                          {{ $order->user->name }}
                        </td>
                        <td>
                          {{$order->subtotal}}
                        </td>
                        <td>
                          {{$order->discount}}
                        </td>
                        <td>
                          {{$order->tax}}
                        </td>

                        <td>
                          {{$order->total}}
                        </td>
                        <td>
                          {{$order->firstname}}
                        </td>
                        <td>
                          {{$order->lastname}}
                        </td>
                        <td>
                          {{$order->mobile}}
                        </td>
                        <td>
                          {{$order->email}}
                        </td>
                        <td>
                          {{$order->line1}}
                        </td>
                        <td>
                          {{$order->line2}}
                        </td>
                        <td>
                          {{$order->city}}
                        </td>
                        <td>
                          {{$order->province}}
                        </td>
                        <td>
                          {{$order->country}}
                        </td>
                        <td>
                          {{$order->zipcode}}
                        </td>
                        <td>
                          {{$order->status}}
                        </td>
                        <td>
                          {{$order->is_shipping_different}}
                        </td>
                        <td>
                          {{$order->created_at}}
                        </td>
                       

                      </tr>
                      @endforeach

                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Id</th>
                        <th>User</th>
                        <th>Subtotal</th>
                        <th>Discount</th>
                        <th>Tax</th>
                        <th>Total</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Line1</th>
                        <th>Line2</th>
                        <th>City</th>
                        <th>Province</th>
                        <th>Country</th>
                        <th>Zipcode</th>
                        <th>Status</th>
                        <th>Is Shipping Different</th>
                        <th>Created At</th>
                      </tr>
                    </tfoot>
                  </table>
                 </div>

                  <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">

                </div>
                <!-- /.row (main row) -->
              </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->

          </div>