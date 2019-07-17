@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Todos</div>   

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
                <form action="/store/todos" method="POST">
                        @csrf{{--cross-site-verification --}}
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Enter your todos here"> 
                        </div>
                        <div class="form-group">
                             <textarea name="description" cols="90" rows="10" class="form-control"
                            placeholder="Enter your description here"></textarea>
                        </div>
                        <div class="form-group text-center">
                            <button role="submit" class="btn btn-success">Create Todo</button>
                        </div>
                    </form>                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
