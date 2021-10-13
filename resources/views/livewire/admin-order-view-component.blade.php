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

              <div class="table-responsive">

              @if(Session::has("message"))
              <div class="alert alert-success">{{ Session::get("message") }}</div>
              @endif
              <table  class="table table-bordered table-striped " id="table">
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
                    <th>Action</th>
                    <th>Status</th>
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
                    <td><a href="{{ route('admin.order.details',['order_id'=>$order->id]) }}" class="btn btn-success">Details</a></td>

                    <td>
                    <div class="dropdown show">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Status
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="#" wire:click.prevent="updateOrder({{ $order->id }},'delivered')">Delivered</a>
    <a class="dropdown-item" href="#" wire:click.prevent="updateOrder({{ $order->id }},'canceled')">Canceled</a>
  </div>
</div>
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
                    <th>Action</th>
                    <th>Status</th>
                  </tr>
                  </tfoot>
                </table>
              </div>


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>



 


  
</div>

@push("script")
<script>

    $(function(){
         $("#table").DataTable();
    })
   
</script>
@endpush()