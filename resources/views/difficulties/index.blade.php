@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Sarežģītības</h3>
    <div class="row">
        <div class="col-sm-4">
            Nosaukums
        </div>
        <div class="col-sm-4">
            Izveidošanas datums
        </div>
    </div>
    <hr>
    <div class="row">
        @foreach($difficulties as $difficulty)
            <p class="col-sm-4">{{ $difficulty->name }}</p>
            <p class="col-sm-4">{{ $difficulty->created_at }}</p>
            <p class="col-sm-2">
                <a href="{{ url('difficulties/' . $difficulty->id) }}" class="btn btn-primary">Apskatīt</a>
                <a href="{{ url('difficulties/' . $difficulty->id . '/edit') }}" class="btn btn-primary">Rediģēt</a>                
            </p>
            <form class="col-sm-1" action="{{ url('/difficulties', ['id' => $difficulty->id]) }}" method="post">
                @csrf
                <input class="btn btn-primary" type="submit" value="Dzēst" />
                <input type="hidden" name="_method" value="delete" />
            </form>
        @endforeach
    </div>   
    <div class="row">
        <a href="{{ url('difficulties/create') }}" class="btn btn-primary">
            Jauna sarežģītība
        </a>
    </div>
</div>
@endsection
