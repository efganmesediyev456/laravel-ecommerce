<div class="container" style="padding:20px">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default" style="padding:20px;">
                @if(Session::has("message_err"))
                <div class="alert alert-danger">{{Session::get("message_err")}}</div>
                @endif
                @if(Session::has("message"))
                <div class="alert alert-success">{{Session::get("message")}}</div>
                @endif
                <form action="" wire:submit.prevent="changePassword">
                    <div class="form-group">
                        <label for="">Current Password</label>
                       <input type="password" class="form-control" wire:model="current_password">
                       @error("current_password") <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for=""> Password</label>
                       <input type="password" class="form-control" wire:model="password">
                       @error("password") <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                       <input type="password" class="form-control" wire:model="password_confirmation">
                       @error("password_confirmation") <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" value="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>