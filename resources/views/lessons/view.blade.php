@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="title">TMIS</h1>
    <h2 class="title-under">Tiešsaistes mūzikas instrumentu skola</h2>
    <div style="width:100%; padding-top: 56.25%; position: relative;">
        <iframe style="position: absolute; top: 0; left: 0; bottom: 0; right: 0;" width=100% height=100% src="{{ $file[0]->url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <h1>{{ $lesson->title }}</h1>
    <p>{{ $lesson->description }}</p>
</div>
@endsection
