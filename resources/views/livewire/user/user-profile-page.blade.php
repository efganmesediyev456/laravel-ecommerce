<div class="row" style="margin-top: 40px;">
    <div class="col-md-8 col-md-offset-2 m-2">

        <div class="panel panel-danger">
            <!-- Default panel contents -->
            <div class="panel-heading">User Profile Details</div>
            <div class="row">
                <div class="col-md-6">
                    @if($profile->image)
                    <img style="padding:20px;" src="{{asset('assets/images/products/'.$profile->image)}}" alt="">
                    @else
                    <img style="padding:20px;" src="{{asset('assets/images/products/katy.jpg')}}" alt="">
                    @endif

                </div>
                <div class="col-md-6">
                    <div class="list-group" style="padding: 20px;">
                        <a href="#" class="list-group-item active">
                            Profile
                        </a>
                        <a href="#" class="list-group-item">Name-----------------------{{Auth::user()->name}}</a>
                        <a href="#" class="list-group-item">Email----------------------{{Auth::user()->email}}</a>
                        <a href="#" class="list-group-item">Line1----------------------{{$profile->line1}}</a>
                        <a href="#" class="list-group-item">Line2----------------------{{$profile->line2}}</a>
                        <a href="#" class="list-group-item">Address---------------------{{$profile->address}}</a>
                        <a href="#" class="list-group-item">Province--------------------{{$profile->province}}</a>
                        <a href="#" class="list-group-item">Country---------------------{{$profile->country}}</a>
                        <a href="#" class="list-group-item">Mobile---------------------{{$profile->mobile}}</a>
                    </div>

                </div>
                
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('user.edit.profile')}}" class="btn btn-success btn-block">Profile Update</a>
                </div>
            </div>


        </div>
    </div>
</div>