@extends('layouts.app')
@section('content')
    <a href="/records" class="btn btn-default">Go Back</a>
    <h1>Record - Details</h1>
    <hr>
    <div>
        Added on {{ $record->created_at }}

    </div>
    <div>
        {{ $record->bgl }} mm/gl
    </div>
    <div>
        {{ $record->notes }}
    </div>
    <hr>
    <a href="/records/{{ $record->id }}/edit" class="btn btn-default col-xs-12 col-sm-1 m-top m-right">Edit</a>

    <form action="/records/{{ $record->id }}" method="POST">
        @method('DELETE')
        @csrf
        <input type="submit" name="send" value="Delete" class="btn btn-danger col-xs-12 col-sm-1 m-top m-bottom">
    </form>

@endsection
