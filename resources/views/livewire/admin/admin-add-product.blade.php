<div>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Admin Product</h1>
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
            <form wire:submit.prevent="submit" method="POST">
                <div class="modal-body">

                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Doldur</h3>
                            <a href="{{route('admin.product')}}" class="btn btn-danger">Butun Productlar </a>
                        </div>
                        <div class="card-body">
                            <input class="form-control form-control-lg" type="text" placeholder="name" name="name" wire:model="name" wire:keyup="generateSlug">
                            <br>
                            <input class="form-control form-control-lg" type="text" placeholder="slug" name="slug" wire:model="slug">
                            <br>
                            <input class="form-control form-control-lg" type="text" placeholder="short_description" name="short_description" wire:model="short_description">
                            <br>
                            <textarea class="form-control form-control-lg" type="text" name="description" wire:model="description" value="Description"></textarea>
                            <br>
                            <input class="form-control form-control-lg" type="number" placeholder="regular_price" name="regular_price" wire:model="regular_price">
                            <br>
                            <input class="form-control form-control-lg" type="number" placeholder="sale_price" name="sale_price" wire:model="sale_price">
                            <br>
                            <input class="form-control form-control-lg" type="text" placeholder="SKU" name="SKU" wire:model="SKU">
                            <br>
                            <input class="form-control form-control-lg" type="number" placeholder="quantity" name="quantity" wire:model="quantity">
                            <br>
                            <select class="form-control" wire:model="category_id">
                                @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                            <br>
                            <select class="form-control" wire:model="stock_status">
                                <option value="instock">instock</option>
                                <option value="outofstock">outofstock</option>
                            </select>
                            <br>
                            <input type="file" wire:model="image" class="input-file">
                            @if($image)
                            <img src="{{$image->temporaryUrl()}}" style="width:30%">
                            @endif

                            <br>
                            <label for="">Images</label>
                            <input type="file" wire:model="images" class="input-file" multiple>
                            @if($images)
                            <div class="d-flex">
                                @foreach($images as $image)
                                <img class="p-2" src="{{$image->temporaryUrl()}}" style="width:15%">
                                @endforeach
                            </div>

                            @endif

                            <div class="row">
                                <div class="col-md-4">
                                    Product Attribute
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="product_attribute">
                                        @foreach($product_attributess as $product_attribute)
                                        <option value="{{$product_attribute->id}}">{{$product_attribute->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <a class="btn btn-success" wire:click.prevent="add">Add</a>
                                </div>

                            </div>

                            @if(count($product_attributes)>0)
                            <br>
                            <div class="row">
                                @foreach($product_attributes as $product_attribute)
                                <div class="col-md-6">
                                <label>{{$product_attributess->where('id',$product_attribute)->first()->name}}</label>
                                </div>
                                <br><br>
                                <div class="col-md-6">
                                <input wire:model="product_attribute_values.{{$product_attributess->where('id',$product_attribute)->first()->id}}" class="form-control" type="text">
                                </div>
                                
                              
                                @endforeach
                            </div>
                            <br>
                            @endif



                            <div class="form-group">

                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>

                        </div>
                        <!-- /.card-body -->

                    </div>

                </div>

            </form>
        </section>



    </div>








</div>