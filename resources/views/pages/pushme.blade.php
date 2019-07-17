@extends('layouts.app')

@section('content')

{{-- <h1>{{$word}}</h1>
    <p>{{$word}},Hello!!!</p> --}}

    <h1>{{$title}}</h1>
    {{-- @if(count($list)>0)
        <ul class="list-group">
            @foreach($list as $element)
                <li class="list-group-item">
                    {{$element}}
                </li>
            @endforeach
        </ul>        
    @else
        <p>No Services Available at the moment</p>
    @endif --}}
    
    
    @if(count($urls)>0)
        <h3>  Choose the item...</h3>
        <ul class="list-group">
            @foreach($urls as $key=>$value)
                <a href={{$value}}><li class="list-group-item">
                    {{$key}}
                </li></a>
            @endforeach
        </ul>        
    @else
        <p>No Services Available at the moment</p>
    @endif

@endsection