@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="title">TMIS</h1>
    <h2 class="title-under">Tiešsaistes mūzikas instrumentu skola</h2>
    <div class="container lesson-container">
        @if ($isTeacher)
            <table class="tabula">
                <tr>
                    <th class="tabula-header">Nodarbības nosaukums</th>
                    <th class="tabula-header">Sarežģītība</th>
                    <th class="tabula-header">Izveidošanas datums</th>
                    <th class="tabula-header">Opcijas</th>
                </tr>

                <?php foreach ($lessons as $lesson) { ?>
                    <tr>
                        <td class="tabula-data">{{ $lesson->title }}</td>
                        <td class="tabula-data">idk</td>
                        <td class="tabula-data">{{ $lesson->created_at }}</td>
                        <td class="tabula-data"> 
                            <button onclick="location.href = 'lessons/{{ $lesson->id }}';" type="button" class="btn btn-primary fa fa-eye"></button>
                            <button onclick="location.href = 'lessons/{{ $lesson->id }}/edit/';" type="button" class="btn btn-warning fa fa-edit"></button>
                            {{-- <button onclick="location.href = 'lessons/{{ $lesson->id }}/delete/';" type="button" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/></svg></button> --}}
                            <form style="display:unset" action="{{ url('/lessons', ['id' => $lesson->id]) }}" method="post">
                                @csrf
                                <button value="Dzēst" class="btn btn-danger fa fa-trash" />
                                <input type="hidden" name="_method" value="delete" />                                
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <div class="col-12" style="text-align: center;">
                <button onclick="location.href = 'lessons/create';" type="button" class="p-2 m-2 btn btn-success">Izveidot jaunu nodarbību</button>
            </div>

        @else
        <div class="row">
                    
            <?php if (count($lessons) > 0) {
                foreach ($lessons as $lesson) { ?>
                    <div class="col-lg-6 lesson-box-container">
                        <div class="lesson-box ">  
                            <a href="lessons/{{ $lesson->id }}">
                                <h2>{{ $lesson->title }}</h2>
                                <img class="lesson-thumbnail" src="{{ $lesson->poster_url }}" alt="Picture is missing">
                            </a>
                        </div>
                    </div>
            <?php }
            }  else {
                ?> <h2>Jums nav piešķirtas nevienas nodarbības</h2><?php
            }?>
        </div>
        @endif
    </div>

</div>
@endsection
