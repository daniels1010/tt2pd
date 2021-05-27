@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="title">TMIS</h1>
    <h2 class="title-under">Tiešsaistes mūzikas instrumentu skola</h2>
    <h3>Skolas</h3> <hr>
    <div class="row">
        @foreach($schools as $school)
            <p class="col-sm-5">{{ $school->instrument }}</p>
            <p class="col-sm-5">{{ $school->email }}</p>
            <p class="col-sm-1">
                <a href="{{ url('schools/' . $school->id) }}" class="btn btn-primary">Apskatīt</a>
            </p>
            <p class="col-sm-1">
                <a href="{{ url('schools/' . $school->id . '/edit') }}" class="btn btn-primary">Rediģēt</a>
            </p>
        @endforeach
    </div>   
    <div class="row">
        <a href="{{ url('schools/create') }}" class="btn btn-primary">
            Jauna skola
        </a>
    </div>
</div>
@endsection
