@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Informācija par skolu</h3>
    <div class="row">
        Instruments: {{ $school->instrument }}
    </div>
    <div class="row">
        Logo: {{ $school->logo }}
    </div>
    <div class="row">
        E-pasts: {{ $school->email }}
    </div>
    <div class="row">
        <a href="{{ url('schools/' . $school->id . '/edit') }}" class="btn btn-primary">Labot</a>
    </div>

    {{-- <h3>Nodarbības piešķiršana</h3>
    <div class="row">
        <form method="POST" action="{{ url('schools/assign-lesson/' . $school->id) }}">
            @csrf
            <label for="lesson_id">
                Nodarbība: <input type="number">
            </label>
            <button class="btn btn-primary">Piešķirt</button>           
        </form>
    </div> --}}
</div>
@endsection
