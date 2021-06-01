@extends('layouts.app')

@section('content')
<div class="container">
    {!! Form::model($difficulty, [
		'method' => 'PATCH',
		'route' => ['difficulties.update', $difficulty->id]
	]) !!}

	<table>
		<tr>
			<td>{!! Form::label('name', 'Nosaukums', ['class' => 'control-label']) !!}</td>
			<td>{!! Form::text('name', null, ['class' => 'form-control', 'size' => 255]) !!}</td>
		</tr>
		<tr>
			<td></td>
			<td>{!! Form::submit('Saglabāt', ['class' => 'btn btn-primary']) !!}</td>
		</tr>
	</table>		
	
	{!! Form::close() !!}
</div>
@endsection
