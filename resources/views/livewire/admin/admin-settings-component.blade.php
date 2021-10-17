
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
          <div class="col-md-8 offset-md-2">
            <!-- Form Element sizes -->
            <div class="card card-success">
              
            
              <div class="card-body" >
                  
              @if(Session::has("message"))
              <div class="alert alert-success">
                  {{Session::get("message")}}
              </div>
              @endif
                <form action="" wire:submit.prevent="saveSetting">
             
                
                <label for="">Email</label>
                <input class="form-control form-control-lg" name="code" type="text" placeholder="" wire:model="email">
                @error('email') <div class="alert alert-danger">{{$message}}</div>@enderror
                <br>
                
                
               
                <br>
                <label for="">Phone1</label>
                <input class="form-control form-control-lg" type="value" placeholder="" wire:model="phone1">
                @error('phone1') <div class="alert alert-danger">{{$message}}</div>@enderror
                <br>
                <label for="">Phone2</label>
                <input class="form-control form-control-lg" type="text" placeholder="" wire:model="phone2">
                @error('phone2') <div class="alert alert-danger">{{$message}}</div>@enderror

                

                <br>
                <label for="">Address</label>
                <input class="form-control form-control-lg" type="text" placeholder="" wire:model="address">
                @error('address') <div class="alert alert-danger">{{$message}}</div>@enderror

                <br>
                <label for="">Map</label>
                <input class="form-control form-control-lg" type="text" placeholder="" wire:model="map">
                @error('map') <div class="alert alert-danger">{{$message}}</div>@enderror

                <br>
                <label for="">Twitter</label>
                <input class="form-control form-control-lg" type="text" placeholder="" wire:model="twitter">
                @error('twitter') <div class="alert alert-danger">{{$message}}</div>@enderror

                <br>
                <label for="">Facebook</label>
                <input class="form-control form-control-lg" type="text" placeholder="" wire:model="facebook">
                @error('facebook') <div class="alert alert-danger">{{$message}}</div>@enderror

                <br>
                <label for="">Pinterest</label>
                <input class="form-control form-control-lg" type="text" placeholder="" wire:model="pinterest">
                @error('pinterest') <div class="alert alert-danger">{{$message}}</div>@enderror

                <br>
                <label for="">Instagram</label>
                <input class="form-control form-control-lg" type="text" placeholder="" wire:model="instagram">
                @error('instagram') <div class="alert alert-danger">{{$message}}</div>@enderror

                <br>
                <label for="">Youtube</label>
                <input class="form-control form-control-lg" type="text" placeholder="" wire:model="youtube">
                @error('youtube') <div class="alert alert-danger">{{$message}}</div>@enderror
               
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




