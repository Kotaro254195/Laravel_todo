@extends('layouts.app')

@section('content')

<div class="card">
        <div class="card-header">
            Update Todos
            <a href="/practices" class="btn btn-primary btn-sm float-right">back</a>
        </div>   
        <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-group">
                            @foreach($errors->all() as $error)
                                <li class="list-group-item">{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <form action="/practices-edit-update/{{$practice->id}}" method="POST">
                    @csrf{{--cross-site-verification --}}
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Enter your todos here"
                        value={{$practice->name}}> 
                    </div>
                    <div class="form-group">
                         <textarea name="description" cols="90" rows="10" class="form-control"
                        >{{$practice->description}}</textarea>
                    </div>
                    <div class="form-group text-center">
                        <button role="submit" class="btn btn-success">Update Todo</button>
                    </div>
            </form>                   
        </div>
    </div>


<div class="card">
    <div class="card-header">
        Todos 
        <a href="/practices-create" class="btn btn-primary btn-sm float-right">Create Todo</a>
    </div>
        
    <div class="row" style="text-align:center;">
        @foreach($practices as $practice)
        <div class="col-sm-6 col-md-3" style="margin-right: auto; margin-left: auto;">
            <div class="card img-thumbnail">
                {{-- <img class="card-img-top" src="https://i.ytimg.com/vi/KBAyxbTZN5Y/maxresdefault.jpg" > --}}

                @if($practice->completed)
                    <a href="/practices/{{$practice->id}}/not-complete" class="btn btn-primary  float-right">Done</a>
                @else
                    <a href="/practices/{{$practice->id}}/complete" class="btn btn-danger  float-right">Complete</a>
                @endif

                <div class="card-body px-2 py-3">
                    <h4 class="card-title">{{$practice->name}}</h4>
                    <p class="card-text">{{mb_substr($practice->description,0,14)}}
                    @if(strlen($practice->description)>28)
                        …
                    @endif
                    </p>
                    
                    <p class="mb-0">
                        <a href="/practices-view/{{$practice->id}}" class="btn btn-primary btn-sm">View</a>
                        <a href="/practices-edit/{{$practice->id}}" class="btn btn-secondary btn-sm">Edit</a>
                        <a href="/practices/delete/{{$practice->id}}" class="btn btn-danger btn-sm">Delete</a> 
                    </p>              
                </div><!-- /.card-body -->
            </div><!-- /.card -->
        </div><!-- /.col-sm-6.col-md-3 -->
        @endforeach
    </div><!-- /.row -->        
</div>




@endsection
