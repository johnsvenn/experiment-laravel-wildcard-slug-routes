@extends('layouts.default')

@section('content')

 
    
    @if ($data->count() > 0) 
        <ul>
        
            @foreach ($data as $var) 
            
                <li><a href="{{ $var->slug }}">{{$var->slug}}</a></li>
                
            @endforeach 
        </ul>
        
    @else 
        <p>No blogs found!</p>
    @endif
    
    
    
@endsection

