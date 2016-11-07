@extends('layouts.default')

@section('content')

    <form action="{{ $action }}" method="post">
    
        @if (count($errors) > 0)
        
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            
        @endif
    
        <div class="form-group">
            <input class="form-control" type="text" name="slug" value="{{ old('slug') }}" placeholder="Slug" />
        </div>
        
        <div class="form-group">
        
            <textarea class="form-control" rows="10" name="content" placeholder="Content">{{ old('content') }}</textarea>
            
        </div>
    
        
        <input class="btn btn-default" type="submit" name="submit" value="Submit" />
    
        {{ csrf_field() }}
    
    </form>
    
    
    
@endsection