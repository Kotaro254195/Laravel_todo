@extends("layouts.app")

@section("content")

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Edit Blog Settings</div>

            <div class="card-body">
                <form action="{{ route("settings.update")}}" method="POST">
                    @csrf{{--cross-site-verification --}}
                    <div class="form-group">
                        <input type="text" class="form-control" name="site_name"  
                        value="{{$settings->site_name}}">
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact Phone</label>
                        <input type="text" class="form-control" name="contact_number" 
                        value="{{$settings->contact_number}}">
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact Email</label>
                        <input type="email" class="form-control" name="contact_email" 
                        value="{{$settings->contact_email}}">
                    </div>
                    <div class="form-group">
                        <label for="contact">Address</label>
                        <input type="text" class="form-control" name="address" 
                        value="{{$settings->address}}">
                    </div>
                    <div class="form-group text-center">
                        <button role="submit" class="btn btn-success">Update</button>
                    </div>
                </form>    
            </div>
        </div>
    </div>
</div>


@endsection