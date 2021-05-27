@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="title">TMIS</h1>
    <h2 class="title-under">Tiešsaistes mūzikas instrumentu skola</h2>
    <div class="container lesson-container">
        <div class="row">
            <?php foreach ($lessons as $lesson) { ?>
                <div class="col-lg-6 lesson-box-container">
                    <div class="lesson-box ">  
                        <a href="lessons/{{ $lesson->id }}">
                            <h2>{{ $lesson->title }}</h2>
                            <img class="lesson-thumbnail" src="{{ $lesson->poster_url }}" alt="Picture is missing">
                        </a>
                    </div>
                </div>
            <?php } ?>
            <?php foreach ($lessons as $lesson) { ?>
                <div class="col-lg-6 lesson-box-container">
                    <div class="lesson-box ">  
                        <a href="lessons/{{ $lesson->id }}">
                            <h2>{{ $lesson->title }}</h2>
                            <img class="lesson-thumbnail" src="{{ $lesson->poster_url }}" alt="Picture is missing">
                        </a>
                    </div>
                </div>
            <?php } ?>
            
        </div>
    </div>

</div>
@endsection
