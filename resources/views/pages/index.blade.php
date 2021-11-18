@extends('layouts.app')
            
@section('content')
<div class="jumbotron text-center">
    <h1>{{$title}}</h1>
    <p>Monitor your blood glucose</p>
    <p>
        <!--a class="btn btn-primary btn-lg" href="/login" role="button">Login</a --> 
        <a class="btn btn-success btn-lg" href="/records" role="button">+ Record</a>
    </p>
</div> 
@endsection


