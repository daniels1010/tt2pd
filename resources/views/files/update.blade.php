@extends('layouts.app')

@section('content')
<div class="container">
        {!! Form::model($file, [
			'method' => 'PATCH',
			'route' => ['filess.update', $file->id]
		]) !!}

	<table>
		<tr>
			<td>{!! Form::label('name', 'Nosaukums', ['class' => 'control-label']) !!}</td>
			<td>{!! Form::text('name', null, ['class' => 'form-control', 'size' => 255]) !!}</td>
		</tr>
		<tr>
			<td>{!! Form::label('url', 'Faila URL', ['class' => 'control-label']) !!}</td>
			<td>{!! Form::text('url', null, ['class' => 'form-control', 'size' => 255]) !!}</td>
		</tr>
		<tr>
			<td></td>
			<td>{!! Form::submit('Saglabāt', ['class' => 'btn btn-primary']) !!}</td>
		</tr>
	</table>		
	
	{!! Form::close() !!}
</div>
@endsection
