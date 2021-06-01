@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Izveidot Nodarbību</h1>
    <div class="row">
        <form method="POST" action="{{ url('lessons') }}">
            @csrf
            <div class="form-group">
                <label for="title">
                    Nosaukums: <input type="text" name="title">
                </label>
                @error('title')
                <h4>{{ $message }} </h4>
                    @enderror
            </div>
            <div class="form-group">
                <label for="description">
                    Apraksts: <input type="text" name="description">
                </label>
                @error('description')
                <h4>{{ $message }} </h4>
                @enderror
            </div>  
            <div class="form-group">
                <label for="poster_url">
                    Bildes adrese: <input type="text" name="poster_url">
                </label>
                @error('poster_url')
                <h4>{{ $message }} </h4>
                @enderror
            </div>   

            <div class="form-group">
                {!! Form::select('file_id',  $files, null, ['class' => 'form-control']) !!}
            </div>
                   


            <div class="form-group">
                <a href="{{ url('lessons') }}" class="btn btn-primary">Atpakaļ</a>
                <button class="btn btn-primary" type="submit">Izveidot</button> 
                
            </div>         
        </form>
    </div>
</div>
@endsection
