<div class="row" style="margin-top: 40px;">

    <style>
        input[type="text"] {
            border: 1px solid #e6e6e6;
            outline: none;
            width: 100%;
            height: 43 px;
            font-size: 13px;
            line-height: 19px;
            padding: 5px;
            color: #333333;
        }
    </style>
    <div class="col-md-8 col-md-offset-2 m-2">

        <div class="panel panel-danger">
            <!-- Default panel contents -->
            <div class="panel-heading">User Profile Edit Details</div>
            @if(session()->has("message"))
            <div class="alert alert-success">
                {{session()->get("message")}}
            </div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    
                    @if($newImage)
                    <img style="padding:20px;" src="{{$newImage->temporaryUrl()}}" alt="">
                    <input type="file" name="" id="" wire:model="newImage">
                    @elseif($profile->image)
                    <img style="padding:20px;" src="{{asset('assets/images/products/'.$profile->image)}}" alt="">
                    <input type="file" name="" id="" wire:model="newImage">
                    @else
                    <img style="padding:20px;" src="{{asset('assets/images/products/katy.jpg')}}" alt="">
                    <input type="file" name="" id="" wire:model="newImage">
                    @endif
                </div>
                <div class="col-md-6">
                    <div class="list-group " style="padding: 20px;">
                        <a href="#" class="list-group-item active">
                            Profile
                        </a>
                        <a href="#" class="list-group-item">
                            <label for="">name</label>
                            <input type="text" wire:model="name">
                        </a>

                        <a href="#" class="list-group-item">
                            <label for="">line1</label>
                            <input type="text" wire:model="line1">
                        </a>
                        <a href="#" class="list-group-item">
                            <label for="">line2</label>
                            <input type="text" name="" id="" wire:model="line2">
                        </a>
                        <a href="#" class="list-group-item">
                            <label for="">address</label>

                            <input type="text" name="" id="" wire:model="address">
                        </a>
                        <a href="#" class="list-group-item">
                            <label for="">mobile</label>

                            <input type="text" name="" id="" wire:model="mobile">
                        </a>
                        <a href="#" class="list-group-item">
                            <label for="">province</label>

                            <input type="text" name="" id="" wire:model="province">
                        </a>
                        <a href="#" class="list-group-item">
                            <label for="">country</label>

                            <input type="text" name="" id="" wire:model="country">
                        </a>
                    </div>

                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="#" class="btn btn-success btn-block" wire:click="update">Profile Update</a>
                </div>
            </div>


        </div>
    </div>
</div>