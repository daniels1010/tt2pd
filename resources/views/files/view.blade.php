@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="title">TMIS</h1>
    <h2 class="title-under">Tiešsaistes mūzikas instrumentu skola</h2>
    <h3>Nosaukums: {{ $file->name }}</h3>
    <p>Faila URL: {{ $file->url }}</p>
    <div class="form-group">
        <a href="{{ url('files/') }}" class="btn btn-primary">Visi faili</a>
        <a href="{{ url('files/' . $file->id . '/edit') }}" class="btn btn-primary">Labot</a>
    </div>
</div>
@endsection
