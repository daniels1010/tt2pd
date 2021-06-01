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
    <div class="form-group">
        <a href="{{ url('schools/' . $school->id . '/edit') }}" class="btn btn-primary">Labot</a>
    </div>
    @if($teacher)
        <h4>Skolai jau ir pievienots skolotājs:</h4>
        <div class="row">
            {{ $teacher->first_name }} {{ $teacher->last_name }}
        </div>
        <div class="row">
            {{ $teacher->email }}
        </div>
    @else
        <div class="form-group">
            <a href="{{ url('schools/' . $school->id . '/add-teacher') }}" class="btn btn-primary">Pievienot skolotāju</a>
        </div>
    @endif
    
    
</div>
@endsection
