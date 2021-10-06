<div>
 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin Category</h1>
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
                  
              <div class="float-right">
                <a href="{{ route('coupon.create') }}" class="btn btn-primary">Coupon Create</a>
              </div>

  @if(Session::has('message'))
              <div class="alert alert-success">{{ Session::get('message') }}</div>
  @endif

                <table  class="table table-bordered table-striped" >
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Code</th>
                    <th>Type</th>
                    <th>Value</th>
                    <th>Cart Value</th>
                    <th>Expiry Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                 
                            @foreach($coupons as $coupon)
                                <tr>
                                    <td>
                                        {{$coupon->id}}
                                    </td>
                                    <td>
                                        {{$coupon->code}}
                                    </td>
                                    <td>
                                        {{$coupon->type}}
                                    </td>
                                    <td>
                                        {{$coupon->value}}
                                    </td>
                                    <td>
                                        {{$coupon->cart_value}}
                                    </td>
                                    <td>
                                        {{$coupon->expiry_date}}
                                    </td>
                                    <td>
                                       
                                    <a type="button" class="btn btn-block btn-success btn-sm" href="{{ route('coupon.edit',['id'=>$coupon->id]) }}">Edit</a>
                                    <button type="button" onclick="confirm('Eminsen silmek ucun?') || event.stopImmediatePropagation()" class="btn btn-block btn-danger btn-sm" wire:click="deleteCoupon({{ $coupon->id }})">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Id</th>
                    <th>Code</th>
                    <th>Type</th>
                    <th>Value</th>
                    <th>Cart Value</th>
                    <th>Expiry Date</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
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