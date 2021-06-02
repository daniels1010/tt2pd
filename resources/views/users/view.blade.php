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
    <h3>Piešķirtās nodarbības</h3>
    @foreach($assignedLessons as $aLesson)
        <div class="row">
            {{ $aLesson->title }}
        </div>
    @endforeach()
    <hr>
    @if (count($availableLessons) > 0)
    <h3>Nodarbības piešķiršana</h3>
    <div class="row">
        <form method="POST" action="{{ url('users/assign-lesson') }}">        
            @csrf
            Nodarbības: 
            
            <select name="lesson_id">
                <?php
                foreach($availableLessons as $availableLesson) { ?>  
                <option value="{{$availableLesson->id}}">{{ $availableLesson->title }}</option> 
                <?php } ?>
                </select>
            </label>
            <br>
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <input type="hidden" name="school_id" value="{{ $user->school_id }}">
            <input type="submit" class="btn btn-primary" value="Piešķirt">           
        </form>
    </div>
    @else
        <h3> Nav Nodarbību ko piešķirt</h3>
    @endif
</div>
@endsection
