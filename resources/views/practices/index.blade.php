@extends('layouts.app')

@section('content')
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
