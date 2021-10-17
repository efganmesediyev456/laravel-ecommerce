<div>
 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin Cotact</h1>
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
                  
            


                <table  class="table table-bordered table-striped" >
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Comment</th>
                    <th>Created At</th>
                  </tr>
                  </thead>
                  <tbody>
                 
                            @foreach($contacts as $contact)
                                <tr>
                                    <td>
                                        {{$contact->id}}
                                    </td>
                                    <td>
                                        {{$contact->name}}
                                    </td>
                                    <td>
                                        {{$contact->email}}
                                    </td>
                                    <td>
                                        {{$contact->phone}}
                                    </td>
                                    <td>
                                        {{$contact->comment}}
                                    </td>
                                    <td>
                                        {{$contact->created_at->diffForHumans()}}
                                    </td>
                                </tr>
                            @endforeach
                 
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Comment</th>
                    <td>Created At</td>
                  </tr>
                  </tfoot>
                </table>
                <div style="padding:20px 0">
                    {{$contacts->links()}}
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