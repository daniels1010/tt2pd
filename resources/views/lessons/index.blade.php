@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="title">TMIS</h1>
    <h2 class="title-under">Tiešsaistes mūzikas instrumentu skola</h2>
    <div class="container lesson-container">
        @if ($isTeacher or $isAdmin)
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
                            <button onclick="location.href = 'lessons/{{ $lesson->id }}';" type="button" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16"><path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/></svg></button>
                            <button onclick="location.href = 'lessons/edit/{{ $lesson->id }}';" type="button" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16"> <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/></svg></button>
                            <button onclick="location.href = 'lessons/delete/{{ $lesson->id }}';" type="button" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/></svg></button>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <div class="col-12" style="text-align: center;">
                <button onclick="location.href = 'lessons/create';" type="button" class="p-2 m-2 btn btn-success">Izveidot jaunu nodarbību</button>
            </div>

        @else
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
        </div>
        @endif
    </div>

</div>
@endsection
