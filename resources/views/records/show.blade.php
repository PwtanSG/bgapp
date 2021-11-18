@extends('layouts.app')
@section('content')
    <a href="/records" class="btn btn-default">Go Back</a>
    <h1>Record - Details</h1>
    <hr>
    <div>
        Added on {{$record->created_at}}
        
    </div>
    <div>
        {{$record->bgl}} mm/gl
    </div>
    <div>
        {{$record->notes}}
    </div>
    <hr>
    <a href="/records/{{$record->id}}/edit" class="btn btn-default">Edit</a>

    <form action="/records/{{$record->id}}" class="pull-right" method="POST">
        @method('DELETE')
        @csrf
        <input type="submit" name="send" value="Delete" class="btn btn-danger">
    </form>    
@endsection
