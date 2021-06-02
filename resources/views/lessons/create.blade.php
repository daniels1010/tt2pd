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
                <div class="input-group">
                    <span class="input-group-btn">
                        <a id="lfm" data-input="poster_url" data-preview="holder" class="btn btn-primary">
                        <i class="fa fa-picture-o"></i> Choose
                        </a>
                    </span>
                    <input id="poster_url" class="form-control" type="text" name="poster_url">
                </div>
                <img id="holder" style="margin-top:15px;max-height:100px;">
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
