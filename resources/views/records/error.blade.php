@extends('layouts.app')
@section('content')
    <!-- Error message -->
    @if($error)
      <div class="alert alert-danger">
        {{$error}}
      </div>
    @endif
@endsection