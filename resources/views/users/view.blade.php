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
    @if (count($userLessons) > 0)
    <h3>Nodarbības piešķiršana</h3>
    <div class="row">
    <form method="post" action="{{ url('/users/'.$user->id) }}">
            <select name="taskOption">
                <option value="first">First</option>
                <option value="second">Second</option>
                <option value="third">Third</option>
            </select>
            <input type="submit" value="Submit the form"/>
            </form>

        <form method="POST" action="{{ url('users/assign-lesson/' . $user->id) }}">
        
            @csrf
            Nodarbības: 
            
            <select name="assignLesson">
                <?php
                //var_dump($lessons[0]->lesson->title); die();
                foreach($userLessons as $userLesson) { ?>  
                <option value="{{$userLesson->lesson_id}}">{{ $userLesson->lesson->title }}</option> 
                <?php } ?>
                </select>
            </label>
            <br>
            <button class="btn btn-primary">Piešķirt</button>           
        </form>
    </div>
    @else
        <h3> Nav Nodarbību ko piešķirt</h3>
    @endif
</div>
@endsection
