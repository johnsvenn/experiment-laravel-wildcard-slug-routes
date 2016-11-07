@extends('layouts.default')

@section('content')

    @if (count($data) > 0) 
        <ul>
            @foreach ($data as $var) 
            
                <li><a href="{{ $var->slug }}">{{ $var->slug }}</a> ({{ $var->controller }})</li>
                
            @endforeach 
    
        </ul>
        
    @else
    
        <p>You haven't added anything yet&hellip;</p>
        
    @endif
    
@endsection

