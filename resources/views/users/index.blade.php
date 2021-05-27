@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="title">TMIS</h1>
    <h2 class="title-under">Tiešsaistes mūzikas instrumentu skola</h2>
    <h3>Skolēni</h3> <hr>
    <div class="row">
        @foreach($students as $student)
            <p class="col-sm-4">{{ $student->first_name }} {{ $student->last_name }}</p>
            <p class="col-sm-4">{{ $student->email }}</p>
            <p class="col-sm-2">
                <a href="{{ url('users/' . $student->id) }}" class="btn btn-primary">Apskatīt</a>
                <a href="{{ url('users/' . $student->id . '/edit') }}" class="btn btn-primary">Rediģēt</a>                
            </p>
            <form class="col-sm-1" action="{{ url('/users', ['id' => $student->id]) }}" method="post">
                @csrf
                <input class="btn btn-primary" type="submit" value="Dzēst" />
                <input type="hidden" name="_method" value="delete" />
            </form>
        @endforeach
    </div>   
    <div class="row">
        <a href="{{ url('users/create') }}" class="btn btn-primary">
            Jauns lietotājs
        </a>
    </div> 
</div>
@endsection
