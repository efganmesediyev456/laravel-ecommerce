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

              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                  Launch Default Modal
                </button>

    

                <table  class="table table-bordered table-striped" >
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                 
                            @foreach($categories as $cat)
                                <tr>
                                    <td>
                                        {{$cat->id}}
                                    </td>
                                    <td>
                                        {{$cat->name}}
                                    </td>
                                    <td>
                                        {{$cat->slug}}
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-block btn-success btn-sm" wire:click="editCategory({{ $cat }})">Edit</button>
                                    <button type="button" class="btn btn-block btn-danger btn-sm" wire:click="deleteCategory({{ $cat->id }})">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                 
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Id</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
               <div class="py-2 float-right">
               {{ $categories->links() }}
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

  @if(Session::has('message'))
              <div class="alert alert-success">{{ Session::get('message') }}</div>
  @endif

                

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
                
                <input class="form-control form-control-lg" type="text" placeholder="name" name="name" wire:model.defer="name" wire:keyup="generateSlug">
                @error('name')  <div class="alert alert-danger">{{ $message }}</div>  @enderror
                <br>
                <input class="form-control form-control-lg" type="text" placeholder="slug" name="slug" wire:model.defer="slug" >
                @error('slug')  <div class="alert alert-danger">{{ $message }}</div>  @enderror
                <br>
                
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