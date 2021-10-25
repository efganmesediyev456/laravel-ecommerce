<div>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Admin Product Attribute</h1>
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


                                <a href="{{route('admin.product.attribute.value.add')}}" class="btn btn-danger">Product Attribute Added</a>
                                <div class="form-group m-2">


                                </div>

                                @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                                @endif



                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Product Attribute Name</th>
                                            <th>Product Name</th>
                                            <th>Values</th>
                                            <th>Created_at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($attributeValues as $attr)
                                        <tr>
                                            <td>
                                                {{$attr->id}}
                                            </td>

                                            <td>
                                                {{$attr->product->name}}
                                            </td>
                                            <td>
                                                {{$attr->attribute->name}}
                                            </td>
                                            <td>
                                                {{$attr->created_at}}
                                            </td>


                                            <td>
                                                <a type="button" class="btn btn-block btn-success btn-sm" href="{{route('admin.product.attribute.edit',['attribute'=>$attr->id])}}">Edit</a>
                                                <a type="button" onclick="confirm('Eminsen silmek ucun?') || event.stopImmediatePropagation()" class="btn btn-block btn-danger btn-sm" wire:click="deleteProduct({{ $attr->id }})">Delete Attribute</button>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        <th>Id</th>
                                            <th>Product Attribute Name</th>
                                            <th>Product Name</th>
                                            <th>Values</th>
                                            <th>Created_at</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="py-2 float-right">
                                    {{ $attributeValues->links() }}
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