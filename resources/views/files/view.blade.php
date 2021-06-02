@extends('layouts.app')

@section('content')
<div class="container">
    <x-main-title></x-main-title>
    <h3>Nosaukums: {{ $file->name }}</h3>
    <p>Faila URL: {{ $file->url }}</p>
    <div class="form-group">
        <a href="{{ url('filess/') }}" class="btn btn-primary">Visi faili</a>
        <a href="{{ url('filess/' . $file->id . '/edit') }}" class="btn btn-primary">Labot</a>
    </div>
</div>
@endsection
