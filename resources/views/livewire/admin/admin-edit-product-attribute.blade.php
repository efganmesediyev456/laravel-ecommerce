<div>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Admin Product Attribute Add</h1>
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
        <section class="content">
            @if(Session::has("message"))
            <div class="alert alert-success">
                {{Session::get("message")}}
            </div>
            @endif
            <form >
                <div class="modal-body">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Doldur</h3>
                            <a href="{{route('admin.product.attribute')}}" class="btn btn-danger">Butun Productlar </a>
                        </div>
                        <div class="card-body">

                            <input class="form-control form-control-lg" type="text" placeholder="name" name="name" wire:model="name">
                            <br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" wire:click.prevent="guncelle">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>