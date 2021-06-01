@extends('layouts.app')

@section('content')
<div class="container">
    {!! Form::model($lesson, [
		'method' => 'PATCH',
		'route' => ['lessons.update', $lesson->id]
	]) !!}

	<table>
		<tr>
			<td>{!! Form::label('title', 'Nosaukums', ['class' => 'control-label']) !!}</td>
			<td>{!! Form::text('title', null, ['class' => 'form-control', 'size' => 50, ]) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('description', 'Apraksts', ['class' => 'control-label']) !!}</td>
			<td>{!! Form::text('description', null, ['class' => 'form-control', 'size' => 255, ]) !!}</td>
		</tr>
        <tr>
			<td>{!! Form::label('poster_url', 'Bildes adrese', ['class' => 'control-label']) !!}</td>
			<td>{!! Form::text('poster_url', null, ['class' => 'form-control', 'size' => 50, ]) !!}</td>
		</tr>	
        <tr>
            <td>{!! Form::label('file_id', 'Fails', ['class' => 'control-label']) !!}</td>
			<td>{!! Form::select('file_id',  $files, null, ['class' => 'form-control']) !!}</td>
        </tr>
		<tr>
			<td>{!! Form::submit('Saglabāt', ['class' => 'btn btn-primary']) !!}</td>
			<td>
				<a href="{{ url('lessons/' . $lesson->id . '/add-diff') }}" class="btn btn-primary">Pievinot sarežģītības</a>
			</td>
		</tr>
		<tr>
			<td>

			</td>
		</tr>
	</table>		
	
	{!! Form::close() !!}
</div>
@endsection
