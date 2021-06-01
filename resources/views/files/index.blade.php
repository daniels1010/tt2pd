@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Faili</h3>
    <div class="row">
        <div class="col-sm-4">
            Nosaukums
        </div>
        <div class="col-sm-4">
            Izveidošanas datums
        </div>
        <div class="col-sm-4">
            Izveidošanas datums
        </div>
    </div>
    <hr>
    <div class="row">
        @foreach($files as $file)
            <p class="col-sm-4">{{ $file->name }}</p>
            <p class="col-sm-4">{{ $file->created_at }}</p>
            <p class="col-sm-2">
                <a href="{{ url('files/' . $file->id) }}" class="btn btn-primary">Apskatīt</a>
                <a href="{{ url('files/' . $file->id . '/edit') }}" class="btn btn-primary">Rediģēt</a>                
            </p>
            <form class="col-sm-1" action="{{ url('/files', ['id' => $file->id]) }}" method="post">
                @csrf
                <input class="btn btn-primary" type="submit" value="Dzēst" />
                <input type="hidden" name="_method" value="delete" />
            </form>
        @endforeach
    </div>   
    <div class="row">
        <a href="{{ url('files/create') }}" class="btn btn-primary">
            Jauns fails
        </a>
    </div>
</div>
@endsection
