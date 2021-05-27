@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Informācija par lietotāju</h3>
    <div class="row">
        Vārds: {{ $user->first_name }}
    </div>
    <div class="row">
        Uzvārds: {{ $user->last_name }}
    </div>
    <div class="row">
        E-pasts: {{ $user->email }}
    </div>
    <div class="row">
        <a href="{{ url('users/' . $user->id . '/edit') }}" class="btn btn-primary">Labot</a>
    </div>

    <h3>Nodarbības piešķiršana</h3>
    <div class="row">
        <form method="POST" action="{{ url('users/assign-lesson/' . $user->id) }}">
            @csrf
            <label for="lesson_id">
                Nodarbība: <input type="number">
            </label>
            <button class="btn btn-primary">Piešķirt</button>           
        </form>
    </div>
</div>
@endsection
