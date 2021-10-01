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

              <a type="button" href="{{ route('admin.add.slider') }}" class="btn btn-default">
                  Add Slider
              </a>

              @if(Session::has('message'))
              <div class="alert alert-success">{{ Session::get('message') }}</div>
              @endif

                <table  class="table table-bordered table-striped" >
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th>Price</th>
                    <th>Link</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Created_at</th>
                  </tr>
                  </thead>
                  <tbody>
                 
                            @foreach($sliders as $slider)
                                <tr>
                                    <td>
                                        {{$slider->id}}
                                    </td>
                                    <td>
                                        {{$slider->title}}
                                    </td>
                                    <td>
                                        {{$slider->subtitle}}
                                    </td>
                                    <td>
                                        {{$slider->price}}
                                    </td>
                                    <td>
                                        {{$slider->link}}
                                    </td>
                                    <td>
                                        <img src=" {{ asset('assets/images/products/') }}/{{$slider->image}}"  width="120"/>
                                    </td>
                                    <td>
                                        {{$slider->status==1 ? "Active" : "Inactive"}}
                                    </td>
                                    <td>
                                    <a type="button" class="btn btn-block btn-success btn-sm" href="{{ route('admin.edit.slider',['slider'=>$slider->link]) }}">Edit</a>
                                    <button type="button" class="btn btn-block btn-danger btn-sm" onclick="confirm('Eminsen silmek ucun?') || event.stopImmediatePropagation()" wire:click="deleteSlider({{ $slider->id }})">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                 
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th>Price</th>
                    <th>Link</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Created_at</th>
                  </tr>
                  </tfoot>
                </table>
               <div class="py-2 float-right">
               {{ $sliders->links() }}
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