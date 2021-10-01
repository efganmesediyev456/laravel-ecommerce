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
                
                    <form action="" wire:submit.prevent="save">
                       
                        <div class="form-group ">
                            <label for="">Status</label>
                            <select name="" id="" wire:model="status" class="form-control">
                                <option value="0" @if($status==0) selected @endif>Inactive</option>
                                <option value="1"@if($status==1) selected @endif>Active</option>
                            </select>
                        </div>

                        <div class="form-group" wire:ignore>
                          <label>Date and time:</label> 
                            <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime" wire:model="date"/>
                                <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                          <input type="submit" class="btn btn-primary" value="save">
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

    $('#reservationdatetime').datetimepicker({ 
      icons: { time: 'far fa-clock' } ,
      format:'YYYY-MM-DD HH:mm:ss',
      defaultDate: '{{ $date }}'
    });

    $("#reservationdatetime").on("change.datetimepicker", ({date}) => {
          @this.set('date',$("#reservationdatetime").find("input").val());
    })

   
});

</script>

@endpush