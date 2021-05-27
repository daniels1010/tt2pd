@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($students as $student)
            <p class="col-sm-5">{{ $student->first_name }} {{ $student->last_name }}</p>
            <p class="col-sm-5">{{ $student->email }}</p>
            <p class="col-sm-1">
                <a href="{{ url('users/' . $student->id) }}" class="btn btn-default">Apskatīt</a>
            </p>
            <p class="col-sm-1">
                <a href="{{ url('users/' . $student->id . '/edit') }}" class="btn btn-default">Rediģēt</a>
            </p>
        @endforeach
    </div>   
    <div class="row">
        <a href="{{ url('users/create') }}" class="btn btn-primary">
            Jauns lietotājs
        </a>
    </div> 
</div>
@endsection
