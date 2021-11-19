@extends('layouts.app')
@section('content')
    <a href="/records" class="btn btn-default">Go Back</a>
    <h1>Create Record</h1>

    <div class="container mt-5">

        <!-- Success message -->
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif

        <form action="/records" method="post">
            <!-- CROSS Site Request Forgery Protection -->
            @csrf
            <div class="form-group {{ $errors->has('bgl') ? ' has-error' : '' }}">
                <label>Blood Glucose Level (mm/gl)</label>
                <input type="text" class="form-control" name="bgl" id="bgl" placeholder="e.g 5.1">
            </div>
            @if ($errors->has('bgl'))
                <span class="help-block">
                    <strong>{{ $errors->first('bgl') }}</strong>
                </span>
            @endif

            <div class="form-group {{ $errors->has('notes') ? ' has-error' : '' }}">
                <label>Notes</label>
                <textarea class="form-control" name="notes" id="notes" rows="4" cols="50" placeholder="type remarks here..e.g after medication"></textarea>
            </div>
            @if ($errors->has('notes'))
                <span class="help-block">
                    <strong>{{ $errors->first('notes') }}</strong>
                </span>
            @endif

            <input type="submit" name="send" value="Submit" class="btn btn-primary">
        </form>
    </div>

@endsection
