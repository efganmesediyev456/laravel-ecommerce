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
              @if(session()->has('message'))
              <div class="alert alert-success">{{ session('message') }}</div>
              @endif

              <div class="row" >
             
                <div class="col-md-6 m-auto" >
                
            <form action="" wire:submit.prevent="save" >
             
              
              <div wire:ignore>

                        <label for="" class="form-label">Categories</label>
                        <div class="select2-purple" >
                              <select   wire:model="categories" class="select2" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;">
                        @foreach($categories_list as $c)
                        <option  value="{{ $c->id }}" @if(in_array($c->id,$categories)) selected @endif>{{ $c->name }}</option>
                        @endforeach
                              </select>
                        </div>

              </div>
              
              <div class="form-group">
                  <label for="">Length</label>
                  <input type="number" name="length" wire:model="length" class="form-control">
                
              </div>
              
              <div class="form-group">
              <input type="submit" value="aubmit" class="btn btn-primary">
              </div>
             </form>
               
                </div>
              </div>
            
               <div class="py-2 float-right">
              
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

@push('script')

<script>
  $(document).ready(function() {
    $('.select2').select2()

    $(".select2").on("change", function (e) { 
  var select_val = $(e.currentTarget).val();
  @this.set('categories',select_val);
});
   
});

</script>

@endpush