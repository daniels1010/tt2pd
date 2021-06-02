@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <form method="POST" action="{{ url('filess') }}">
            @csrf
            <div class="form-group">
                <label for="name">
                    Nosaukums: <input type="text" name="name">
                </label>
            </div>
            <div class="form-group">
                <label for="url">
                    Faila URL: <input type="text" name="url">
                </label>
            </div>

            <div class="form-group">
                <a href="{{ url('filess') }}" class="btn btn-primary">Atpakaļ</a>
                <button class="btn btn-primary" type="submit">Izveidot</button>  
            </div>         
        </form>
    </div>
</div>
@endsection
