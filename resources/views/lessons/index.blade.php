@extends('layouts.app')

@section('content')
<div class="container">
    <x-main-title></x-main-title>
    <div class="container lesson-container">
        @if ($isTeacher)
        <?php
        $headers = [
            'Nodarbības nosaukums',
            'Sarežģītība',
            'Izveidošanas datums',
        ];
        $properties = [
            'title',
            ['method', 'getAvgDifficulty'],
            'created_at',
        ];
        ?>
            <x-table 
                createText="Izveidot jaunu nodarbību" 
                baseUrl="lessons" 
                :headers="$headers"
                :models="$lessons" 
                :properties="$properties">
            </x-table>       
        @else
        <div class="row">                    
            @if (count($lessons) > 0)
                @foreach ($lessons as $lesson)
                    <div class="col-lg-6 lesson-box-container">
                        <div class="lesson-box ">  
                            <a href="lessons/{{ $lesson->id }}">
                                <h2>{{ $lesson->title }}</h2>
                                <img class="lesson-thumbnail" src="{{ $lesson->poster_url }}" alt="Picture is missing">
                            </a>
                        </div>
                    </div>
                @endforeach
            @else
                <h2>Jums nav piešķirtas nevienas nodarbības</h2>
            @endif
        </div>
        @endif
    </div>
</div>
@endsection
