<div>
 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin Product</h1>
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

              <button wire:click="addModal()" type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                  Launch Default Modal
                </button>

            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

              

                <table  class="table table-bordered table-striped" >
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Sale Price</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                 
                            @foreach($products as $pro)
                                <tr>
                                    <td>
                                        {{$pro->id}}
                                    </td>
                                    <td>
                                        <img style="width:15%" src="{{ asset('assets/images/products') }}/{{$pro->image}}"/>
                                    </td>
                                    <td>
                                        {{$pro->name}}
                                    </td>
                                    <td>
                                        {{$pro->sale_price}}
                                    </td>
                                    <td>
                                        {{$pro->stock_status}}
                                    </td>
                                    <td>
                                        {{$pro->regular_price}}
                                    </td>
                                    <td>
                                        {{$pro->category->name}}
                                    </td>
                                    <td>
                                        {{$pro->created_at}}
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-block btn-success btn-sm" wire:click="editCategory({{ $pro }})">Edit</button>
                                    <button type="button" onclick="confirm('Eminsen silmek ucun?') || event.stopImmediatePropagation()" class="btn btn-block btn-danger btn-sm" wire:click="deleteProduct({{ $pro->id }})">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Sale Price</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
               <div class="py-2 float-right">
               {{ $products->links() }}
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


 

  <div class="modal fade" id="modal-default" wire:ignore>
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <h4 class="modal-title">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

           

            <form wire:submit.prevent="submit" method="POST">
            <div class="modal-body">
              
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Doldur</h3>
              </div>
              <div class="card-body">
                <input class="form-control form-control-lg" type="text" placeholder="name" name="name" wire:model="name" wire:keyup="generateSlug">
                <br>
                <input class="form-control form-control-lg" type="text" placeholder="slug" name="slug" wire:model="slug" >
                <br>
                <input class="form-control form-control-lg" type="text" placeholder="short_description" name="short_description" wire:model="short_description" >
                <br>
                <textarea class="form-control form-control-lg" type="text"  name="description" wire:model="description" value="Description"></textarea>
                <br>
                <input class="form-control form-control-lg" type="number" placeholder="regular_price" name="regular_price" wire:model="regular_price">
                <br>
                <input class="form-control form-control-lg" type="number" placeholder="sale_price" name="sale_price" wire:model="sale_price" >
                <br>
                <input class="form-control form-control-lg" type="text" placeholder="SKU" name="SKU" wire:model="SKU">
                <br>
                <input class="form-control form-control-lg" type="number" placeholder="quantity" name="quantity" wire:model="quantity">
                <br>
                <select class="form-control" wire:model="category_id">
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
                <br>
                <select class="form-control" wire:model="stock_status">
                        <option value="instock">instock</option>
                        <option value="outofstock">outofstock</option>
                </select>
                <br>
                <input type="file" wire:model="image" class="input-file">
                
                <br>
                <label for="">Images</label>
                <input type="file" wire:model="images" class="input-file" multiple>


               
 
                
              </div>
              <!-- /.card-body -->
            </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" >Save changes</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
  </div>


  
</div>