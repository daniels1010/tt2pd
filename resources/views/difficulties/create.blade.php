@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <form method="POST" action="{{ url('difficulties') }}">
            @csrf
            <div class="form-group">
                <label for="name">
                    Nosaukums: <input type="text" name="name">
                </label>
            </div>

            <div class="form-group">
                <a href="{{ url('difficulties') }}" class="btn btn-primary">Atpakaļ</a>
                <button class="btn btn-primary" type="submit">Izveidot</button>  
            </div>         
        </form>
    </div>
</div>
@endsection
