@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Single Todo Details</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$todo->name}}</div>

                <div class="card-body">
                    <div>{{$todo->description}}</div>
                </div>
                <a href="{{route("todos.edit",['id'=> $todo->id])}}"class="btn btn-parimary btn-sm">Edit</a>        
                <a href="{{route("todos.delete",['id'=> $todo->id])}}"class="btn btn-danger btn-sm">Delete</a>    
            </div>
        </div>
    </div>
</div>

@endsection