@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="title">TMIS</h1>
    <h2 class="title-under">Tiešsaistes mūzikas instrumentu skola</h2>
    <h3>Skolas</h3> <hr>
    <div class="row">
        @foreach($schools as $school)
            <p class="col-sm-4">{{ $school->instrument }}</p>
            <p class="col-sm-4">{{ $school->email }}</p>
            <p class="col-sm-2">
                <a href="{{ url('schools/' . $school->id) }}" class="btn btn-primary">Apskatīt</a>
                <a href="{{ url('schools/' . $school->id . '/edit') }}" class="btn btn-primary">Rediģēt</a>
                
            </p>
            <form class="col-sm-1" action="{{ url('/schools', ['id' => $school->id]) }}" method="post">
                @csrf
                <input class="btn btn-primary" type="submit" value="Dzēst" />
                <input type="hidden" name="_method" value="delete" />
            </form>
        @endforeach
    </div>   
    <div class="row">
        <a href="{{ url('schools/create') }}" class="btn btn-primary">
            Jauna skola
        </a>
    </div>
</div>
@endsection
