@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <form method="POST" action="{{ url('schools') }}">
            @csrf
            <div class="form-group">
                <label for="instrument">
                    Instruments: <input type="text" name="instrument">
                </label>
            </div>
            <div class="form-group">
                <label for="logo">
                    Logo: <input type="text" name="logo">
                </label>
            </div>      
            <div class="form-group">
                <label for="email">
                    E-pasts: <input type="email" name="email">
                </label>
            </div>

            <div class="form-group">
                <a href="{{ url('schools') }}" class="btn btn-primary">Atpakaļ</a>
                <button class="btn btn-primary" type="submit">Izveidot</button>  
            </div>         
        </form>
    </div>
</div>
@endsection
