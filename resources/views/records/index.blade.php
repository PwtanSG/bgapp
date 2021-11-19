@extends('layouts.app')
@section('content')
    <!-- Success message -->
    @if(Session::has('success'))
      <div class="alert alert-success">
        {{Session::get('success')}}
      </div>
    @endif
    <h1>Records</h1>
    <a href="/records/create" class="btn btn-info" role="button">+ Records</a>

    @if ($records->count())
      <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Recorded</th>
                <th scope="col">Blood Glucose (mmol/L)</th>
                <th scope="col">Notes</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i=0;
            @endphp
            @foreach ($records as $record)
                @php
                    $i++
                @endphp
                <tr onClick="location.href='records/{{ $record->id}}'">
                    <td scope="row">{{$i}}</td>
                    <td>{{ $record->created_at }}</td>
                    <td>{{ $record->bgl }}</td>
                    <td>{{ $record->notes }}</td>
                </tr>
                
            @endforeach
        </tbody>
      </table>
    @else
        <p>No record found.</p>
    @endif


@endsection
