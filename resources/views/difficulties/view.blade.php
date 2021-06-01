@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="title">TMIS</h1>
    <h2 class="title-under">Tiešsaistes mūzikas instrumentu skola</h2>
    <h3>Sarežģītība: {{ $difficulty->name }}</h3>
    <p>Izveidošanas datums: {{ $difficulty->created_at }}</p>
    <div class="form-group">
        <a href="{{ url('difficulties/') }}" class="btn btn-primary">Visas sarežģītības</a>
        <a href="{{ url('difficulties/' . $difficulty->id . '/edit') }}" class="btn btn-primary">Labot</a>
    </div>
</div>
@endsection
