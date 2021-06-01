@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Faili</h3>
    <div class="row">
        <div class="col-sm-4">
            Nosaukums
        </div>
        <div class="col-sm-4">
            Vērtība
        </div>
    </div>
    <hr>
    <div class="row">
        @foreach($lessonDifficulties as $diff)
            <p class="col-sm-4">{{ $diff->difficulty->name }}</p>
            <p class="col-sm-4">{{ $diff->value }}</p>
            <form class="col-sm-1" action="{{ url('/lessons-difficulties', ['id' => $diff->id]) }}" method="post">
                @csrf
                <input class="btn btn-primary" type="submit" value="Dzēst" />
                <input type="hidden" name="_method" value="delete" />
            </form>
        @endforeach
    </div>   
    <div class="row">
        <form method="POST" action="{{ url('lessons/' . $lessonId . '/save-diff') }}">
            @csrf

            <div class="form-group">
                <td>{!! Form::label('difficulty_id', 'Sarežģītība', ['class' => 'control-label']) !!}</td>
                {!! Form::select('difficulty_id',  $schoolDifficulties, null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <label for="value">
                    Vērtība: <input type="number" name="value" min="0" max="10">
                </label>
            </div>
            
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Pievieot</button>  
            </div>         
        </form>
    </div>
</div>
@endsection
