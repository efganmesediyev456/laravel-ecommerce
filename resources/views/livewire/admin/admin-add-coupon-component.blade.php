
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
            
              <div class="card-body" >
                  
                <form action="" wire:submit.prevent="save">
             
                
                <label for="">Code</label>
                <input class="form-control form-control-lg" name="code" type="text" placeholder="" wire:model="code">
                @error('code') <div class="alert alert-danger">{{$message}}</div>@enderror
                <br>
                <label for="">Type</label>
                
                <div class="form-group" wire:ignore>
                <select class="form-control select2"  style="width: 100%;" >
                    <option selected="selected" value="">Deyer Sec</option>
                    <option value="fixed">Fixed</option>
                    <option value="percent">Percent</option>
                  </select>
                </div>
                @error('type') <div class="alert alert-danger">{{$message}}</div>@enderror
                <br>
                <label for="">Value</label>
                <input class="form-control form-control-lg" type="value" placeholder="" wire:model="value">
                @error('value') <div class="alert alert-danger">{{$message}}</div>@enderror
                <br>
                <label for="">Cart Value</label>
                <input class="form-control form-control-lg" type="text" placeholder="" wire:model="cart_value">
            
                @error('cart_value') <div class="alert alert-danger">{{$message}}</div>@enderror
                <label for="">Expiry Date</label>
               
                <div class="input-group date" id="expiry_date" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#expiry_date" wire:model="expiry_date"/>
                                <div class="input-group-append" data-target="#expiry_date" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>

                @error('expiry_date') <div class="alert alert-danger">{{$message}}</div>@enderror
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
     $(function(){
        $('.select2').select2();
      
    $('.select2-selection--single').css("height","auto");

    $(".select2").on("change", function (e) { 
    var select_val = $(e.currentTarget).val();
    
    @this.set('type',select_val);
    });


    $('#expiry_date').datetimepicker({ 
      icons: { time: 'far fa-clock' } ,
      format:'YYYY-MM-DD',
      defaultDate: "{{ $expiry_date }}"
    });

    $("#expiry_date").on("change.datetimepicker", ({date}) => {
          @this.set('expiry_date',$("#expiry_date").find("input").val());
    })
     })
</script>
  @endpush

