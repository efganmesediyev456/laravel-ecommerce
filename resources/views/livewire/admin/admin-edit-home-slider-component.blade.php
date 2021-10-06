<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
         
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-12">
            <!-- Form Element sizes -->
            <div class="card card-success">
              <div class="card-header">
                <a href="{{ route('admin.slider') }}" class="btn btn-warning float-right">All Sliders</a>
              </div>
              <div class="card-body">
                  @if(session()->has('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                  @endif
                <form action="" wire:submit.prevent="save">
                <label for="">Title</label>
                <input class="form-control form-control-lg" id="editor" type="text" placeholder="" wire:model="title">
                <br>
                <label for="">Subtitle</label>
                <input class="form-control form-control-lg" type="text" placeholder="" wire:model="subtitle">
                <br>
                <label for="">Price</label>
                <input class="form-control form-control-lg" type="text" placeholder="" wire:model="price">
                <br>
                <label for="">Link</label>
                <input class="form-control form-control-lg" type="text" placeholder="" wire:model="link">
                <br>
                <label for="">Image</label>
                <img src="{{ asset('assets/images/products') }}/{{ $image }}" width="120"/>
                <input class="form-control form-control-lg" type="file" placeholder="" wire:model="image">
               
                <br>
                <label for="">Status</label>
                <select name="" wire:model="status" id="" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
                <br>
                <input class="btn btn-success" type="submit" value="submit" />
                </form>
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

           
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>



  @push("script")

  <script>
    $('#editor').summernote(

    {
      height: 450,
      callbacks: {
    onChange: function(contents, $editable) {
        @this.set('title',contents);
      
    },
    onImageUpload: function(image) {
            uploadImage(image[0]);
        }
  }

    }
    )


  </script>
  @endpush