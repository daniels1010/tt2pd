@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <form method="POST" action="{{ url('users') }}">
            @csrf
            <div class="form-group">
                <label for="first_name">
                    Vārds: <input type="text" name="first_name">
                </label>
            </div>
            <div class="form-group">
                <label for="last_name">
                    Uzvārds: <input type="text" name="last_name">
                </label>
            </div>      
            <div class="form-group">
                <label for="email">
                    E-pasts: <input type="email" name="email">
                </label>
            </div>

            <div class="form-group">
                <a href="{{ url('users') }}" class="btn btn-primary">Atpakaļ</a>
                <button class="btn btn-primary" type="submit">Izveidot</button>  
            </div>         
        </form>
    </div>
</div>
@endsection
